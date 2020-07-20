@extends('adminlte::page')
@section('title','Product index')
@section('content')
@include('flash::message')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Dirección de Envío </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            {!! Form::open(['route'=> 'cart.sendProduct', 'method'=>'POST','files' => true]) !!}
                            <div class="form-group">
                                <label for="product_sku" >Nombre y Apellido <strong>*</strong></label>
                                {!! Form::text('shipping_adresses_fullname', null, ['placeholder'=>'Nombre y apellido ', 'class'=>'form-control col-sm-9', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="product_description" >Dirección 1 </label><strong> *</strong>
                                {!! Form::text('shipping_adresses_adress1', null, ['placeholder'=>'Dirección', 'class'=>'form-control col-sm-9','required']) !!}
                            </div>

                            <div class="form-group">
                                <label for="product_description" >Dirección 2</label>
                                {!! Form::text('shipping_adresses_adress2', null, ['placeholder'=>'Dirección 2', 'class'=>'form-control col-sm-9']) !!}
                            </div>

                            <div class="form-group">
                                <label for="product_description" >Celular </label><strong> *</strong></label>
                                {!! Form::text('shipping_adresses_phone1', null, ['placeholder'=>'+569XXXXXXXX', 'class'=>'form-control col-sm-9','required']) !!}
                            </div>

                            <div class="form-group">
                                <label for="product_description" > Telefono auxiliar</label>
                                {!! Form::text('shipping_adresses_phone2', null, ['placeholder'=>'+562XXXXXXXX', 'class'=>'form-control col-sm-9']) !!}
                            </div>

                            <div class="form-group">
                                <label for="product_description" >Correo electronico</label><strong> *</strong></label>
                                {!! Form::email('shipping_adresses_email', null, ['placeholder'=>'mail@mail.com', 'class'=>'form-control col-sm-9', 'required']) !!}
                            </div>

                        </div>


                    </div>

                    <div class="text-right pb-5">
                            {!! Form::submit('Procesar Pago ', ['class' => 'btn btn-primary block full-width m-b']) !!}
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
