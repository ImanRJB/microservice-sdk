<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class TerminalDashboard extends Model
{
    protected $hidden = [
        'id',
        'business_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

