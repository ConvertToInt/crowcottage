@extends('layout')

@section('head')

<x-embed-styles />

<title>Crow Cottage Arts | Shop</title>

<style>
    /* @media screen and (max-width: 1023px) {
    .img-container{
        height:30em !important
    }
}

@media screen and (max-width: 400px) {
    .img-container{
        height:20em !important
    }
} */
</style>

@endsection

@section('content')

{{-- <p class="ml-6 mt-6 is-size-5"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('shop')}}">Shop</a> 	&#8594; {{$product->title}} </p> --}}

<div class="columns is-centered m-6">
    <div class="column is-10">
        <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('shop')}}">Shop</a> &#8594; {{$product->title}}</a></p>
        <hr class="grey-8">
    </div>
</div>

<div class="columns is-centered mt-6 px-5">
    <div class="column is-hidden-mobile">
        <div class="columns">
            <div class="column">
                <figure class="image is-128x128 is-clickable thumbnail_preview mb-4" style="margin-left:auto; margin-right:auto"> {{--style="margin-left:auto; margin-right:auto" --}}
                    <img class="img_shadow" src="{{asset('storage/' . $product->primary_thumbnail_img->path)}}" alt="Product image">
                </figure>
                <figure class="image is-128x128 is-clickable secondary_preview mb-4" style="margin-left:auto; margin-right:auto">
                    <img class="img_shadow" src="{{asset('storage/' . $product->secondary_thumbnail_img->path)}}" alt="Product image">
                </figure>
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="container img-container" style="position:relative;">
            <figure class="image product_img" id="{{$product->id}}">
                <img 
                class="img_shadow"
                id="selected_img" 
                src="{{asset('storage/' . $product->primary_thumbnail_img->path)}}" 
                alt="Product image" 
                style="position: relative;">

                {{-- <img 
                class="img_shadow" 
                id="thumbnail_img" 
                src="{{asset('storage/' . $product->primary_thumbnail_img->path)}}" 
                alt="Product image" 
                style="position: relative;">

                <img 
                class="img_shadow" 
                id="secondary_img" 
                src="{{asset('storage/' . $product->secondary_thumbnail_img->path)}}" 
                alt="Product image" 
                style="position: relative;"> --}}

            </figure>
        </div>
    </div>
    <div class="column is-hidden-tablet">
        <div class="columns">
            <div class="column">
                <figure class="image is-128x128 is-clickable preview-imgs thumbnail_preview" style="margin-left:auto; margin-right:auto"> {{--style="margin-left:auto; margin-right:auto" --}}
                    <img class="img_shadow" src="{{asset('storage/' . $product->primary_thumbnail_img->path)}}" alt="Product image">
                </figure>
                <figure class="image is-128x128 is-clickable preview-imgs thumbnail_preview" style="margin-left:auto; margin-right:auto"> {{--style="margin-left:auto; margin-right:auto" --}}
                    <figure class="image is-128x128 is-clickable preview-imgs secondary_preview" >
                    <img class="img_shadow" src="{{asset('storage/' . $product->secondary_thumbnail_img->path)}}" alt="Product image">
                </figure>
            </div>
        </div>
    </div>
    <div class="column is-4">
        <p class="is-size-3 has-text-weight-semibold mb-6 underlined">
            <span>{{ Str::upper($product->title)}}</span>
            @if($product->is_sold())
                <span class="sold_dot mb-1"></span>
            @endif
        </p>
        <p class="has-text-weight-medium is-size-4">{{$product->desc}}</p>
        <p class="has-text-weight-medium is-size-6 mt-6"><strong>Dimensions:</strong> {{$product->height}} x {{$product->width}} </p>
        <p class="is-size-3 has-text-weight-semibold mt-6">£{{$product->price}}</p>
    </div>
</div>
<div class="columns is-centered">
    <div class="column"> </div>
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
            <div class="mt-6 px-5" id="vidbox">
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

        // $('#thumbnail_img').stop().hide();
        // $('#secondary_img').stop().hide();

        // $('.thumbnail_preview').hover(function() {
        //     $('#thumbnail_img').stop().show()
        // }, function() {
        //     $('#thumbnail_img').stop().hide();
        // });

        // $('.secondary_preview').hover(function() {
        //     $('#secondary_img').stop().show()
        // }, function() {
        //     $('#secondary_img').stop().hide()
        // });

        $('.thumbnail_preview').click(function() {
            $('#selected_img').attr('src','{{asset('storage/' . $product->primary_thumbnail_img->path)}}');
        });

        $('.secondary_preview').click(function() {
            $('#selected_img').attr('src','{{asset('storage/' . $product->secondary_thumbnail_img->path)}}');
        });

    });
</script>

@endsection