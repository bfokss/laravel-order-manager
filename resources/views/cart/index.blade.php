@if ((Auth::user()->role) == 'admin')

    @extends('admin.dashboard')
    
@endif


@section('content')

    <h1> Your cart </h1>
            
    <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive table-hover table-striped">
            <table class="table m-0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td> {{ $item['name'] }} </td>
                        <td> {{ Cart::session(Auth::user()->id)->get($item->id)->getPriceSum() }} </td>
                        <td> 
                            <form action="{{ route('cart.update', $item->id) }}">
                                <div class="row">
                                    <div class="col">
                                        <input name="quantity" type="number" value={{ $item['quantity']}} class="form-control">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            

                        </td>
                        <td> <a href="{{ route('cart.delete', $item->id) }}"> <button type="button" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </button> </a> </td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
          <h4 class="text-center  float-right"> Total price : ${{ Cart::session(Auth::user()->id)->getTotal() }}  </h4>
        </div>
        <!-- /.card-footer -->
    </div>
@endsection