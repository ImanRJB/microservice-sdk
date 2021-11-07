<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Terminal;
use App\Models\Iban;

class Sharing extends Model
{
    protected $hidden = [
        'business_id',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id',
        'business_id',
        'iban_id',
        'created_at',
        'updated_at',
    ];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function iban()
    {
        return $this->belongsTo(Iban::class);
    }
}

