@extends('layout')

@section('head')

<x-embed-styles />

<style>
</style>

@endsection

@section('content')

<div class="columns is-centered mt-6 px-6">
    <div class="column is-5">
        <figure class="image">
            <img class="img_shadow" src="{{asset('storage/' . $product->img)}}" alt="Product image">
        </figure>
    </div>
    <div class="column is-4">
        <p class="is-size-3 has-text-weight-semibold mb-6 underlined">
            <span>{{ Str::upper($product->title)}}</span>
            @if($product->is_sold())
                <span class="sold_dot mb-1"></span>
            @endif
        </p>
        <p class="has-text-weight-medium">{{$product->desc}}</p>
        <p class="is-size-3 has-text-weight-semibold mt-6">£{{$product->price}}</p>
    </div>
</div>
<div class="columns is-centered">
    <div class="column is-5">

    </div>
    <div class="column is-4">
        <div class="has-text-centered">
            <p class="mb-2" id="success_message"> </p>
            @if($product->is_sold())
                <button class="button is-static mt-3 has-text-weight-semibold mb-6 copper">Unavailable</button>
            @else
                <button class="button mt-3 has-text-weight-semibold mb-6 copper" id="toggle_basket">  
                    @if(Cookie::has('basket'))
                        @if (!isset($key) || $key === FALSE)
                            Add To Basket
                        @else
                            Remove from Basket
                        @endif
                    @else
                        Add to Basket
                    @endif
                    <i class="fas fa-shopping-basket ml-2"></i>
                </button>
            @endif
        </div>
        @if(isset($product->url))
            <div class="mt-6" id="vidbox">
                <h1 class="title is-size-4">VIDEO TALKTHROUGH</h1>
                <x-embed url="{{$product->url}}" />
            </div>
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document.body).on("click", '#toggle_basket', function(event) {
            event.preventDefault();
            $.ajax({
                url:'{{url("/basket/toggle/$product->id")}}',
                type:"GET",
                success:function(response){
                    if(response == 'You have successfully removed a product'){
                        $('#toggle_basket').html('Add To Basket <i class="fas fa-shopping-basket ml-2"></i>');
                        $('#success_message').text('Successfully Removed from Basket');
                    }else if(response == 'You have successfully added a product') {
                        $('#toggle_basket').html('Remove from Basket <i class="fas fa-shopping-basket ml-2"></i>');
                        $('#success_message').text('Successfully Added to Basket');
                    }
                },fail:function(response){
                    $('#toggle_basket').text('ERROR')
                }
            });
        });
    });
</script>

@endsection