<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;

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

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }
}

