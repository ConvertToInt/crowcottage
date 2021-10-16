@extends('layout')

@section('head')

@endsection

@section('content')

@if(@isset($products))
{{-- this should be a snippet 'basket', which uses 'product-basket' and displays total price --}}
<div class="columns is-centered mt-6 mb-6"> 
    <div class="column is-8">
        <div class="box">
            @foreach($products as $product)
                @include('snippets._product-basket')    
            @endforeach
            <p><strong>Total Price: £{{$total}}</strong></p>
        </div>
    </div>
</div>

<a href="{{route('order_create')}}" class="button">Proceed to Checkout</button>

@else

<h1> There are no items in your basket!</h1>

@endif

@endsection