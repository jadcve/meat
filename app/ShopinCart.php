<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopinCart extends Model
{

    protected $primaryKey = 'shoping_cart_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shoping_cart_qty',
        'shoping_cart_processed',
        'shoping_cart_deleted',
        'product_id',
        'user_id',
    ];

    public function hasProducts (){
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

    /*
    public static function getProducts()
    {
        $cart = DB::table('shopin_carts')
            ->where('user_id', '=', Auth::id())
            ->Where(function($query) {
                $query->where('shoping_cart_deleted','=',0)
                      ->where('shoping_cart_processed','=',0);
            })
            ->get();

            return $cart;

    } */
}
