<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Str;

// Model
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct() {

    }

    public function getList() {
        $productCategories = ProductCategory::all();

        $headingTitle = heading('Danh mục sản phẩm');
        $pageTitle = 'Danh mục sản phẩm';

        return view('admin.pages.product_category.list',
            compact('headingTitle', 'pageTitle', 'productCategories')
        );
    }

    public function getAdd() {
        $productCategories = ProductCategory::all();

        $headingTitle = heading('Tạo danh mục mới');
        $titlePage = 'Tạo danh mục mới';

        return view('admin.pages.product_category.add',
            compact('headingTitle', 'titlePage', 'productCategories')
        );
    }

    public function postAdd(Request $request) {
        $validated = $request->validate([
            'categoryName'  => 'required|max:100|unique:product_category,name',
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
            $file_path = Storage::disk('public')->putFile('uploads/product_category', $request->file('file'));
        }

        $productCategory                    = new ProductCategory();
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

        return redirect()->route('admin.product.category.getList')->with('success_msg', 'Bạn đã tạo danh mục sản phẩm thành công');
    }

    public function getEdit($categoryId) {
        $category = ProductCategory::findOrFail($categoryId);
        $categories = ProductCategory::all();

        $headingTitle = heading('Chỉnh sửa danh mục');
        $pageTitle = 'Chỉnh sửa danh mục';

        return view('admin.pages.product_category.edit',
            compact('headingTitle', 'pageTitle', 'category', 'categories')
        );
    }

    public function postEdit(Request $request) {
        $validated = $request->validate([
            'categoryName'  => 'required|max:100|unique:product_category,name,' . $request->id,
            'metaTitle'     => 'required|max:100'
        ],[
            'categoryName.required'     => 'Tên danh mục không được bỏ trống!',
            'categoryName.max'          => 'Tên danh mục tối đa 100 ký tự',
            'categoryName.unique'       => 'Tên danh mục đã được sử dụng!',
            'metaTitle.required'        => 'Meta Title không được bỏ trống!',
            'metaTitle.max'             => 'Meta Title tối đa 100 ký tự',
        ]);

        $productCategory = ProductCategory::findOrFail($request->id);

        if($request->hasFile('file')) {
            Storage::disk('public')->delete($productCategory->image);
            $file_path = Storage::disk('public')->putFile('uploads/product_category', $request->file('file'));
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

        return redirect()->route('admin.product.category.getList')->with('success_msg', 'Bạn đã chỉnh sửa danh mục sản phẩm thành công');
    }

    public function getDelete($categoryId) {
        // delete in product category table
        $category = ProductCategory::findOrFail($categoryId);
        if(!empty($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        // delete in product to category table
        $category->products()->detach();

        $category->delete();

        return redirect()->route('admin.product.category.getList')->with('success_msg', 'Bạn đã xóa danh mục sản phẩm thành công');
    }
}
