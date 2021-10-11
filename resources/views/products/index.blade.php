@extends('layout')

@section('head')
@endsection

@section('content')

<div class="columns is-centered mt-6 mb-6">
    <div class="column is-8">
        <div class="columns is-multiline">
            @foreach($products as $product)
                @include('snippets._product-card')    
            @endforeach
        </div>
    </div>
</div>

@endsection
