<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Withdraw;

class WithdrawRecord extends Model
{
    protected $visible = [];

    protected $fillable = [];

    public function withdraw()
    {
        return $this->belongsTo(Withdraw::class);
    }
}
