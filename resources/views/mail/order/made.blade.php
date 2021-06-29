@component('mail::message')
# Order no: {{ $order['order_number'] }} made

Hello, {{ $order->shipping_fullname }}!
Thank you for the purchase!

<div class="row mt-5">

</div>
    <h2> Your order no: {{ $order['order_number'] }} contains: </h2>
    <div class="card"> 
        <div class="card-body p-0">
        <div class="table-responsive table-hover table-striped">
            <table class="table m-0">
                <thead class="text-center">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($order->items as $item)
                    <tr>
                        <td class="p-5"> {{ $item->name }} </td>
                        <td class="p-5"> {{ $item->pivot->quantity }} pcs. </td>
                        <td class="p-5"> ${{ $item->pivot->price }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            Total: {{ $order->grand_total }}
        </div>
        <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        </div>
        <!-- /.card-footer -->
    </div>


@component('mail::button', ['url' => ''])
Download invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
