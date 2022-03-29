@extends('admin.dashboard')

@section('content')


    &nbsp;

    <h2> Products </h2>
    <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">List of products</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive table-hover table-striped">
            <table class="table m-0">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td> {{ $product->id }}</td>
                  <td><a href="{{ route('product.show', $product->id) }}"> {{ $product->name }} </a></td>
                  <td> {{ $product->price }} </td>
                  <td> {{ $product->description }} </td>
                  <td> <a href="{{ route('product.edit', $product->id) }}"><button type="button" class="btn btn-success"> <i class="fas fa-pencil-alt"></i> </button> </a>  </td>
                  <td> 
                      <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </button> 
                      </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <div class="card-footer clearfix">
            <a href="/product/create" ><button class="btn btn-sm btn-info float-left"> Add new product </button> </a>
        </div>
          <!-- /.card-footer -->
        
    

@endsection