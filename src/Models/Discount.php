<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Business;
use App\Models\Product;

class Discount extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'business_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [
        'id',
        'business_id',
        'product_id',
        'created_at',
        'updated_at',
        'deleted_at',
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
