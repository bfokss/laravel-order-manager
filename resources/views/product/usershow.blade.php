@extends('user.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                &nbsp;
            <h1>{{$product->name}}</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/users_products') }}">Products</a></li>
                <li class="breadcrumb-item active">{{$product->name}}</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
        <div class="card-body">
            <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"> {{ $product->name }}</h3>
                <div class="col-12">
                <img src="{{ asset('default-product.jpg') }}" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{ asset('default-product.jpg') }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset('default-product.jpg') }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset('default-product.jpg') }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset('default-product.jpg') }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ asset('default-product.jpg') }}" alt="Product Image"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $product->name }}</h3>
                <p>
                    {{ $product->description }}
                </p>

                <hr>

                <div class="bg-gray py-2 px-3 mt-4 rounded">
                    <h2 class="mb-0">
                        <label> Price: </label>
                        ${{ $product->price }}
                    </h2>
                </div>

                <div class="mt-4">
                    <a href="{{ route('cart.add', $product['id']) }}">
                        <div class="btn btn-info">
                            <i class="fas fa-plus align-baseline fa-xs"></i>
                            Add to Cart
                        </div>
                    </a>
                </div>
                

            </div>
            </div>
            <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                    {{ $product->description }}
                </div>
                
            </div>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection