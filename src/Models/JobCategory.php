<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class JobCategory extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}

