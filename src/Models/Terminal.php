<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Business;
use App\Models\Iban;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Models\TerminalDashboard;
use App\Models\Irankish;

class Terminal extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'business_id',
        'fee_percent',
        'max_fee',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ip',
        'settlement_period',
        'fee_payer'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function iban()
    {
        return $this->belongsTo(Iban::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function terminalDashboard()
    {
        return $this->hasOne(TerminalDashboard::class);
    }

    public function irankish()
    {
        return $this->hasOne(Irankish::class);
    }
}
