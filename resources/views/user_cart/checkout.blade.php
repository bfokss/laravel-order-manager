
@extends('user.dashboard')


@section('content')

    &nbsp;
    <h2> Checkout </h2>

    <div class="card p-5">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            

            <div class="form-group">
                <label for=""> Full Name * </label>
                <input type="text" name="shipping_fullname" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> State * </label>
                <input type="text" name="shipping_state" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> City * </label>
                <input type="text" name="shipping_city" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> Zip * </label>
                <input type="text" name="shipping_zipcode" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> Full Address * </label>
                <input type="text" name="shipping_address" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> Phone * </label>
                <input type="text" name="shipping_phone" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for=""> E-mail * </label>
                <input type="text" name="shipping_mail" id="" class="form-control">
            </div>

            <button type="submit" class="btn btn-info"> Place Order </button>
        </form>
    </div>

@endsection