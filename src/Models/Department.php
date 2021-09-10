<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Ticket;

class Department extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id'
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
