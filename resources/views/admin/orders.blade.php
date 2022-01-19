@extends('layout')

@section('head')

@endsection

@section('content')

<h1>Orders</h1> <br><br>

@foreach ($orders as $order)
    order id - {{$order->id}} <br>

    <p>Customer Email: {{ $order->email }}</p>
    <p>Delivery Method: {{ $order->delivery_method }}</p>

    <form action="{{route('shipping_charge', [$order->id])}}" method="POST">
        @csrf
        <p>Shipping Charge: <input type="text" name="shipping_charge" value="{{ $order->shipping_charge }}"></p>
    </form>
    

    <br>

    <h2>Products:</h2>

    @foreach($order->sales as $sale)
        <p>{{ $sale->product->title }} - £{{ $sale->product->price }}</p>
    @endforeach
    <p><strong>Total:</strong> £{{$order->total_price}}</p> 

    <br>

    <h2>Shipping details:</h2>

    <p>Name: {{ $order->shipping_address->firstname }} {{ $order->shipping_address->surname }}</p>
    <p>Phone: {{ $order->shipping_address->phone }}</p>
    @if(isset($order->shipping_address->company))
        <p>Company: {{$order->shipping_address->company}}</p>
    @endif
    @if(isset($order->shipping_address->apartment))
        <p> Apartment: {{$order->shipping_address->apartment}}</p>
    @endif
    <p>Address: {{$order->shipping_address->address}}</p>
    <p>City: {{$order->shipping_address->city}}</p>
    <p>Country: {{$order->shipping_address->country}}</p>
    <p>Province: {{$order->shipping_address->province}}</p>
    <p>Postcode: {{$order->shipping_address->postcode}}</p>

    
    

    <br>

    <h2>Billing details:</h2>
    @if($order->shipping_address_id === $order->billing_address_id)
        <p>Same as Shipping</p>
    @else
        <p>Name: {{ $order->billing_address->firstname }} {{ $order->billing_address->surname }}</p>
        <p>Phone: {{ $order->billing_address->phone }}</p>
        @if(isset($order->billing_address->apartment))
            <p> Apartment: {{$order->billing_address->apartment}}</p>
        @endif
        <p>Address: {{$order->billing_address->address}}</p>
        <p>City: {{$order->billing_address->city}}</p>
        <p>Country: {{$order->billing_address->country}}</p>
        <p>Province: {{$order->billing_address->province}}</p>
        <p>Postcode: {{$order->billing_address->postcode}}</p>
    @endif
    

@endforeach

<br><br><br><br>

@endsection