<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_sku'		    =>	'105958745',
            'product_name'		    =>	'Teclado Razer',
            'product_description'   =>  'Teclado mecánico para gamer ',
            'product_qty'           =>  '10',
            'product_price'			=>  '95990',
            'brand_id'              =>  '5',
            'category_id' 		    =>  '3',
            'product_owner_id'      =>  '1',
        ]);

        Product::create([
            'product_sku'		    =>	'1578954123',
            'product_name'		    =>	'Audifonos Kraken',
            'product_description'   =>  'Audifonos multiplataforma gamer ',
            'product_qty'           =>  '10',
            'product_price'			=>  '65990',
            'brand_id'              =>  '5',
            'category_id' 		    =>  '2',
            'product_owner_id'      =>  '1',
        ]);

        Product::create([
            'product_sku'		    =>	'1636988745',
            'product_name'		    =>	'Laptop Lenovo',
            'product_description'   =>  'laptop Lenovo intel core i9 ',
            'product_qty'           =>  '10',
            'product_price'			=>  '999990',
            'brand_id'              =>  '2',
            'category_id' 		    =>  '1',
            'product_owner_id'      =>  '1',
        ]);

        Product::create([
            'product_sku'		    =>	'8784587458',
            'product_name'		    =>	'Monitor',
            'product_description'   =>  'Monitor 32 pulgadas  ',
            'product_qty'           =>  '10',
            'product_price'			=>  '660990',
            'brand_id'              =>  '6',
            'category_id' 		    =>  '1',
            'product_owner_id'      =>  '1',
        ]);

        Product::create([
            'product_sku'		    =>	'9445120364',
            'product_name'		    =>	'Silla para juego',
            'product_description'   =>  'Silla confortable para escritorio',
            'product_qty'           =>  '10',
            'product_price'			=>  '150990',
            'brand_id'              =>  '7',
            'category_id' 		    =>  '1',
            'product_owner_id'      =>  '1',
        ]);

    }
}
