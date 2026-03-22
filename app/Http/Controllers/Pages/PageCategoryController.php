<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Str;

use App\Models\Landing\PageCategory;

class PageCategoryController extends Controller
{
    public function index() {
        $data = PageCategory::all();

        $headingTitle = heading(__('Category'));
        $pageTitle = __('Category');

        return view('admin.pages.landing-category.index',
            compact('headingTitle', 'pageTitle', 'data')
        );
    }

    public function create() {
        $categories = PageCategory::all();

        $headingTitle = heading(__('Add New'));
        $titlePage = __('Add New');

        return view('admin.pages.landing-category.create',
            compact('headingTitle', 'titlePage', 'categories')
        );
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'categoryName'  => 'required|max:100|unique:page_categories,name',
            'metaTitle'     => 'required|max:100'
        ],[
            'categoryName.required'     => 'Tên danh mục không được bỏ trống!',
            'categoryName.max'          => 'Tên danh mục tối đa 100 ký tự',
            'categoryName.unique'       => 'Tên danh mục đã được sử dụng!',
            'metaTitle.required'        => 'Meta Title không được bỏ trống!',
            'metaTitle.max'             => 'Meta Title tối đa 100 ký tự',
        ]);

        $file_path = '';
        if($request->hasFile('file')) {
            $file_path = Storage::disk('public')->putFile('uploads/page-cateogry', $request->file('file'));
        }

        $productCategory                    = new PageCategory();
        $productCategory->page_id           = 1;
        $productCategory->image             = $file_path;
        $productCategory->name              = $request->categoryName;
        $productCategory->slug              = Str::slug($request->categoryName, '-');
        $productCategory->description       = $request->description;
        $productCategory->meta_title        = $request->metaTitle;
        $productCategory->meta_description  = $request->metaDescription;
        $productCategory->meta_keyword      = $request->metaTagKeywords;
        $productCategory->parent_id         = $request->parentId;
        $productCategory->sort_order        = $request->sortOrder;
        $productCategory->status            = $request->status;
        $productCategory->save();

        return redirect()->route('admin.landing.category.index')->with('success_msg', __(':module created successfully', ['module' => __('Category')]));
    }

    public function edit($categoryId) {
        $category = PageCategory::findOrFail($categoryId);
        $categories = PageCategory::all();

        $title = __('Edit :module', ['module' => __('Category')]).': '. $category->name;
        $headingTitle = heading($title);
        $pageTitle = $title;

        return view('admin.pages.landing-category.edit',
            compact('headingTitle', 'pageTitle', 'category', 'categories')
        );
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'categoryName'  => 'required|max:100|unique:page_categories,name,' . $request->id,
            'metaTitle'     => 'required|max:100'
        ],[
            'categoryName.required'     => 'Tên danh mục không được bỏ trống!',
            'categoryName.max'          => 'Tên danh mục tối đa 100 ký tự',
            'categoryName.unique'       => 'Tên danh mục đã được sử dụng!',
            'metaTitle.required'        => 'Meta Title không được bỏ trống!',
            'metaTitle.max'             => 'Meta Title tối đa 100 ký tự',
        ]);

        $productCategory = PageCategory::findOrFail($request->id);

        if($request->hasFile('file')) {
            Storage::disk('public')->delete($productCategory->image);
            $file_path = Storage::disk('public')->putFile('uploads/page-category', $request->file('file'));
        } else {
            $file_path = $productCategory->image;
        }

        $productCategory->image             = $file_path;
        $productCategory->name              = $request->categoryName;
        $productCategory->slug              = Str::slug($request->categoryName, '-');
        $productCategory->description       = $request->description;
        $productCategory->meta_title        = $request->metaTitle;
        $productCategory->meta_description  = $request->metaDescription;
        $productCategory->meta_keyword      = $request->metaTagKeywords;
        $productCategory->parent_id         = $request->parentId;
        $productCategory->sort_order        = $request->sortOrder;
        $productCategory->status            = $request->status;
        $productCategory->save();

        return redirect()->route('admin.landing.category.index')->with('success_msg', __(':module updated successfully', ['module'=> __('Category')]));
    }

    public function delete($id) {
        $record = PageCategory::findOrFail($id);
        // delete in product to category table
        // $category->products()->detach();

        $record->delete();

        return redirect()->route('admin.landing.category.index')->with('success_msg', __(':module deleted successfully', ['module' => 'Category']));
    }
}
