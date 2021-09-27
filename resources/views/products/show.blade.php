@extends('layout')

@section('head')

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-5">
    <p>{{$product->title}}</p>
    <p>{{$product->price}}</p>
    </div>
</div>

<a href="{{route('product_checkout', $product->title)}}" class="button is-help">Buy now</a>

@endsection