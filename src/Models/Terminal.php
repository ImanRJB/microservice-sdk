<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terminal extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'rejected_at',
        'displayed_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function iban()
    {
        return $this->belongsTo(Iban::class);
    }

    public function irankish()
    {
        return $this->hasOne(Irankish::class);
    }

    public function shaparakTerminalRequests()
    {
        return $this->hasMany(ShaparakTerminalRequest::class);
    }
}
