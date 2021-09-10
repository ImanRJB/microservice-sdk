<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business;
use App\Models\Iban;

class Sharing extends Model
{
    protected $hidden = [
        'business_id',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id',
        'business_id',
        'iban_id',
        'created_at',
        'updated_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function iban()
    {
        return $this->belongsTo(Iban::class);
    }
}

