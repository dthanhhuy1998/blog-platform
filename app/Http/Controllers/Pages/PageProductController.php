<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use Str;

use App\Models\Landing\PageCategory;
use App\Models\Landing\PageProduct;
use App\Models\Landing\PageProductDescription;
use App\Models\ProductStatus;
use App\Models\ProductImage;

class PageProductController extends Controller
{
    public function index() 
    {
        $products = PageProduct::orderBy('created_at', 'desc')->get();

        $title = __('Product List');
        $headingTitle = heading($title);
        $pageTitle = $title;

        return view('admin.pages.landing-product.index',
            compact('headingTitle', 'pageTitle', 'products')
        );
    }

    public function create() 
    {
        // product categories
        $categories = PageCategory::all();
        // product status
        $status = ProductStatus::all();

        $title = __('Add New');
        $headingTitle = heading($title);
        $pageTitle = $title;

        return view('admin.pages.landing-product.create',
            compact('headingTitle', 'pageTitle', 'categories', 'status')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $file_path = '';
        if($request->hasFile('image')) {
            $file_path = Storage::disk('public')->putFile('uploads/landing-product', $request->file('image'));
        }

        $product = PageProduct::create([
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
        ]);

        PageProductDescription::create([
            'product_id'        => $product->id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name, '-'),
            'description'       => $request->description,
            'detail'            => $request->detail,
            'tag'               => $request->productTag,
            'meta_title'        => $request->metaTitle,
            'meta_description'  => $request->metaDescription,
            'meta_keyword'      => $request->metaKeywords,
        ]);

        if(count($request->categories)) {
            $product->categories()->attach($request->categories);
        }

        return redirect()->route('admin.landing.product.index')->with('success_msg', __(':module created successfully', ['module' => __('Product')]));
    }

    public function edit($id) {
        $product = PageProduct::findOrFail($id);

        $categories = PageCategory::all();
        $productToCategories =$product->categories->pluck('id')->toArray();

        $status = ProductStatus::all();

        $title = __('Edit :module', ['module' => __('Product')]). ': '. $product->description->name;
        $headingTitle = heading($title);
        $pageTitle = $title;

        return view('admin.pages.landing-product.edit',
            compact('headingTitle', 'pageTitle', 'categories', 'productToCategories', 'status', 'product')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:255|unique:product_description,name,' . $request->id,
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

        $product = PageProduct::findOrFail($request->id);

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $file_path = Storage::disk('public')->putFile('uploads/landing-product', $request->file('image'));
        } else {
            $file_path = $product->image;
        }

        $originalPrice = !empty($request->originalPrice) ? $request->originalPrice : 0;
        $price = !empty($request->price) ? $request->price : 0;
        $sortOrder = !empty($request->sortOrder) ? $request->sortOrder : 0;

        $product->update([
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

        $product->description()->updateOrCreate(
            ['product_id' => $request->id],
            [
                'name'              => $request->name,
                'slug'              => Str::slug($request->name, '-'),
                'description'       => $request->description,
                'detail'            => $request->detail,
                'tag'               => $request->productTag,
                'meta_title'        => $request->metaTitle,
                'meta_description'  => $request->metaDescription,
                'meta_keyword'      => $request->metaKeywords,
            ]
        );

        if(count($request->categories)){
            $product->categories()->sync($request->categories ?? []);
        }

        return redirect()->route('admin.landing.product.index')->with('success_msg', __(':module updated successfully', ['module' => __('Product')]));
    }

    public function destroy($id)
    {
        $product = PageProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.landing.product.index')->with('success_msg', __(':module deleted successfully', ['module' => __('Product')]));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'images'   => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        
        foreach ($request->file('images') as $file) {
            $url = Storage::disk('public')->putFile('uploads/landing-product/images', $file);

            ProductImage::create([
                'product_id' => $request->product_id,
                'image' => $url,
                'sort_order' => $request->sort_order,
                'page_id' => 1,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => __('Upload successfully'),
        ]);
    }

    public function listImage($productId)
    {
        $images = ProductImage::where('page_id', 1)->where('product_id', $productId)->get();

        if (!$images) {
            return response()->json([
                'success' => false,
                'message' => __(':module not found', ['module' => __('Image')]),
            ]);
        }
        
        return response()->json([
            'success' => true,
            'data' => view('admin.pages.landing-product.partials.images', compact('images'))->render(),
        ]);
    }

    public function deleteImage($id)
    {
        $image = ProductImage::find($id);

        if (!$image) {
            return response()->json([
                'success' => false,
                'message' => __(':module not found', ['module' => __('Image')]),
            ]);
        }

        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return response()->json([
            'success' => true,
            'message' => __('Upload successfully'),
        ]);
    }
}
