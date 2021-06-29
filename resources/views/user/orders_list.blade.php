@extends('user.dashboard')

@section('content')


    &nbsp;

    <h2> Orders </h2>
    <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">List of orders</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive table-hover table-striped">
            <table class="table m-0">
              <thead>
              <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Buyer</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                <tr>
                  <td> {{ $order->id }} </td>
                  <td><a href="{{ route('orders.show', $order->id) }}"> {{ $order->order_number }} </a></td>
                  <td> {{ $order->grand_total }} </td>
                  <td>
                    @if (($order->status) == 'pending')
                    <span class="badge badge-info">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'processing')
                    <span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'completed')
                    <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'cancelled')
                    <span class="badge badge-danger">{{ ucfirst($order->status) }}</span>
                    @endif
                  </td>
                  <td> {{ $order->shipping_fullname }} </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>

        
    

@endsection