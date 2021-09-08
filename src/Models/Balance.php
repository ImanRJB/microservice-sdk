<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class Balance extends Model
{
    protected $visible = [];

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

