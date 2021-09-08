<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\JobCategory;
use App\Models\Province;
use App\Models\Terminal;
use App\Models\Iban;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Withdraw;
use App\Models\Sharing;
use App\Models\Transaction;
use App\Models\DashboardChart;
use App\Models\ShaparakTaxRequest;

class Business extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'user_id',
        'job_category_id',
        'province_id',
        'name_en',
        'com_name_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = [
        'id',
        'user_id',
        'province_id',
        'name_en',
        'personal',
        'com_name_en',
        'block',
        'created_at',
        'updated_at',
        'deleted_at',
        'verified_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'verified_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function terminals()
    {
        return $this->hasMany(Terminal::class);
    }

    public function ibans()
    {
        return $this->hasMany(Iban::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function sharings()
    {
        return $this->hasMany(Sharing::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function dashboardCharts()
    {
        return $this->hasMany(DashboardChart::class);
    }

    public function shaparakTaxRequests()
    {
        return $this->hasMany(ShaparakTaxRequest::class);
    }
}
