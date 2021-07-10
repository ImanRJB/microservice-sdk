<?php

namespace Milyoona\ModelConsumer\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumerLog extends Model
{
    protected $guarded = [];
    protected $casts = ['data' => 'json'];
}