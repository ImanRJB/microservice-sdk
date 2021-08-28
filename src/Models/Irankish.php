<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;

class Irankish extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'psp_verified_at',
        'rejected_at',
    ];
}
