@component('mail::message')

<h1>You have recieved a new order from crowcottage.co.uk</h1><br>

<h1>Order information:</h1>

<p>Customer Email: {{ $mailData['email'] }}</p>
<p>Delivery Method: {{ $mailData['delivery_method'] }}</p>

<br>

<h2>Products:</h2>
@foreach($mailData['products'] as $product)
    <p>{{ $product->title }} - £{{ $product->price }}</p>
@endforeach
<p><strong>Total:</strong> £{{$mailData['total']}}</p>

<br>

<h2>Shipping details:</h2>
<p>Name: {{ $mailData['shipping_firstname'] }} {{ $mailData['shipping_surname'] }}</p>
<p>Phone: {{ $mailData['shipping_phone'] }}</p>
@if(isset($mailData['shipping_company']))
    <p>Company: {{$mailData['shipping_company']}}</p>
@endif
@if(isset($mailData['shipping_apartment']))
    <p> Apartment: {{$mailData['shipping_apartment']}}</p>
@endif
<p>Address: {{$mailData['shipping_address']}}</p>
<p>City: {{$mailData['shipping_city']}}</p>
<p>Country: {{$mailData['shipping_country']}}</p>
<p>Province: {{$mailData['shipping_province']}}</p>
<p>Postcode: {{$mailData['shipping_postcode']}}</p>

<br>

<h2>Billing details:</h2>
@if(isset($mailData['same_as_billing']))
    <p>Same as Shipping</p>
@else
    @if(isset($mailData['billing_apartment']))
        <p> Apartment: {{$mailData['billing_apartment']}}</p>
    @endif
    <p>Address: {{$mailData['billing_address']}}</p>
    <p>City: {{$mailData['billing_city']}}</p>
    <p>Country: {{$mailData['billing_country']}}</p>
    <p>Province: {{$mailData['billing_province']}}</p>
    <p>Postcode: {{$mailData['billing_postcode']}}</p>
@endif

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
