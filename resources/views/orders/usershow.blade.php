@extends('user.dashboard')

@section('content')
    
&nbsp;
<div class="card">
    <h2 class="m-3"> Order no: {{ $order->order_number }} details </h2>
    <div class="row">
        <div class="col m-3">
            
            <ul>
                <li> <label> Order ID: </label> {{ $order->id }} </li>
                <li> <label> Status: </label> @if (($order->status) == 'pending')
                    <span class="badge badge-info">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'processing')
                    <span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'completed')
                    <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'cancelled')
                    <span class="badge badge-danger">{{ ucfirst($order->status) }}</span>
                    @endif
                </li>
                <li> <label> Total: </label> $ {{ $order->grand_total }} </li>
                <li> <label> Items: </label> {{ $order->item_count }} pcs.</li>
            </ul>
            
        </div>
    </div>
    <div class="row">
        <div class="col m-3">
            <h2> Shipping details: </h2>
            <ul>
                <li> <label> <br> Buyer: </label> &nbsp;{{ $order->shipping_fullname }} </li>
                <li> <label> <Br> Address: </label><br> 
                    {{ $order->shipping_address }}, <br>
                    {{ $order->shipping_zipcode }}, {{ $order->shipping_city }}.
                    
                </li>
                <li> <label> <br> Contact: </label><br>
                    {{ $order->shipping_phone }}<br>
                    {{ $order->shipping_mail }}
                </li>
            </ul>
            
        </div>
    </div>
    <div class="row">
        <a href={{ route('orders_list') }}><button class="btn btn-info m-5"> Go back to list </button></a>
    </div>

    
    
</div>
       


        
@endsection