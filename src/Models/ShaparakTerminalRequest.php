<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;
use App\Models\Irankish;

class ShaparakTerminalRequest extends Model
{
    protected $visible = [];

    protected $fillable = [];

    public function irankish()
    {
        return $this->belongsTo(Irankish::class);
    }
}
