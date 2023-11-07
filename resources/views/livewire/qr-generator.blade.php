<div>
    {!! QrCode::size(300)->generate(Session::get('checkout_url')) !!}
</div>
