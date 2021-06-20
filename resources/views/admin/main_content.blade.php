@extends('admin.dashboard')

@section('content')

<div class="row">
  &nbsp;
</div>
  <div class="card pt-1 mt-4 mb-5 text-center">
    <h1> Hello, {{Auth::user()->name}}.
  </div>
  

    <!-- TABLE: LATEST ORDERS -->
<div class="card">
  <div class="card-header border-transparent">
    <h3 class="card-title">Latest Orders</h3>

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
          <th>Item</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td><a href="pages/examples/invoice.html">OR9842</a></td>
          <td>Call of Duty IV</td>
          <td><span class="badge badge-success">Shipped</span></td>
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR1848</a></td>
          <td>Samsung Smart TV</td>
          <td><span class="badge badge-warning">Pending</span></td>
          
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR7429</a></td>
          <td>iPhone 6 Plus</td>
          <td><span class="badge badge-danger">Delivered</span></td>
          
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR7429</a></td>
          <td>Samsung Smart TV</td>
          <td><span class="badge badge-info">Processing</span></td>
          
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR1848</a></td>
          <td>Samsung Smart TV</td>
          <td><span class="badge badge-warning">Pending</span></td>
          
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR7429</a></td>
          <td>iPhone 6 Plus</td>
          <td><span class="badge badge-danger">Delivered</span></td>
          
        </tr>
        <tr>
          <td><a href="pages/examples/invoice.html">OR9842</a></td>
          <td>Call of Duty IV</td>
          <td><span class="badge badge-success">Shipped</span></td>
          
        </tr>
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
  </div>
  <!-- /.card-footer -->
</div>
<!-- /.card -->

</div>
<!-- /.col -->

@endsection

