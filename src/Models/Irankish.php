<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;
use App\Models\ShaparakTerminalRequest;

class Irankish extends Model
{
    protected $visible = [];

    protected $fillable = [];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function shaparakTerminalRequests()
    {
        return $this->hasMany(ShaparakTerminalRequest::class);
    }
}
