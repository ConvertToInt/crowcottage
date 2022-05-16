@extends('layout')

@section('head')

<title>Crow Cottage Arts | Admin</title>

@endsection

@section('content')

<h1 class="is-size-4">Orders</h1><br>

@foreach ($orders as $order)
<div class="columns ml-2 underlined">
    <div class="column is-6" id="{{$order->id}}">
        <h1><strong>Order id</strong> - {{$order->id}}</h1>

        <h1><strong>Customer Email</strong> -  {{ $order->email }}</h1>
        <h1><strong>Delivery Method</strong> -  {{ $order->delivery_method }}</h1>
        <form action="{{route('shipping_charge', [$order->id])}}" method="POST">
            @csrf
            <h1><strong>Shipping Charge</strong> -  £{{$order->shipping_charge ? $order->shipping_charge : '0'}} <a id="shipping_charge">Change</a> <input id="shipping_charge_form" class="is-hidden" type="text" name="shipping_charge">
        </form>
        <p><strong>Total:</strong> £{{$order->total_price + $order->shipping_charge}}</p><br>

        <h1 class="is-size-5"><strong>Products: </strong><a id="products_btn">Show/Hide</a></h2> 

        <div class="is-hidden mt-2 mb-2" id="products">
            @foreach($order->sales as $sale)
                <h1>{{ $sale->product->title }} - £{{ $sale->product->price }}</h1>
            @endforeach 
            <br><h1><strong>Total:</strong> £{{$order->total_price}}</h1>
        </div>

        <h1 class="is-size-5"><strong>Shipping Details:</strong><a id="shipping_details_btn">Show/Hide</a></h1>

        <div id="shipping_details" class="is-hidden mt-2 mb-2">
            <p>Name - {{ $order->shipping_address->firstname }} {{ $order->shipping_address->surname }}</p>
            <p>Phone - {{ $order->shipping_address->phone }}</p>
            @if(isset($order->shipping_address->company))
                <p>Company - {{$order->shipping_address->company}}</p>
            @endif
            @if(isset($order->shipping_address->apartment))
                <p>Apartment - {{$order->shipping_address->apartment}}</p>
            @endif
            <p>Address - {{$order->shipping_address->address}}</p>
            <p>City - {{$order->shipping_address->city}}</p>
            <p>Country - {{$order->shipping_address->country}}</p>
            <p>Province - {{$order->shipping_address->province}}</p>
            <p>Postcode - {{$order->shipping_address->postcode}}</p>
        </div>

        <h1 class="is-size-5"><strong>Billing Details:</strong><a id="billing_details_btn">Show/Hide</a></h1>

        <div id="billing_details" class="is-hidden mb-2 mt-2">
            @if($order->shipping_address_id === $order->billing_address_id)
                <p>Same as Shipping</p>
            @else
                <p>Name - {{ $order->billing_address->firstname }} {{ $order->billing_address->surname }}</p>
                <p>Phone - {{ $order->billing_address->phone }}</p>
                @if(isset($order->billing_address->apartment))
                    <p>Apartment - {{$order->billing_address->apartment}}</p>
                @endif
                <p>Address - {{$order->billing_address->address}}</p>
                <p>City - {{$order->billing_address->city}}</p>
                <p>Country - {{$order->billing_address->country}}</p>
                <p>Province - {{$order->billing_address->province}}</p>
                <p>Postcode - {{$order->billing_address->postcode}}</p>
            @endif
        </div>

    </div>
</div>

<script>

    $( document ).ready(function() {
        $('#{{$order->id}}').find('#shipping_charge').click(function(){
            $('#{{$order->id}}').find('#shipping_charge_form').toggleClass('is-hidden');
        });
    
        $('#{{$order->id}}').find('#products_btn').click(function(){
            $('#{{$order->id}}').find('#products').toggleClass('is-hidden');
        });
    
        $('#{{$order->id}}').find('#shipping_details_btn').click(function(){
            $('#{{$order->id}}').find('#shipping_details').toggleClass('is-hidden');
        });
    
        $('#{{$order->id}}').find('#billing_details_btn').click(function(){
            $('#{{$order->id}}').find('#billing_details').toggleClass('is-hidden');
        });
    });
    
</script>
@endforeach

    {{ $orders->links() }}

    <a href="{{route('admin_panel')}}">back</a>

@endsection