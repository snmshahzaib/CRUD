<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductCategory extends Model
{
    protected $fillable = ['categories'];
    // public function products()
    // {
    //     return $this->belongsToMany(Products::class, 'category_product', 'category_id', 'product_id');
    // }
}
