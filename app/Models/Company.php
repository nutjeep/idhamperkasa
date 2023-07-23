<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use App\Models\CompanyDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product() {
        return $this->hasMany(Product::class);
    }

    public function companyDetail() {
        return $this->hasOne(CompanyDetail::class);
    }
}
