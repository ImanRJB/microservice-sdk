<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}

