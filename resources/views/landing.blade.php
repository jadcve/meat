@extends('adminlte::page')
    @section('content')

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Meat</a>

    </div>
</nav>

<!-- Page Content -->
<div class="container">

<!-- Page Features -->
<div class="row">
    @foreach($products as $p)
    @if(isset($products))

        <div class="col-lg-4">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{ $p->product_name }}</h4>
                    <p class="card-text">{{ $p->product_description }}</p>
                    <h4 class="card-title">{{ $p->product_price }}</h4>
                </div>
                <div class="card-footer">
                    <a href="{{ route('product.show', Crypt::encrypt($p->product_id)) }}" class="btn btn-primary">Lo quiero!</a>
                </div>
            </div>
        </div>


    @endif
@endforeach
</div>



@endsection






