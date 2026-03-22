<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Ward;
use App\Models\DistributionSystem;

class AjaxController extends Controller
{
    public function getDistrictsByProvinceId(Request $request)
    {
        return response()->json([
            'status' => 200,
            'data' => District::where('matp', trim($request->input('province_id')))->orderBy('name', 'desc')->get(),
        ]);
    }

    public function getWardsByDistrictId(Request $request)
    {
        return response()->json([
            'status' => 200,
            'data' => Ward::where('maqh', trim($request->input('district_id')))->orderBy('name', 'desc')->get(),
        ]);
    }

    public function getDistributionSystem(Request $request)
    {
        $id = $request->input('province_id');

        $distributionSystemData = DistributionSystem::select('name', 'address')->where('related_city_code', trim($id))->get();

        if (count($distributionSystemData) > 0) {
            return response()->json([
                'status' => '200',
                'data' => $distributionSystemData,
            ]);
        }

        return response()->json([
            'status' => 'E0',
            'message' => 'Không tìm thấy dữ liệu',
        ]);
    }
}
