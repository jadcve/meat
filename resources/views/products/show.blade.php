@extends('adminlte::page')
@section('title','Product index')
@section('content')
@include('flash::message')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Agregar compra</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            {!! Form::open(['route'=> ['product.addToCard', Crypt::encrypt($product->product_id)], 'method'=>'POST']) !!}
                            <div class="form-group">
                                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                            </div>

                            <div class="form-group">
                                {!! Form::label('stock', 'Stock Disponible:')!!}
                                {!! Form::label('stock', $product->product_qty,)!!}
                            </div>

                            <div class="form-group">
                                <label for="product_qty" >Cantidad </label>
                                {!! Form::number('product_qty', '1', ['min' => '1', 'max' => $product->product_qty ,'placeholder'=>'Cantidad', 'class'=>'form-control col-sm-9']) !!}
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="product_sku" >SKU </label>
                                {!! Form::text('product_sku', $product->product_sku, ['placeholder'=>'SKU', 'class'=>'form-control col-sm-9', 'readonly']) !!}
                            </div>
                            <div class="form-group">
                                <label for="product_name" >Nombre </label>
                                {!! Form::text('product_name', $product->product_name, ['placeholder'=>'Nombre', 'class'=>'form-control col-sm-9','readonly']) !!}
                            </div>
                            <div class="form-group">
                                <label for="product_price" >Precio </label>
                                {!! Form::number('product_price', $product->product_price, ['min' => '0','placeholder'=>'Precio', 'class'=>'form-control col-sm-9','readonly']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_description" >Descripción</label>
                                {!! Form::text('product_description', $product->product_name, ['placeholder'=>'Descripción', 'class'=>'form-control col-sm-9','readonly']) !!}
                            </div>
                            <div class="form-group">
                                <label for="brand_id" >Marca </label>
                                {!! Form::text('brand_id', $product->oneBrand->brand_name,['class'=>'form-control col-sm-9', 'readonly']) !!}
                            </div>
                            <div class="form-group">
                                <label for="category_id" >Categoria </label>
                                {!! Form::text('category_id', $product->oneCategory->category_name, ['class'=>'form-control col-sm-9', 'required'=>'required','readonly']) !!}
                            </div>

                        </div>
                    </div>

                    <div class="text-right pb-5">

                            {!! Form::submit('Agregar al carrito ', ['class' => 'btn btn-primary block full-width m-b']) !!}
                            {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
