<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Business;
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

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'completed_at',
        'uploaded_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function withdrawRecords()
    {
        return $this->hasMany(WithdrawRecord::class);
    }
}

