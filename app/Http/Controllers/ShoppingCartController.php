<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Landing\PageProduct;
use Illuminate\Http\Request;
use Cart;

class ShoppingCartController extends Controller
{
    public function getAddToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (!Product::where('id', $productId)->exists()) {
            return response()->json([
                'status' => 'E0',
                'message' => 'Sản phẩm không còn tồn tại trên hệ thống',
            ]);
        }

        // Add to cart
        $product = Product::where('id', $productId)->first();

        // Cast data
        $image = !empty($product->image) ? asset('storage/' . $product->image) : asset('storage/uploads/default.png');

        Cart::add([
            'id' => $product->id,
            'name' => $product->productDescription->name, 
            'qty' => (int)$quantity, 
            'price' => (double)$product->price, 
            'options' => [
                    'sku' => $product->sku,
                    'image' => $image,
                    'quantity_max' => $product->quantity,
                ]
            ]);

        return response()->json([
            'status' => 200,
            'message' => 'Thêm sản phẩm thành công',
            'cart' => Cart::content(),
        ]);
    }

    public function getList() 
    {
        return response()->json([
            'status' => 200,
            'data' => [
                'data' => Cart::content(),
                'quantity_total' => Cart::count(),
                'price_total' => Cart::total(0),
            ],
        ]);
    }

    public function getRemoveItem(Request $request) 
    {
        Cart::remove(trim($request->input('row_id')));

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }

    public function getUpdateItem(Request $request) 
    {
        $rowId = $request->input('row_id');
        $quantity = $request->input('quantity');

        Cart::update($rowId, $quantity);

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }

    public function getAddPromotionProduct(Request $request)
    {
        $productId = $request->input('product_id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);
        $image = $request->input('image');
        $sku = $request->input('sku', 'PROMO-' . time());

        // Convert price from string like "55.000đ" to number
        $priceNumeric = (double) str_replace(['.', 'đ', ','], '', $price);

        $product = PageProduct::find($productId);

        // Use separate cart instance for promotion page
        Cart::instance('promotion')->add([
            'id' => $product->id,
            'name' => $name,
            'qty' => (int)$quantity,
            'price' => $priceNumeric,
            'options' => [
                'sku' => $product->sku,
                'image' => $image ?: asset('catalog/assets/img/lazy-product.png'),
                'quantity_max' => 999,
            ]
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Thêm sản phẩm thành công',
            'cart' => Cart::instance('promotion')->content(),
        ]);
    }

    public function getPromotionCartList() 
    {
        return response()->json([
            'status' => 200,
            'data' => [
                'data' => Cart::instance('promotion')->content(),
                'quantity_total' => Cart::instance('promotion')->count(),
                'price_total' => Cart::instance('promotion')->total(0),
            ],
        ]);
    }

    public function getRemovePromotionItem(Request $request) 
    {
        Cart::instance('promotion')->remove(trim($request->input('row_id')));

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }

    public function getUpdatePromotionItem(Request $request) 
    {
        $rowId = $request->input('row_id');
        $quantity = $request->input('quantity');

        Cart::instance('promotion')->update($rowId, $quantity);

        return response()->json([
            'status' => 200,
            'message' => 'success',
        ]);
    }
}
