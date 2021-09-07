<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Business;
use App\Models\Terminal;
use App\Models\Sharing;

class Iban extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'verified_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function terminals()
    {
        return $this->hasMany(Terminal::class);
    }

    public function sharings()
    {
        return $this->hasMany(Sharing::class);
    }
}

