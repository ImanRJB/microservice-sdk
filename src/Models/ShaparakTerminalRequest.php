<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;

class ShaparakTerminalRequest extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function irankishs()
    {
        return $this->hasOne(Irankish::class);
    }
}
