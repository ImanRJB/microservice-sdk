<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class Province extends Model
{
    use HasFactory;

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
