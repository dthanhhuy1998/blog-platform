<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'invoice_code',
        'firstname',
        'lastname',
        'fullname',
        'mobile',
        'province',
        'district',
        'ward',
        'address',
        'note',
        'product_count',
        'sub_total',
        'discount',
        'price_total',
        'tax',
        'status',
        'page_id',
        'voucher_id'
    ];

    public function relatedProvince() {
        return $this->belongsTo(Province::class, 'province', 'matp');
    }

    public function relatedDistrict() {
        return $this->belongsTo(District::class, 'district', 'maqh');
    }

    public function relatedWard() {
        return $this->belongsTo(Ward::class, 'ward', 'xaid');
    }

    public function relatedStatus() {
        return $this->belongsTo(InvoiceStatus::class, 'status', 'code');
    }

    public function voucher() {
        return $this->belongsTo(Voucher::class, 'voucher_id', 'id');
    }
}
