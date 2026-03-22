<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use Str;

// Models
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\ProductStatus;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function __construct() {

    }

    public function getList() {
        $products = Product::orderBy('created_at', 'desc')->get();

        $headingTitle = heading('Danh sách sản phẩm');
        $pageTitle = 'Danh sách sản phẩm';

        return view('admin.pages.product.list',
            compact('headingTitle', 'pageTitle', 'products')
        );
    }

    public function getAdd() {
        // product categories
        $categories = ProductCategory::all();
        // product groups
        $groups = ProductGroup::all();
        // product status
        $status = ProductStatus::all();

        $headingTitle = heading('Thêm sản phẩm mới');
        $pageTitle = 'Thêm sản phẩm mới';

        return view('admin.pages.product.add',
            compact('headingTitle', 'pageTitle', 'categories', 'groups', 'status')
        );
    }

    public function postAdd(Request $request) {
        $validated = $request->validate([
            'name'          => 'required|max:255|unique:product_description,name',
            'sku'           => 'unique:product,sku',
            'metaTitle'     => 'required|max:255',
            'categories'    => 'required|array',
            'categories.*'  => 'required|integer',
        ],[
            'name.required'        => 'Tên sản phẩm không được bỏ trống!',
            'name.max'             => 'Tên sản phẩm tối đa 255 ký tự!',
            'name.unique'          => 'Tên sản phẩm đã được sử dụng!',
            'sku.unique'           => 'Mã sản phẩm đã tồn tại!',
            'metaTitle.required'   => 'Thẻ tiêu đề không được bỏ trống!',
            'metaTitle.max'        => 'Thẻ tiêu đề tối đa 255 ký tự!',
            'categories.required'  => 'Vui lòng chọn danh mục sản phẩm!',
        ]);

        // set default if empty
        $sku = !empty($request->sku) ? $request->sku : $this->generateSKU();
        $originalPrice = !empty($request->originalPrice) ? $request->originalPrice : 0;
        $price = !empty($request->price) ? $request->price : 0;
        $sortOrder = !empty($request->sortOrder) ? $request->sortOrder : 0;

        // custom image
        $file_path = '';
        if($request->hasFile('image')) {
            $file_path = Storage::disk('public')->putFile('uploads/product', $request->file('image'));
        }

        // add to product table
        $product_id = DB::table('product')->insertGetId([
            'sku'               => $sku,
            'image'             => $file_path,
            'quantity'          => 0,
            'stock_status_id'   => $request->stockStatus,
            'original_price'    => $originalPrice,
            'price'             => $price,
            'quantity'          => !empty($request->quantity) ? (int) $request->quantity : 0,
            'point'             => 0,
            'shopee_link'       => $request->shopeeLink,
            'date_available'    => date('Y-m-d H:i:s'),
            'viewed'            => 0,
            'display'           => $request->display,
            'featured'          => $request->featured,
            'status'            => $request->status,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
        ]);

        // add to product description
        DB::table('product_description')->insertOrIgnore([
            'product_id'        => $product_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name, '-'),
            'description'       => $request->description,
            'detail'            => $request->detail,
            'tag'               => $request->productTag,
            'meta_title'        => $request->metaTitle,
            'meta_description'  => $request->metaDescription,
            'meta_keyword'      => $request->metaKeywords,
        ]);

        // get product by id
        $product = Product::find($product_id);

        // add product to category table
        if(count($request->categories)){
            $product->toCategory()->attach($request->categories);
        }

        // add product to group table
        if(!empty($request->groups) && count($request->groups)){
            $product->toGroup()->attach($request->groups);
        }

        return redirect()->route('admin.product.getList')->with('success_msg', 'Bạn đã thêm sản phẩm mới thành công');
    }

    public function getEdit($productId) {
        // product categories
        $categories = ProductCategory::all();
        $productToCategory = DB::table('product_to_category')->where('product_id', $productId)->get();

        $categorySelected = array();
        foreach($productToCategory as $value) {
            $categorySelected[] = $value->category_id;
        }

        // product groups
        $groups = ProductGroup::all();
        $productToGroup = DB::table('product_to_group')->where('product_id', $productId)->get();

        $groupSelected = array();
        foreach($productToGroup as $value) {
            $groupSelected[] = $value->group_id;
        }
        // product status
        $status = ProductStatus::all();

        $product = Product::findOrFail($productId);

        $headingTitle = heading('Chỉnh sửa sản phẩm');
        $pageTitle = 'Chỉnh sửa sản phẩm';

        return view('admin.pages.product.edit',
            compact('headingTitle', 'pageTitle', 'categories', 'categorySelected', 'groups', 'groupSelected', 'status', 'product')
        );
    }

    public function postEdit(Request $request) {
        $validated = $request->validate([
            'name'          => 'required|max:255|unique:product_description,name,'.$request->id.',product_id',
            'sku'           => 'required|unique:product,sku,' . $request->id,
            'metaTitle'     => 'required|max:255',
            'categories'    => 'required|array',
            'categories.*'  => 'required|integer',
        ],[
            'name.required'        => 'Tên sản phẩm không được bỏ trống!',
            'name.max'             => 'Tên sản phẩm tối đa 255 ký tự!',
            'name.unique'          => 'Tên sản phẩm đã được sử dụng!',
            'sku'                  => 'Mã sản phẩm không được bỏ trống!',
            'sku.unique'           => 'Mã sản phẩm đã tồn tại!',
            'metaTitle.required'   => 'Thẻ tiêu đề không được bỏ trống!',
            'metaTitle.max'        => 'Thẻ tiêu đề tối đa 255 ký tự!',
            'categories.required'  => 'Vui lòng chọn danh mục sản phẩm!',
        ]);

        // get product by id
        $product = Product::findOrFail($request->id);

        // get image input
        if($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $file_path = Storage::disk('public')->putFile('uploads/product', $request->file('image'));
        } else {
            $file_path = $product->image;
        }

        // set default if empty
        $originalPrice = !empty($request->originalPrice) ? $request->originalPrice : 0;
        $price = !empty($request->price) ? $request->price : 0;
        $sortOrder = !empty($request->sortOrder) ? $request->sortOrder : 0;

        // update product table
        DB::table('product')
        ->where('id', $request->id)
        ->update([
            'sku'               => $request->sku,
            'image'             => $file_path,
            'stock_status_id'   => $request->stockStatus,
            'original_price'    => $originalPrice,
            'price'             => $price,
            'quantity'          => !empty($request->quantity) ? (int) $request->quantity : 0,
            'shopee_link'       => $request->shopeeLink,
            'display'           => $request->display,
            'featured'          => $request->featured,
            'status'            => $request->status,
            'updated_at'        => date('Y-m-d H:i:s')
        ]);

        // update product description table
        DB::table('product_description')
        ->where('product_id', $request->id)
        ->update([
            'name'              => $request->name,
            'slug'              => Str::slug($request->name, '-'),
            'description'       => $request->description,
            'detail'            => $request->detail,
            'tag'               => $request->productTag,
            'meta_title'        => $request->metaTitle,
            'meta_description'  => $request->metaDescription,
            'meta_keyword'      => $request->metaKeywords,
        ]);

        // sync product to category table
        if(count($request->categories)){
            $product->toCategory()->sync($request->categories);
        }

        // sync product to group table
        if(!empty($request->groups) && count($request->groups)){
            $product->toGroup()->sync($request->groups);
        }

        return redirect()->route('admin.product.getList')->with('success_msg', 'Bạn đã chỉnh sửa sản phẩm thành công');
    }

    public function getDelete($productId) {
        // delete additional image
        $images = ProductImage::where('product_id', $productId)->get();
        foreach($images as $item) {
            if(!empty($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            DB::table('product_image')->where('id', "=", $item->id)->delete();
        }


        // get product by id
        $product = Product::findOrFail($productId);

        // remove image
        if(!empty($product->image)) {
            Storage::delete($product->image);
        }

        // detele product table
        DB::table('product')->where('id', $productId)->delete();

        // detele product desciption table
        DB::table('product_description')->where('product_id', $productId)->delete();

        // delete in product to category table
        $product->toCategory()->detach();

        // delete in product to group table
        $product->toGroup()->detach();

        return redirect()->route('admin.product.getList')->with('success_msg', 'Bạn đã xóa sản phẩm thành công');
    }

    public function getAddImage($productId) {
        $images = ProductImage::where('product_id', $productId)->orderBy('sort_order', 'asc')->get();

        $headingTitle = heading('Thêm ảnh bổ sung sản phẩm');
        $pageTitle = 'Thêm ảnh bổ sung sản phẩm';

        return view('admin.pages.product.image.add',
            compact('headingTitle', 'pageTitle', 'productId', 'images')
        );
    }

    public function postAddImage(Request $request) {
        $validated = $request->validate([
            'image'          => 'required',
        ],[
            'image.required'        => 'Vui lòng chọn ảnh sản phẩm!',
        ]);

        // set default if empty
        $sortOrder = !empty($request->sortOrder) ? $request->sortOrder : 0;

        // add image
        $file_path = '';
        if($request->hasFile('image')) {
            $file_path = Storage::disk('public')->putFile('uploads/product/additional', $request->file('image'));
        }

       DB::table('product_image')->insert([
            'product_id'        => $request->id,
            'image'             => $file_path,
            'sort_order'        => $sortOrder
        ]);

        return redirect()->back()->with('success_msg', 'Thêm ảnh thành công');
    }

    public function getEditImage($productId, $imageId) {
        $image = ProductImage::findOrFail($imageId);

        $headingTitle = heading('Chỉnh sửa ảnh');
        $pageTitle = 'Chỉnh sửa ảnh';

        return view('admin.pages.product.image.edit',
            compact('headingTitle', 'pageTitle', 'productId', 'image')
        );
    }

    public function postEditImage(Request $request) {
        // get product image by id
        $image = ProductImage::findOrFail($request->id);

        // get image input
        if($request->hasFile('image')) {
            Storage::disk('public')->delete($image->image);
            $file_path = Storage::disk('public')->putFile('uploads/product/additional', $request->file('image'));
        } else {
            $file_path = $image->image;
        }

        // set default if empty
        $sortOrder = !empty($request->sortOrder) ? $request->sortOrder : 0;

        // update product image table
        DB::table('product_image')
        ->where('id', $request->id)
        ->update([
            'image'               => $file_path,
            'sort_order'          => $sortOrder
        ]);

        return redirect()->route('admin.product.image.getAddImage', $request->productId)->with('success_msg', 'Chỉnh sửa ảnh thành công');
    }

    public function getDeleteImage($imageId) {
        // get product image by id
        $image = ProductImage::findOrFail($imageId);

        // remove image
        if(!empty($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return redirect()->back()->with('success_msg', 'Xóa ảnh thành công');
    }
}
