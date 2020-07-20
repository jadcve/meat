@extends('adminlte::page')
@section('title','Product index')
@section('content')
@include('flash::message')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
                <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Carrito de compras</h3>
                          <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTablePais" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $suma = 0;
                                            @endphp
                                            @foreach($cart as $p)
                                                @if(isset($cart))
                                                @php
                                                    $suma =  $suma +($p->product_price * $p->shoping_cart_qty);
                                                @endphp

                                                    <tr>
                                                        <td><small>{{ $p->product_sku }}</small></td>
                                                        <td><small>{{ $p->product_name }}</small></td>
                                                        <td><small>{{ $p->shoping_cart_qty}}</small></td>
                                                        <td><small>{{ $p->product_price }}</small></td>
                                                        <td><small>{{ $p->product_price * $p->shoping_cart_qty }}</small></td>
                                                        <td>
                                                            <small>
                                                                <a href="{{ route('cart.processPurchase', Crypt::encrypt($p->shoping_cart_id)) }}" class="btn-empresa"  title="Procesar Compra"><i class="far fa-edit"></i></a>
                                                            </small>

                                                            <small>
                                                                    <a href = "{{ route('cart.destroy', Crypt::encrypt($p->shoping_cart_id))  }}" onclick="return confirm('¿Esta seguro que desea eliminar este elemento?')" class="btn-empresa"><i class="far fa-trash-alt"></i>
                                                                    </a>
                                                            </small>
                                                        </td>
                                                    </tr>

                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <h2>Total a Pagar:  {{ $suma }}</h2>

                                </div>

                        </div>
                </div>
        </div>
    </div>
</div>

@stop
