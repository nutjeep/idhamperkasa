<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Gallery;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function gallery() {
        return $this->hasMany(Gallery::class);
    }

    protected $guarded = ['id']; 
    protected $fillable = ['product_name', 'category_id', 'slug', 'catalog'];
}
