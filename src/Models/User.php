<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ShaparakUserRequest;
use App\Models\Business;
use App\Models\Ticket;
use App\Models\Message;

class User extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'first_name_en',
        'last_name_en',
        'father_name_en',
        'gender',
        'residency_type',
        'vital_status',
        'block',
        'otp',
        'national_card_photo',
        'otp_expires_in',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'mobile',
        'national_code',
        'birth_date',
        'national_card_photo',
    ];

    public function shaparakUserRequests()
    {
        return $this->hasMany(ShaparakUserRequest::class);
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
