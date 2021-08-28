<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawRecord extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'cycle_date',
    ];
}
