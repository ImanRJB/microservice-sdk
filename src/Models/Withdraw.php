<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Terminal;
use App\Models\WithdrawRecord;

class Withdraw extends Model
{
    use SoftDeletes;

    protected $hidden = [
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

    public function withdrawRecords()
    {
        return $this->hasMany(WithdrawRecord::class);
    }
}

