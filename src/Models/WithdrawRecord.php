<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Withdraw;

class WithdrawRecord extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'cycle_date',
    ];

    public function withdraw()
    {
        return $this->belongsTo(Withdraw::class);
    }
}
