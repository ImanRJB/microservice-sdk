<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $visible = [
        'body',
    ];

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
