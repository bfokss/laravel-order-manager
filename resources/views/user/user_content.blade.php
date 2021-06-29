@extends('user.dashboard')

@section('content')

@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif

<div class="row">
  &nbsp;
</div>
  <div class="card pt-1 mt-4 mb-5 text-center">
    <h1> Hello, {{ ucfirst(Auth::user()->name) }}.
  </div>
  

    <!-- TABLE: LATEST ORDERS -->
<div class="card">
  <div class="card-header border-transparent">
    <h3 class="card-title">Your Latest Orders</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="table-responsive table-hover table-striped">
      <table class="table m-0">
        <thead>
        <tr>
          <th>Order ID</th>
          <th>Total</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <a href="{{url('/cart')}}" class="btn btn-sm btn-info float-left">Place New Order</a>
    <a href="{{url('/orders')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->

</div>
<!-- /.col -->

@include('sweetalert::alert')

@endsection

