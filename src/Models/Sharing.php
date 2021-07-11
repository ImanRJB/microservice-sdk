<?php

namespace Milyoona\ModelConsumer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sharing extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}

