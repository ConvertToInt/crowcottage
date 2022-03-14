@extends('layout')

@section('head')

@endsection

@section('content')

<!-- Alert User -->
@if(Session::has('success'))
<div class="alert is-primary title has-text-weight-bold is-size-3 pt-3 mb-6">
    {{Session::get('success')}}
</div>
@endif

<h1 class="is-size-4">Products</h1><br>

@foreach ($products as $product)
<div class="columns ml-2">
    <div class="column is-6">
        <h1><strong>Title</strong> - {{$product->title}}</h1>
        <h1><strong>Description</strong> - {{$product->desc}}</h1>
        <h2><strong>Price</strong> - £{{$product->price}}</h2>

        <form action="{{route('product_delete', [$product->id])}}" method="post">
            @method('delete')
            @csrf
            <button class="submit has-text-danger">Delete product</button>
        </form>
    </div>
</div>
@endforeach

<a href="{{route('product_create')}}">Create Product</a><br>

<a href="{{route('admin_panel')}}">back</a>

@endsection