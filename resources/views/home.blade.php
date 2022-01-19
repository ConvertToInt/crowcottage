@extends('layout')

@section('head')

<script src="{{ asset('js/slideshow.js')}}"></script>
<script src="{{ asset('js/bulma-carousel.js') }}"></script>
<x-embed-styles />

@endsection

@section('content')

<div class="columns is-centered">
    <div class="column is-12">
        <div class="slideshow-container">

            <div class="mySlides fade background-image chair">
                <div class="numbertext">1 / 3</div>
                <div class="text"></div>
            </div>
        
            <div class="mySlides fade background-image absent">
                <div class="numbertext">2 / 3</div>
                <div class="text"></div>
            </div>
        
            <div class="hero mySlides fade background-image axis">
                <div class="numbertext">3 / 3</div>
                <div class="text"></div>
            </div>
        
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
    </div>
</div>

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
        <div id="carousel-demo" class="carousel">
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

<div class="columns is-centered mt-5">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="is-size-3">Hire Our Shop</h1><br>
        {{-- <p class="is-size-5">You can hire our space for all sorts! get in touch below:</p>
        <button class="button mt-3 has-text-weight-semibold mb-6 copper">Book now</button> --}}
    </div>
</div>

<script>
bulmaCarousel.attach('#carousel-demo', {
  slidesToScroll: 1,
  slidesToShow: 4,
  autoplay:true,
  autoplaySpeed:1000,
});
</script>

@endsection