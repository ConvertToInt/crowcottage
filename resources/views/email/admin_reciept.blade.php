<h1>You have recieved a new order from crowcottage.co.uk</h1><br>

<h1>Order information:</h1>

<p>Customer Email: {{ $email }}</p>
<p>Delivery Method: {{ $delivery_method }}</p>
<h3>Products:</h3>
@foreach($products as $product)
    <p>{{ $product->title }} - £{{ $product->price }}</p>
@endforeach
<p><strong>Total:</strong> £{{$total}}</p>

<br>

<h2>Shipping details:</h2>
<p>Name: {{ $shipping_firstname }} {{ $shipping_surname }}</p>
<p>Phone: {{ $shipping_phone }}</p>
@if(isset($shipping_company))
    <p>Company: {{$shipping_company}}</p>
@endif
@if(isset($shipping_apartment))
    <p> Apartment: {{$shipping_apartment}}</p>
@endif
<p>Address: {{$shipping_address}}</p>
<p>City: {{$shipping_city}}</p>
<p>Country: {{$shipping_country}}</p>
<p>Province: {{$shipping_province}}</p>
<p>Postcode: {{$shipping_postcode}}</p>

<br>

<h2>Billing details:</h2>
@if(isset($same_as_billing))
    <p>Same as Shipping</p>
@else
    @if(isset($billing_apartment))
        <p> Apartment: {{$billing_apartment}}</p>
    @endif
    <p>Address: {{$billing_address}}</p>
    <p>City: {{$billing_city}}</p>
    <p>Country: {{$billing_country}}</p>
    <p>Province: {{$billing_province}}</p>
    <p>Postcode: {{$billing_postcode}}</p>
@endif