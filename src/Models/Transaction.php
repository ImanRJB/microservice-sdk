<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Terminal;
use App\Models\Product;

class Transaction extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'business_id',
        'product_id',
        'token',
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

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
