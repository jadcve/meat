<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name'
    ];

    public function hasProducts()
    {
        return $this->hasMany('App\Product','product_id','product_id');
    }
}
