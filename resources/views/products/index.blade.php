@extends('layout')

@section('head')
<style>
    .dot {
        height: 14px;
        width: 14px;
        background-color: rgb(231, 0, 0);
        border-radius: 50%;
        display: inline-block;
    }

</style>
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
