<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use DB;

// Models
use App\Models\Slide;

class SlideController extends Controller
{
    public function index() {
        $slides = Slide::orderBy('sort_order')->get();

        $headingTitle = heading('Slide quảng cáo');
        $pageTitle = 'Slide quảng cáo';

        return view('admin.pages.slide.index',
            compact('headingTitle', 'pageTitle', 'slides')
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
            $file_path = Storage::disk('public')->putFile('uploads/slide', $request->file('image'));
        }

        DB::table('slide')->insert([
            'image'         => $file_path,
            'link'          => $request->link,
            'sort_order'    => !empty($request->sortOrder) ? $request->sortOrder : 0,
            'status'        => $request->status,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.theme.slide.index')->with('success_msg', 'Thêm slide mới thành công');
    }

    public function getEdit($slideId) {
        $slide = Slide::findOrFail($slideId);

        $headingTitle = heading('Chỉnh sửa slide');
        $pageTitle = 'Chỉnh sửa slide';

        return view('admin.pages.slide.edit',
            compact('headingTitle', 'pageTitle', 'slide')
        );
    }

    public function postEdit(Request $request) {
        $slide = Slide::findOrFail($request->id);

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($slide->image);
            $file_path = Storage::disk('public')->putFile('uploads/slide', $request->file('image'));
        } else {
            $file_path = $slide->image;
        }

        DB::table('slide')
        ->where('id', $request->id)
        ->update([
            'image'         => $file_path,
            'link'          => $request->link,
            'sort_order'    => !empty($request->sortOrder) ? $request->sortOrder : 0,
            'status'        => $request->status,
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.theme.slide.index')->with('success_msg', 'Lưu lại thành công');
    }

    public function getDelete($slideId) {
        $slide = Slide::findOrFail($slideId);

        // delete image
        if(!empty($slide->image)) {
            Storage::disk('public')->delete($slide->image);
        }

        // delete record
        DB::table('slide')->where('id', '=', $slideId)->delete();

        return redirect()->route('admin.theme.slide.index')->with('success_msg', 'Xóa slide thành công');
    }
}
