<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function companyId() {
        return $this->hasOne(Company::class);
    }
}
