<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'product_name',
        'product_price',
        'quantity',
        'discount',
        'subtotal',
        'tax',
        'options',
    ];
}
