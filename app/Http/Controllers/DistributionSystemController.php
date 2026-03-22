<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DistributionSystem;
use App\Models\Province;
use DB;

class DistributionSystemController extends Controller
{
    public function index()
    {
        $distributionSystemData = DB::table('distribution_systems as dis')
        ->select('id', 'prov.name as related_province', 'dis.name as name', 'address', 'map_link', 'dis.created_at')
        ->join('devvn_tinhthanhpho AS prov', 'prov.matp', '=', 'dis.related_city_code')
        ->orderBy('prov.name', 'asc')
        ->get();

        $provinces = Province::orderBy('name', 'asc')->get();

        $headingTitle = heading('Hệ thống phân phối');
        $pageTitle = 'Hệ thống phân phối';

        return view('admin.pages.distribution_system.index',
            compact('headingTitle', 'pageTitle', 'distributionSystemData', 'provinces')
        );
    }

    public function store(Request $request)
    {
        $distributionSystem = new DistributionSystem;
        $distributionSystem->name = trim($request->name);
        $distributionSystem->address = trim($request->address);
        $distributionSystem->map_link = trim($request->map_link);
        $distributionSystem->related_city_code = trim($request->related_city_code);
        $distributionSystem->save();

        return response()->json([
            'status' => 200,
            'message' => 'Thêm thành công',
            'redirect' => route('distribution-system.index')
        ]);
    }

    public function show($id)
    {
        if (!DistributionSystem::where('id', $id)->exists()) {
            return response()->json([
                'status' => 'E0',
                'message' => 'Không tìm thấy dữ liệu',
            ]);
        }

        $distributionSystem = DistributionSystem::find($id);

        $provinces = Province::orderBy('name', 'asc')->get();

        $provinceOptions = '';
        foreach ($provinces as $province) {
            $seleted = ($province->matp === $distributionSystem->related_city_code) ? 'selected' : '';
            $provinceOptions .= '<option value="'. $province->matp .'" '. $seleted .'>'. $province->name .'</option>';
        }
        $distributionSystem->related_city_code = $provinceOptions;

        return response()->json([
            'status' => 200,
            'message' => null,
            'data' => $distributionSystem,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!DistributionSystem::where('id', $id)->exists()) {
            return response()->json([
                'status' => 'E0',
                'message' => 'Không tìm thấy dữ liệu',
            ]);
        }

        $distributionSystem = DistributionSystem::find($id);
        $distributionSystem->name = trim($request->name);
        $distributionSystem->address = trim($request->address);
        $distributionSystem->map_link = trim($request->map_link);
        $distributionSystem->related_city_code = trim($request->related_city_code);
        $distributionSystem->save();

        return response()->json([
            'status' => 200,
            'message' => 'Lưu lại thành công',
            'redirect' => route('distribution-system.index')
        ]);   
    }

    public function destroy($id)
    {
        if (!DistributionSystem::where('id', $id)->exists()) {
            return response()->json([
                'status' => 'E0',
                'message' => 'Không tìm thấy dữ liệu',
            ]);
        }

        $distributionSystem = DistributionSystem::find($id);
        $distributionSystem->delete();
        
        return response()->json([
            'status' => 200,
            'message' => 'Đã xoá dữ liệu',
            'redirect' => route('distribution-system.index')
        ]);
    }
}
