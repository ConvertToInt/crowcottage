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

@foreach ($products as $product)
    <h1>{{$product->title}}</h1>
    <h2>{{$product->price}}</h2>
    <form action="{{route('product_delete', [$product->id])}}" method="post">
    @method('delete')
    @csrf
    
        <button class="submit">Delete product</button>
    </form> <br><br>
@endforeach

<a href="{{route('product_create')}}">Create Product</a><br><br>


<a href="{{route('admin_panel')}}">back</a>

@endsection