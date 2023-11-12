@extends('layout')
   
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        <form id="checkout-form" method="post" action="{{ route('create.order') }}"
        class="overflow-y-auto max-h-72">
        @csrf
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['product_price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['product_price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['product_price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                    </td>
                </tr>
                @endforeach
                @endif
                @php
                 $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); //Create random 6 digit generator 
                 @endphp
                 <input type="text" value="{{ $total }}" name="total" class="invisible">
                <input type="text" value="{{ $orderID }}" name="orderID" class="invisible">
            </form>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                <h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('donmono') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <button  onclick="changePaymentMethod('qrPayment')" class="btn btn-success"><i class="fa fa-money"></i> Cashless</button>
                <button  onclick="changePaymentMethod('cash')" class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
   
@section('scripts')
<script type="text/javascript">
   
    $(".cart_update").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
<script>
    function changePaymentMethod(paymentMethod) {
        // Get the form element by its id
        var form = document.getElementById('checkout-form');

        // Prevent the default form submission
        event.preventDefault();

        // Update the form's action attribute to the new route
        if (paymentMethod === 'cash') {
            form.action = "{{ route('create.order') }}";
            form.method = 'post';
        } else if (paymentMethod === 'qrPayment') {
            form.action = "{{ route('qrPayment') }}";
            form.method = 'get';
        }

        // Remove existing hidden input fields with name 'payment_method'
        var existingInput = form.querySelector('input[name="payment_method"]');
        if (existingInput) {
            existingInput.remove();
        }

        // Create a new hidden input for payment_method
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'payment_method';
        hiddenInput.value = paymentMethod;
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
@endsection