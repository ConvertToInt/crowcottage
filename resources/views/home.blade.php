@extends('layout')

@section('head')

<x-embed-styles />

<title>Crow Cottage Arts | Scottish Arts</title>

<style>
    .appear {
        transition: all 0.8s;
        opacity: 0;
        transform: translateY(40px);
    }

    .appear.inview {
        opacity: 1;
        transform: none;
        transition-delay: 0.3s;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/css/bulma-carousel.min.css">

@endsection

@section('content')

{{-- <section class="hero is-fullheight has-carousel">
    <div class="hero-carousel">
        <div class="item-1">
            <img src="{{ asset('img/projects/chair.jpeg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-2">
            <img src="{{ asset('img/projects/chair.jpeg')}}" alt="" class="img_shadow">
        </div>
        <div class="item-3">
            <img src="{{ asset('img/projects/chair.jpeg')}}" alt="" class="img_shadow">
        </div>
        </div>
    <div class="hero-head"></div>
    <div class="hero-body"></div>
    <div class="hero-foot"></div>
</section> --}}

<img src="{{ asset('img/shop-front.jpg')}}" alt="" class="home-hero-img img_shadow">

<div class="columns is-centered px-5 appear mt-5">
    <div class="column is-8">
        <h1 class="title is-size-3 has-text-centered">Welcome to Crow Cottage Arts</h1>
        <h1 class="title is-size-4 has-text-centered">A friendly gallery on the West Coast of Scotland</h1>
        <p class="is-size-5 has-text-justified"></p>
    </div>
</div>

<div class="columns is-centered px-5 appear">
    <div class="column is-6">
        <div class="mt-5" id="vidbox">
            <x-embed url="https://www.youtube.com/watch?v=8ZZBohfxvlE"/>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5 px-5 appear">
    <div class="column is-8">
        <hr class="grey-8">
        <p class="is-size-3 has-text-centered">ALEC GALLOWAY SCOTTISH STAINED GLASS ARTIST</p>

        <div class="columns is-centered mt-5">
            <div class="column is-6">
                <img src="{{ asset('img/shop/workshop.jpg')}}" alt="" class="img_shadow">
            </div>
            <div class="column is-6">
                <img src="{{ asset('img/shop/table.jpg')}}" alt="" class="img_shadow">
            </div>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5 px-5 appear">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="is-size-3 has-text-centered">WEEKLY FUSED GLASS CLASSES</h1><br>
    </div>
</div>

<div class="columns is-centered px-5 appear">
    <div class="column is-8 mt-4">
        <div class="columns is-centered">
            <div class="column is-hidden-touch">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-square">
                        <img src="{{ asset('images/testimonial1.jpg')}}" alt="Testimonial photo" style="object-fit: cover">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content is-italic">
                        "Alec's classes have taught me so much about glass and I've made some beautiful pieces. I can't wait to come back!"
                        <br><br>
                        <p class="title is-6">Margaret, 63, Glass Class</p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column is-hidden-touch">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-square">
                        <img src="{{ asset('images/testimonial2.jpg')}}" alt="Testimonial photo" style="object-fit: cover">
                      </figure>
                    </div>
                    <div class="card-content">
                        <div class="content is-italic">
                            "I attended the weekly glass class at Crow Cottage Arts, which I found to be a very enjoyable and rewarding experience."
                            <br><br>
                            <p class="title is-6">Julie, 42, Glass Class</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-square">
                        <img src="{{ asset('images/testimonial3.jpg')}}" alt="Testimonial photo" style="object-fit: cover">
                      </figure>
                    </div>
                    <div class="card-content">
                        <div class="content is-italic">
                            "Very enjoyable, Alec is a great teacher and I've learned so much. I would highly recommend his classes to anyone interested in learning about glass art."
                            <br><br>
                            <p class="title is-6">Paula, 48, Glass Class</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5 px-5 appear">
    <div class="column is-8">
        <p class="is-size-3 has-text-centered">You can book a class online <a href="{{route('classes')}}">here.</a></p>
    </div>
</div>

<div class="columns is-centered mt-5 px-5 appear">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="is-size-2 has-text-centered">Our Shop</h1><br>
        <p class="is-size-5 has-text-centered">STAINED GLASS, FINE ART, CERAMICS, TEXTILES & HANDMADE GIFTS</p>
    </div>
</div>

<section class="section px-5 is-8" style="overflow-x:hidden">
    <div class="container">
        <div class="carousel">
            @foreach($products as $product)
                <div class="carousel-item mr-3">
                    <figure class="image is-square">
                        <img class="img_shadow" src="{{asset('storage/' . $product->primary_thumbnail_img->path)}}" alt="Product image">
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/js/bulma-carousel.min.js"></script>

<script>
    $(document).ready(function() {

        // bulmaCarousel.attach('.hero-carousel', {
        //     slidesToScroll: 1,
        //     slidesToShow: 1,
        //     autoplay:true,
        //     autoplaySpeed:1500,
        //     loop:true
        //   });

          bulmaCarousel.attach('.carousel', {
            slidesToScroll: 1,
            slidesToShow: 3,
            autoplay:true,
            autoplaySpeed:1500,
            loop:true
          });

    });

    const items = document.querySelectorAll('.appear');

    const active = function(entries){
        entries.forEach(entry => {
            if(entry.isIntersecting){
            entry.target.classList.add('inview');
            }
        });
    }
    const io2 = new IntersectionObserver(active);
    for(let i=0; i < items.length; i++){
        io2.observe(items[i]);
    }
</script>

@endsection
