<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{   
    protected $fillable = ['user_id', 'categories'];
    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product', 'category_id', 'product_id');
    }
}
