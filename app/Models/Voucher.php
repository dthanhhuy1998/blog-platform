<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vouchers';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'page_id',
        'code',
        'type',
        'value',
        'max_discount',
        'min_order_value',
        'usage_limit',
        'used_count',
        'per_user_limit',
        'start_at',
        'end_at',
        'is_active',
        'exclusive',
        'description'
    ];

    public function orders()
    {
        return $this->hasMany(Invoice::class, 'voucher_id');
    }
}
