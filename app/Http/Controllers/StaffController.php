<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use DB;

// Models
use App\Models\Staff;

class StaffController extends Controller
{
    public function index() {
        $staffs = Staff::orderBy('sort_order', 'asc')->get();

        $headingTitle = heading('Danh sách nhân sự');
        $pageTitle = 'Danh sách nhân sự';

        return view('admin.pages.staff.index',
            compact('headingTitle', 'pageTitle', 'staffs')
        );
    }

    public function postAdd(Request $request) {
        $validated = $request->validate([
            'staffName'     => 'required|max:255',
            'staffPosition' => 'required|max:100'
        ],[
            'staffName.required'        => 'Tên nhân sự không được bỏ trống!',
            'staffName.max'             => 'Tên nhân sự tối đa 255 ký tự',
            'staffPosition.required'    => 'Vị trí nhân sự không được bỏ trống!',
            'staffPosition.max'         => 'Vị trí nhân sự tối đa 100 ký tự',
        ]);

        $file_path = '';
        if($request->hasFile('image')) {
            $file_path = Storage::disk('public')->putFile('uploads/staff', $request->file('image'));
        }

        DB::table('staff')->insert([
            'staff_name'        => $request->staffName,
            'staff_position'    => $request->staffPosition,
            'staff_image'       => $file_path,
            'staff_message'     => $request->staffMessage,
            'sort_order'        => !empty($request->sortOrder) ? $request->sortOrder : 0,
            'status'            => $request->status,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.theme.staff.index')->with('success_msg', 'Thêm nhân sự mới thành công');
    }

    public function getEdit($staffId) {
        $staff = Staff::findOrFail($staffId);

        $headingTitle = heading('Chỉnh sửa nhân sự');
        $pageTitle = 'Chỉnh sửa nhân sự';

        return view('admin.pages.staff.edit',
            compact('headingTitle', 'pageTitle', 'staff')
        );
    }

    public function postEdit(Request $request) {
        $validated = $request->validate([
            'staffName'     => 'required|max:255',
            'staffPosition' => 'required|max:100'
        ],[
            'staffName.required'        => 'Tên nhân sự không được bỏ trống!',
            'staffName.max'             => 'Tên nhân sự tối đa 255 ký tự',
            'staffPosition.required'    => 'Vị trí nhân sự không được bỏ trống!',
            'staffPosition.max'         => 'Vị trí nhân sự tối đa 100 ký tự',
        ]);

        $staff = Staff::findOrFail($request->id);

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($staff->staff_image);
            $file_path = Storage::disk('public')->putFile('uploads/staff', $request->file('image'));
        } else {
            $file_path = $staff->staff_image;
        }

        DB::table('staff')
        ->where('id', $request->id)
        ->update([
            'staff_name'        => $request->staffName,
            'staff_position'    => $request->staffPosition,
            'staff_image'       => $file_path,
            'staff_message'     => $request->staffMessage,
            'sort_order'        => !empty($request->sortOrder) ? $request->sortOrder : 0,
            'status'            => $request->status,
            'updated_at'        => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.theme.staff.index')->with('success_msg', 'Chỉnh sửa nhân sự thành công');
    }

    public function getDelete($staffId) {
        $staff = Staff::findOrFail($staffId);

        // delete image
        if(!empty($staff->staff_image)) {
            Storage::disk('public')->delete($staff->staff_image);
        }

        // delete record
        DB::table('staff')->where('id', '=', $staffId)->delete();

        return redirect()->route('admin.theme.staff.index')->with('success_msg', 'Xóa nhân sự mới thành công');
    }
}
