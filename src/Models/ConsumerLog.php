<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerLog extends Model
{
    protected $guarded = [];
    protected $casts = ['data' => 'json'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}