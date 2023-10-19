<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libraries\ApiResponse;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RentController extends Controller
{
    public function approve(Rent $rent)
    {
        if (!Gate::allows('isPoolManager')) {
            return ApiResponse::error("Unauthorized", 403);
        };

        if ($rent->user_approve_id_1 != Auth::user()->id and $rent->user_approve_id_2 != Auth::user()->id) {
            return ApiResponse::error("Unauthorized", 403);
        }

        try {
            if (Auth::user()->id == $rent->user_approve_id_1) {
                if ($rent->approve_status_1 == 1) {
                    return ApiResponse::error("status has been success", 400);
                }

                $rent->approve_status_1 = 1;
            }

            if (Auth::user()->id == $rent->user_approve_id_2) {
                if ($rent->approve_status_2 == 1) {
                    return ApiResponse::error("status has been success", 400);
                }
                $rent->approve_status_2 = 1;
            }

            if ($rent->approve_status_1 == true and $rent->approve_status_2 == true) {
                $rent->status = "accepted";
            }

            $rent->save();
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), 500);
        }

        $data = [
            'message' => 'successfully approve rent',
        ];
        return ApiResponse::success($data, 200);
    }
}
