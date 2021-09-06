<?php

namespace Milyoona\MicroserviceSdk\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasFactory, SoftDeletes;

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
