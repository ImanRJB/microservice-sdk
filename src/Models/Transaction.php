<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Business;
use App\Models\Product;

class Transaction extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'business_id',
        'product_id',
        'token',
        'psp_name',
        'psp_execution_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'amount',
        'mobile',
        'national_code',
        'callback_url',
        'card_no',
        'description',
        'note',
        'order_id',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'customer_note',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'initiated_at',
        'expired_at',
        'used_at',
        'verified_at',
        'paid_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
