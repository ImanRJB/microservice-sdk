<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business;

class Province extends Model
{
    protected $visible = [];

    protected $fillable = [];

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }
}
