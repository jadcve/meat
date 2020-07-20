<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Image;
use App\Product;
use App\ShopinCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $brand = DB::table('brands')
            ->select('brand_id','brand_name')
            ->pluck('brand_name', 'brand_id');

        $category = DB::table('categories')
            ->select('category_id','category_name')
            ->pluck('category_name', 'category_id');

        return view('products.create', compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $productImage = $request->file('product_image');
        $productExt = $productImage->extension();
        $path = $productImage->storeAs(
            'product_image',
            "photo product ".'- '.$request->product_name.' - '.date('Y-m-d').' - '.\Carbon\Carbon::now()->timestamp.'.'.$productExt
        );


        try {
            DB::beginTransaction();

            $product = new Product();
            $product->product_sku = $request->product_sku;
            $product->product_description = $request->product_description;
            $product->product_name = $request->product_name;
            $product->product_qty = $request->product_qty;
            $product->product_price = $request->product_price;
            $product->brand_id = $request->brand_id;
            $product->category_id =  $request->category_id;
            $product->product_owner_id = Auth::id();
            $product->save();

            if($product->save()){
                $image = new Image();
                $image->image_path = $path;
                $image->product_id = $product->product_id;
                $image->save();
            }

            DB::commit();
            flash('el producto se creo correctamente.')->success();
            return redirect('product');

        }catch (\Exception $e) {
            DB::rollBack();
            flash('Error al crear el producto.')->error();
           // flash($e->getMessage())->error();
            return redirect('product');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_id =  Crypt::decrypt($id);
       $product = Product::findOrfail($product_id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product_id =  Crypt::decrypt($id);
        $product = Product::findOrfail($product_id);


        $brand = DB::table('brands')
            ->select('brand_id','brand_name')
            ->pluck('brand_name', 'brand_id');

        $category = DB::table('categories')
        ->select('category_id','category_name')
        ->pluck('category_name', 'category_id');

        return view('products.edit', compact('product','brand', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $product_id =  Crypt::decrypt($id);
        $product = Product::findOrfail($product_id);

        if(is_null($request->file('product_image'))){

            try {

                $product->product_sku = $request->product_sku;
                $product->product_description = $request->product_description;
                $product->product_name = $request->product_name;
                $product->product_qty = $request->product_qty;
                $product->product_price = $request->product_price;
                $product->brand_id = $request->brand_id;
                $product->category_id =  $request->category_id;
                $product->product_owner_id = Auth::id();
                $product->save();

                DB::commit();
                flash('el producto fue modificado correctamente.')->success();
                return redirect('product');

            }catch (\Exception $e) {

                flash('Error al modificar el producto.')->error();
                // flash($e->getMessage())->error();
                return redirect('product');
                }

        }else {

            $productImage = $request->file('product_image');
            $productExt = $productImage->extension();
            $path = $productImage->storeAs(
                'product_image',
                "photo product ".'- '.$request->product_name.' - '.date('Y-m-d').' - '.\Carbon\Carbon::now()->timestamp.'.'.$productExt
            );


            try {
                DB::beginTransaction();
                $product->product_sku = $request->product_sku;
                $product->product_description = $request->product_description;
                $product->product_name = $request->product_name;
                $product->product_qty = $request->product_qty;
                $product->product_price = $request->product_price;
                $product->brand_id = $request->brand_id;
                $product->category_id =  $request->category_id;
                $product->product_owner_id = Auth::id();
                $product->save();

                if($product->save()){
                    $image = new Image();
                    $image->image_path = $path;
                    $image->product_id = $product->product_id;
                    $image->save();
                }

                DB::commit();
                flash('el producto se creo correctamente.')->success();
                return redirect('product');

            }catch (\Exception $e) {
                DB::rollBack();
                flash('Error al crear el producto.')->error();
               // flash($e->getMessage())->error();
                return redirect('product');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     /**
     * Add products to shoping card.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCard(Request $request, $id)
    {
        $product_id =  Crypt::decrypt($id);
        $product = Product::findOrfail($product_id);

        try {
            DB::beginTransaction();

            $cart = new ShopinCart();
            $cart->product_id = $product->product_id;
            $cart->user_id = Auth::id();
            $cart->shoping_cart_qty = $request->product_qty;
            $cart->shoping_cart_processed = false;
            $cart->shoping_cart_deleted = false;
            $cart->save();

            if($cart->save()){
                $product->product_qty = ($product->product_qty - $request->product_qty);
                $product->save();
            }
            DB::commit();

            flash('el producto se agrego correctamente al carrito.')->success();
            return redirect('product_list');

        }catch (\Exception $e) {
            DB::rollBack();

            flash('Error al agregar producto, intente mas tarde.')->error();
            //flash($e->getMessage())->error();
            return redirect('product_list');
        }
    }


     /**
     * See products in shoping card.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showLandingProducts()
    {

        if(Auth::guard()->check()==true){
            $products = Product::all();
            return view('landing',compact('products'));
        }else{
            $products = Product::all();
            return view('welcome',compact('products'));
        }

    }




}
