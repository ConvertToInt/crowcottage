@extends('layout')

@section('head')

{{-- <script src="{{ asset('js/slideshow.js')}}"></script> --}}

<x-embed-styles />

@endsection

@section('content')

<section class="hero is-large has-carousel">
    <div id="hero" class="hero-carousel">
        <div class="item-1">
            <img src="{{ asset('img/projects/absent.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-2">
            <img src="{{ asset('img/projects/absent.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-3">
            <img src="{{ asset('img/projects/absent.jpg')}}" alt="" class="img_shadow">
        </div>
    </div>
    <div class="hero-head"></div>
    <div class="hero-body"></div>
    <div class="hero-foot"></div>
</section>

<div class="columns is-centered">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="title is-size-3">Welcome to Crow Cottage Arts</h1>
        <p class="is-size-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis ad.</p>  
    </div>
</div>

<div class="columns is-centered">
    <div class="column is-6">
        <div class="mt-6" id="vidbox">
            <x-embed url="https://www.youtube.com/watch?v=xoODq7Ol1so"/>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5">
    <div class="column is-8">
        <hr class="grey-8">
        <p class="is-size-5 has-text-centered">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis ad.</p>

        <div class="columns is-centered mt-5">
            <div class="column is-6">
                <img src="../img/shop/workshop.jpg" alt="" class="img_shadow">
            </div>
            <div class="column is-6">
                <img src="../img/shop/table.jpg" alt="" class="img_shadow">
            </div>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="is-size-3">For Sale</h1><br>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Start Carousel -->
        <div id="products" class="carousel">
        <div class="item-1">
            <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-2">
            <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-3">
            <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-4">
            <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-5">
            <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-6">
            <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
        </div>
        </div>
        <!-- End Carousel -->
    </div>
</section>

<script>
    $(document).ready(function() {
        bulmaCarousel.attach('#products', {
            slidesToScroll: 1,
            slidesToShow: 4,
            autoplay:true,
            autoplaySpeed:1000,
        });

        bulmaCarousel.attach('#hero', {
            slidesToScroll: 1,
            slidesToShow: 1,
            autoplay:true,
            autoplaySpeed:2500,
        });
    });
</script>

@endsection