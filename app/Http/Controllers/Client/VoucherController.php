<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Services\Voucher\Logic;
use App\Enums\VoucherStatus;
use Gloudemans\Shoppingcart\Facades\Cart;

class VoucherController extends Controller
{
    public function check(Request $req)
    {
        $code = $req->get('voucher_code');
        $voucher = Voucher::where('code', $code)->where('is_active', VoucherStatus::ACTIVE)->first();

        if (!$voucher) {
            return response()->json([
                'success' => false,
                'message' => __(':module not found', ['module' => __('Voucher')]),
            ]);
        }

        $subTotal = Cart::instance('promotion')->total();
        $discount = (new Logic())->calculateDiscount($code, $subTotal);
        $total = $subTotal - $discount;

        return response()->json([
            'success' => true,
            'message' => __(':module found', ['module' => __('Voucher')]),
            'discount' => number_format($discount),
            'total' => number_format($total)
        ]);
    }
}
