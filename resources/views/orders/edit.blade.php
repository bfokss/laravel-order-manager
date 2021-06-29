@extends('admin.dashboard')

@section('content')
    
&nbsp;
<div class="card">
    <h2 class="m-3"> Edit panel </h2>
    <div class="row">
        <div class="col ">
            <div class="card p-4">
                <label> Order informations: </label>
                <div class="form-group col-md-6">
                    <br> <label class="mt-2"> Order id: </label> {{ $order->id }}
                    <br> <label class="mt-2"> Order no: </label> {{ $order->order_number }}
                    <br> <label class="mt-2"> User id: </label> {{ $order->user_id }}
                    <br> <label class="mt-2"> Status: </label>  
                    @if (($order->status) == 'pending')
                        <span class="badge badge-info">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'processing')
                        <span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'completed')
                        <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
                    @elseif (($order->status) == 'cancelled')
                        <span class="badge badge-danger">{{ ucfirst($order->status) }}</span>
                    @endif
                    <br> <label class="mt-2"> Total: </label> $ {{ $order->grand_total }} </li>
                    <br> <label class="mt-2"> Items: </label> {{ $order->item_count }} pcs.</li>
            
                    <br><br>
                </div>
            
            </div>
        </div>
        <div class="col col-md-6">
            <div class="card p-4">
                <label> Buyer informations: </label>
                <div class="form-group col-md-6">
                    <form action = "{{ route('orders.update', $order->id) }}" method="POST">

                        @method('PUT')
                        
                        @csrf
                        
                            <br>
                            <label for="status" class="mt-1"> Status: </label>
                            <input list="status" name="status" class="form-control mt-1" value="{{ $order->status }}">
                            <datalist id="status">
                                <option value="pending"> </option>
                                <option value="processing"> </option>
                                <option value="completed"> </option>
                                <option value="cancelled"> </option>
                            </datalist>
            
                            <label for="shipping_fullname" class="mt-1"> Buyer Full Name: </label>
                            <input type="text" name="shipping_fullname" class="form-control mt-1" placeholder="Fullname" value="{{ $order->shipping_fullname }}">

                            <label for="shipping_adress" class="mt-1"> Adress: </label>
                            <input type="text" name="shipping_address" class="form-control mt-1" placeholder="Adress" value="{{ $order->shipping_address }}">

                            <label for="shipping_city" class="mt-1"> City: </label>
                            <input type="text" name="shipping_city" class="form-control mt-1" placeholder="City" value="{{ $order->shipping_city }}">

                            <label for="shipping_state" class="mt-1"> State: </label>
                            <input type="text" name="shipping_state" class="form-control mt-1" placeholder="State" value="{{ $order->shipping_state }}">

                            <label for="shipping_zipcode" class="mt-1"> Zip-code: </label>
                            <input type="text" name="shipping_zipcode" class="form-control mt-1" placeholder="Zip-code" value="{{ $order->shipping_zipcode }}">

                            <label for="shipping_phone" class="mt-1"> Phone: </label>
                            <input type="text" name="shipping_phone" class="form-control mt-1" placeholder="Phone" value="{{ $order->shipping_phone }}">

                            <label for="shipping_mail" class="mt-1"> E-mail: </label>
                            <input type="text" name="shipping_mail" class="form-control mt-1" placeholder="E-mail" value="{{ $order->shipping_mail }}">
                           
                       
                </div>
            
            </div>
        </div>
            
        
    </div>
    <div class="row">
        <div class="col">
            
            <a href={{ route('orders') }}><button class="btn btn-info m-5"> Go back to list </button></a>
            <button class="btn btn-success float-right m-5"> Save </button>
        </form>
        </div>
    </div>


    
</div>
       


        
@endsection