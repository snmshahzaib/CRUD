<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{

    protected $fillable = ['user_id','title', 'discription'];
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product', 'product_id', 'category_id');
    }
}
