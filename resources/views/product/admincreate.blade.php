@extends('admin.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                &nbsp;
            <h1>Add new product</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('product') }}">Products list</a></li>
                <li class="breadcrumb-item active">Add product</li>
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
                <h3 class="d-inline-block d-sm-none"> Add new product</h3>
                <div class="col-12">
                <img src="{{ asset('default-product.jpg') }}" class="product-image" alt="Product Image">
                </div>
            </div>
                <div class="col-12 col-sm-6">
                    <form action = "{{ route('product.store') }}" method="POST">
                        
                        @csrf
                    
                        <h3 class="my-3">Name: <input type="text" name="name" class="form-control mt-1" placeholder="Name"></h3>
                        <p>
                            <label> Description: <br></label>
                            <input type="text" name="description" class="form-control mt-1" placeholder="Description">
                            
                        </p>

                        <hr>

                        <div class="bg-gray py-2 px-3 mt-4 rounded">
                            <h2 class="mb-0">
                                <label> Price: </label>
                                <input type="text" name="price" class="form-control mt-1" placeholder="Price">
                                
                            </h2>
                        </div>

                        <div class="mt-4">
                                    <button class="btn btn-success">
                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                        Save
                                    </button>
                        </div>
                    </form>    

                </div>
            
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection