@extends('layouts.app')



    @section('content')
    <div class="flex-center position-ref full-height">

    </div>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Meat</a>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>


                @endauth
            </div>
        @endif
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
                <h4 class="card-title">{{ $p->product_price }}$</h4>
                <div class="card card-success">{{ $p->oneCategory->category_name }}</div>
              </div>
              <div class="card-footer">
                <a href="{{ route('login') }}" class="btn btn-primary">Lo quiero!</a>
              </div>
            </div>
          </div>


    @endif
@endforeach
</div>



<!-- Footer -->
<footer class="py-5 bg-dark">
<div class="container">
  <p class="m-0 text-center text-white">Copyright &copy; Alain Diaz 2020</p>
</div>
</footer>


@endsection






