<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libraries\ApiResponse;
use App\Models\Rent;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function getAll()
    {
        if (!(Gate::allows('isAdmin') or Gate::allows('isPoolManager'))) {
            return ApiResponse::error("Unauthorized", 403);
        };


        $vehicleData = collect();
        foreach (Vehicle::all() as $vehicle) {
            $frequent = $vehicle->rents()->count();
            $data = [
                "id" => $vehicle->id,
                "name" => $vehicle->name,
                "rent_frequency" => $frequent
            ];

            $vehicleData->push($data);
        }
        $data = [
            'message' => 'successfully get dashboard',
            'data' => $vehicleData
        ];

        return ApiResponse::success($data, 200);
    }
}
