@extends('admin.dashboard')

@section('content')

    &nbsp;

    <h2> Products </h2>

    <div class="card p-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3 m-1">
                    <div class="card text-center">
                        <img class="card-img-top" src=" {{ asset('default-product.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"> {{$product['name']}} </h4>
                            <p class="card-text"> {{$product['description']}} </p>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('cart.add', $product['id']) }}" class="card-link "> <button type="button" class="btn btn-info "> Add to cart &nbsp; <i class="fas fa-plus align-baseline fa-xs"></i></button> </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection