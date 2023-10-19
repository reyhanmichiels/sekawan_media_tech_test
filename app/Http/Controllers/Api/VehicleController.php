<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libraries\ApiResponse;
use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function rentVehicle(Request $request, Vehicle $vehicle)
    {
        if (!Gate::allows('isAdmin')) {
            return ApiResponse::error("Unauthorized", 403);
        };

        $validate = Validator::make($request->all(), [
            "user_rent_id" => "required|ulid",
            "user_approve_id_1" => "required|ulid",
            "user_approve_id_2" => "required|ulid",
            "start_at" => "required|date_format:d-m-Y",
            "end_at" => "required|date_format:d-m-Y"
        ]);

        if ($validate->fails()) {
            return ApiResponse::error($validate->errors(), 400);
        }

        if ($vehicle->status == "rent") {
            return ApiResponse::error("vehicles is under rent", 409);
        }

        $startAt = Carbon::createFromFormat("d-m-Y", $request->start_at);
        $rents = Rent::where('vehicle_id', $vehicle->id)->get();
        foreach ($rents as $rent) {
            $rentStartAt = Carbon::createFromFormat("d-m-Y", $rent->StartAt);
            $rentEndAt = Carbon::createFromFormat("d-m-Y", $rent->EndAt);
            if ($startAt->between($rentStartAt, $rentEndAt)) {
                return ApiResponse::error("vehicles is under rent", 409);
            }
        }

        $userRent = User::find($request->user_rent_id);
        if ($userRent->role != "driver") {
            return ApiResponse::error("user rent is not a driver", 400);
        }

        $userApprove1 = User::find($request->user_approve_id_1);
        if ($userApprove1->role != "pool_manager") {
            return ApiResponse::error("user approve 1 is not a manager pool", 400);
        }

        $userApprove2 = User::find($request->user_approve_id_2);
        if ($userApprove2->role != "pool_manager") {
            return ApiResponse::error("user approve 2 is not a manager pool", 400);
        }

        try {
            $rent = new Rent;
            $rent->vehicle_id = $vehicle->id;
            $rent->user_rent_id = $request->user_rent_id;
            $rent->user_approve_id_1 = $request->user_approve_id_1;
            $rent->user_approve_id_2 = $request->user_approve_id_2;
            $rent->StartAt =  $request->start_at;
            $rent->EndAt = $request->end_at;
            $rent->save();
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 500);
        }

        $data = [
            'message' => 'successfully create rent',
            'data' => $rent
        ];

        return ApiResponse::success($data, 201);
    }
}
