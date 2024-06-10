@extends('layout')

@section('head')

<title>Crow Cottage Arts | Shop</title>

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


<div class="columns is-centered m-6">
    <div class="column is-10">
        <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('shop')}}">Shop</a></p>
        <hr class="grey-8">
    </div>
</div>

<div class="columns is-centered px-5">
    <div class="column is-10">
        {{-- <h1 class="has-text-grey-darker has-text-centered is-size-2">For Sale</h1> --}}
        <div class="columns is-multiline">
            @foreach($products as $product)
                @include('snippets._product-card')
            @endforeach
        </div>
    </div>
</div>

{{--TODO- make this optional depending on 1 or 2 product images--}}
{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('.product_imgs').hover(function() {--}}
{{--            id = event.target.id;--}}
{{--            $('#' + id).stop().fadeOut('slow');--}}
{{--            // $('#' + id).stop().fadeIn('slow');--}}
{{--        }, function() {--}}
{{--            // $('.secondary_img').stop().fadeOut('slow');--}}
{{--            $('#' + id).stop().fadeIn('slow');--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

@endsection
