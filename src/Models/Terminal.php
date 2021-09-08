<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Business;
use App\Models\Iban;
use App\Models\Irankish;
use App\Models\ShaparakTerminalRequest;

class Terminal extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'business_id',
        'fee_percent',
        'max_fee',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ip',
        'settlement_period',
        'fee_payer'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'rejected_at',
        'displayed_at',
        'verified_at',
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
