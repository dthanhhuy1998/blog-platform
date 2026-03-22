<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use DB;

// Models
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index() {
        $partners = Partner::orderBy('sort_order')->get();

        $headingTitle = heading('Khách hàng - Đối tác');
        $pageTitle = 'Khách hàng - Đối tác';

        return view('admin.pages.partner.index',
            compact('headingTitle', 'pageTitle', 'partners')
        );
    }

    public function postAdd(Request $request) {
        $validated = $request->validate([
            'image'     => 'required'
        ],[
            'image.required'        => 'Vui lòng chọn ảnh!'
        ]);

        $file_path = '';
        if($request->hasFile('image')) {
            $file_path = Storage::disk('public')->putFile('uploads/partner', $request->file('image'));
        }

        DB::table('partner')->insert([
            'image'         => $file_path,
            'link'          => $request->link,
            'sort_order'    => !empty($request->sortOrder) ? $request->sortOrder : 0,
            'status'        => $request->status,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.theme.partner.index')->with('success_msg', 'Thêm mới thành công');
    }

    public function getEdit($parnerId) {
        $partner = Partner::findOrFail($parnerId);

        $headingTitle = heading('Chỉnh sửa khách hàng - đối tác');
        $pageTitle = 'Chỉnh sửa khách hàng - đối tác';

        return view('admin.pages.partner.edit',
            compact('headingTitle', 'pageTitle', 'partner')
        );
    }

    public function postEdit(Request $request) {
        $partner = Partner::findOrFail($request->id);

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($partner->image);
            $file_path = Storage::disk('public')->putFile('uploads/partner', $request->file('image'));
        } else {
            $file_path = $partner->image;
        }

        DB::table('partner')
        ->where('id', $request->id)
        ->update([
            'image'         => $file_path,
            'link'          => $request->link,
            'sort_order'    => !empty($request->sortOrder) ? $request->sortOrder : 0,
            'status'        => $request->status,
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.theme.partner.index')->with('success_msg', 'Lưu lại thành công');
    }

    public function getDelete($partnerId) {
        $partner = Partner::findOrFail($partnerId);

        // delete image
        if(!empty($partner->image)) {
            Storage::disk('public')->delete($partner->image);
        }

        // delete record
        DB::table('partner')->where('id', '=', $partnerId)->delete();

        return redirect()->route('admin.theme.partner.index')->with('success_msg', 'Xóa khách hàng thành công');
    }
}
