<?php

namespace App\Services\Voucher;

use App\Models\Voucher;
use App\Enums\VoucherType;

class Logic
{
    public function calculateDiscount($code, $total)
    {
        $voucher = Voucher::where('code', $code)->first();
        if (!$voucher) return 0;

        if ($voucher->type == VoucherType::FIXED) return $total - $voucher->value;

        if ($voucher->type == VoucherType::PERCENT) return $total * $voucher->value / 100;
    }
}