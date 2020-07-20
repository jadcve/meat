<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_path',
        'product_id',
    ];

    public function belongsToProduct(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
