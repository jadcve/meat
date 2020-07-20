<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmail;
use App\ShippingAdress;
use App\ShopinCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Product;

class PurchaseController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     //   $cart = ShopinCart::getProducts();
        $cart = DB::table('shopin_carts')
            ->join('products','shopin_carts.product_id','=','products.product_id')
            ->where('user_id', '=', Auth::id())
            ->Where(function($query) {
                $query->where('shoping_cart_deleted','=',0)
                      ->where('shoping_cart_processed','=',0);
            })
            ->select('products.product_name','products.product_price','shopin_carts.shoping_cart_qty','products.product_sku','products.product_id','shopin_carts.shoping_cart_id')
            ->get();

        return view('purchase.index', compact('cart'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_id =  Crypt::decrypt($id);

        try {
            $product = ShopinCart::findOrfail($product_id)->delete();


            flash('El producto seleccionado ha sido eliminado de su carrito de compra.')->success();
            return redirect('cart');
        }catch (\Exception $e) {

            flash('Error al intentar eliminar los datos del carrito de compra.')->error();
            flash($e->getMessage())->error();
            return redirect('cart');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processPurchase($id)
    {
        $product_id =  Crypt::decrypt($id);

        try {

            $product = ShopinCart::findOrfail($product_id);
            $product->shoping_cart_processed = true;
            $product->save();


            flash('Su producto fue procesado.')->success();
            return view('purchase.send_form');


        }catch (\Exception $e) {

            flash('Error al intentar procesar el producto')->error();
            flash($e->getMessage())->error();
            return redirect('cart');
        }

    }

    public function sendProduct(Request $request)
    {
        try {
            $data = $request->only( 'shipping_adresses_fullname',
                                    'shipping_adresses_adress1',
                                    'shipping_adresses_adress2',
                                    'shipping_adresses_phone1',
                                    'shipping_adresses_phone2',
                                    'shipping_adresses_email'
                                );

            $contact = ShippingAdress::create($data);
            $this->dispatch(new SendContactEmail($contact));

            flash('Compra realizada con exito!!')->success();
            return redirect('cart');

        }catch (\Exception $e) {

            flash('Error en la compra')->error();
            flash($e->getMessage())->error();
            return redirect('cart');
        }
    }

    public function sendMail()
    {
        return view('mailer.email');
    }

}
