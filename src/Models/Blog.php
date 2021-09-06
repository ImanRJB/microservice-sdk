<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
