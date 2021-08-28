<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'birth_date',
        'register_date',
        'otp_expired_at',
        'email_verified_at',
        'rejected_at',
        'profile_verified_at',
        'shaparak_verified_at',
        'register_submitted_at',
    ];
}
