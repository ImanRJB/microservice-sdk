<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
