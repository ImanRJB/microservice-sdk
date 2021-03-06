<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ShaparakUserRequest extends Model
{
    protected $visible = [];

    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
