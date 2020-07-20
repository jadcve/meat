@extends('adminlte::page')
@section('title','Product index')
@section('content')
@include('flash::message')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Editar Producto</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            {!! Form::open(['route'=> ['product.update', Crypt::encrypt($product->product_id)], 'method'=>'PATCH', 'files' => true]) !!}

                            <div class="form-group">
                                <label for="product_sku" >SKU <strong>*</strong></label>
                                {!! Form::text('product_sku', $product->product_sku, ['placeholder'=>'SKU', 'class'=>'form-control col-sm-9', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="product_description" >Descripción</label>
                                {!! Form::text('product_description', $product->product_name, ['placeholder'=>'Descripción', 'class'=>'form-control col-sm-9']) !!}
                            </div>

                            <div class="form-group">
                                <label for="brand_id" >Marca <strong>*</strong></label>
                                {!! Form::select('brand_id', $brand, $product->oneBrand->brand_name,['class'=>'form-control col-sm-9', 'required'=>'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_name" >Nombre </label><strong>*</strong>
                                {!! Form::text('product_name', $product->product_name, ['placeholder'=>'Nombre', 'class'=>'form-control col-sm-9']) !!}
                            </div>
                            <div class="form-group">
                                <label for="product_qty" >Cantidad </label><strong>*</strong>
                                {!! Form::number('product_qty', $product->product_qty, ['min' => '0','placeholder'=>'Cantidad', 'class'=>'form-control col-sm-9']) !!}
                            </div>
                            <div class="form-group">
                                <label for="category_id" >Categoria <strong>*</strong></label>
                                {!! Form::select('category_id', $category, $product->oneCategory->category_name, ['class'=>'form-control col-sm-9', 'required'=>'required']) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_price" >Precio </label><strong>*</strong>
                                {!! Form::number('product_price', $product->product_price, ['min' => '0','placeholder'=>'Precio', 'class'=>'form-control col-sm-9']) !!}
                            </div>
                            <div class="form-group">
                                <label for="product_image">Foto del Producto (Extensión JPEG/SVG) </label>
                                {!! Form::file('product_image') !!}
                            </div>
                        </div>
                    </div>

                    <div class="text-right pb-5">
                            {!! Form::submit('Editar Producto ', ['class' => 'btn btn-primary block full-width m-b']) !!}
                            {!! Form::close() !!}
                    </div>
                    <div class="text-center texto-leyenda">
                        <p><strong>*</strong> Campos obligatorios</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
