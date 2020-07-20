<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAdress extends Model
{
    protected $primaryKey = 'shipping_adresses_id';

    protected $fillable = [
        'shipping_adresses_fullname',
        'shipping_adresses_adress1',
        'shipping_adresses_adress2',
        'shipping_adresses_phone1',
        'shipping_adresses_phone2',
        'shipping_adresses_email',
    ];
}
