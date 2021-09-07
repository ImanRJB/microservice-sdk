<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;
use App\Models\ShaparakTerminalRequest;

class Irankish extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'psp_verified_at',
        'rejected_at',
    ];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function shaparakTerminalRequest()
    {
        return $this->belongsTo(ShaparakTerminalRequest::class);
    }
}
