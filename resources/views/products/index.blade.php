@extends('adminlte::page')
@section('title','Product index')
@section('content')
@include('flash::message')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
                <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title">Listado de Productos</h3>
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
                                                <th>Descripcion</th>
                                                <th>Stock</th>
                                                <th>Marca</th>
                                                <th>Categoria</th>
                                                <th>Precio ($)</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $p)
                                            @if(isset($products))
                                                <tr>
                                                    <td><small>{{ $p->product_sku}}</small></td>
                                                    <td><small>{{ $p->product_name }}</small></td>
                                                    <td><small>{{ $p->product_description }}</small></td>
                                                    <td><small>{{ $p->product_qty }}</small></td>
                                                    <td><small>{{ $p->oneBrand->brand_name }}</small></td>
                                                    <td><small>{{ $p->oneCategory->category_name }}</small></td>
                                                    <td><small>{{ $p->product_price }}</small></td>

                                                    <td>
                                                        <small>
                                                            <a href="{{ route('product.edit', Crypt::encrypt($p->product_id)) }}" class="btn-empresa"  title="Editar"><i class="far fa-edit"></i></a>
                                                        </small>
                                                        <small>
                                                            <a href="{{ route('product.show', Crypt::encrypt($p->product_id)) }}" class="btn-empresa"  title="ver"><i class="far fa-eye"></i></a>
                                                        </small>
                                                        <small>
                                                                <a href = "{{ route('product.destroy', Crypt::encrypt($p->product_id))  }}" onclick="return confirm('¿Esta seguro que desea eliminar este elemento?')" class="btn-empresa"><i class="far fa-trash-alt"></i>
                                                                </a>
                                                        </small>
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>

                        </div>
                </div>
        </div>
    </div>
</div>

@stop
