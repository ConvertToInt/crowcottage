@extends('layout')

@section('head')
<style>
    .sold_dot {
        height: 11px;
        width: 11px;
        background-color: rgb(231, 0, 0);
        border-radius: 50%;
        display: inline-block;
        align:right;
    }

</style>
@endsection

@section('content')

<div class="columns is-centered mt-6 mb-6">
    <div class="column is-8">
        <h1 class="has-text-grey-darker has-text-centered is-size-2 mb-6">For Sale</h1>
        <div class="columns is-multiline mt-6">
            @foreach($products as $product)
                @include('snippets._product-card')    
            @endforeach
        </div>
    </div>
</div>

@endsection
