<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'product_sku',
        'product_description',
        'product_qty',
        'product_price',
        'product_owner_id',
        'brand_id',
        'category_id'
    ];

    public function oneBrand (){
        return $this->hasOne(Brand::class, 'brand_id', 'brand_id');
    }

    public function oneCategory (){
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }


}
