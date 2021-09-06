<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $guarded = [];

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

    public function withdraw()
    {
        return $this->belongsTo(Withdraw::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }
}
