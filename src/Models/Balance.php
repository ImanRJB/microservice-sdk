<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;

class Balance extends Model
{
    protected $visible = [];

    protected $fillable = [];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }
}

