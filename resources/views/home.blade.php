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

@endsection

@section('content')

<section class="hero is-large has-carousel">
    <div id="hero" class="hero-carousel">
        <div class="item-1">
            <figure class="image is-3by2 is-covered">
                <img src="{{ asset('img/projects/chair.jpg')}}" alt="" class="img_shadow">
            </figure>
        </div>
        <div class="item-2">
            <figure class="image is-3by2">
                <img src="{{ asset('img/projects/absent.jpg')}}" alt="" class="img_shadow">
            </figure>
        </div>
        <div class="item-3">
            <figure class="image is-3by2 is-covered">
                <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
            </figure>
        </div>
    </div>
    <div class="hero-head"></div>
    <div class="hero-body"></div>
    <div class="hero-foot"></div>
</section>

<div class="columns is-centered px-6 appear mt-5">
    <div class="column is-8">
        <h1 class="title is-size-3 has-text-centered">Welcome to Crow Cottage Arts</h1>
        <p class="is-size-5 has-text-justified">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis</p>  
    </div>
</div>

<div class="columns is-centered px-6 appear">
    <div class="column is-6">
        <div class="mt-5" id="vidbox">
            <x-embed url="https://www.youtube.com/watch?v=xoODq7Ol1so"/>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5 px-6 appear">
    <div class="column is-8">
        <hr class="grey-8">
        <p class="is-size-5 has-text-justified">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis</p>

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

<div class="columns is-centered mt-5 px-6 appear">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="is-size-2 has-text-centered">Art Classes </h1><br>
        <p class="is-size-5 has-text-justified">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis</p>  
    </div>
</div>

<div class="columns is-centered px-6 appear">
    <div class="column is-8 mt-4">
        <div class="columns is-centered">
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by3">
                        <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content is-italic">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris."
                        <br><br>
                        <p class="title is-6">Katie, 11, Art Class</p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column is-hidden-mobile">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by3">
                        <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content is-italic">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris."
                        <br><br>
                        <p class="title is-6">Beth, 18, Stained Glass Workshop</p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column is-hidden-mobile">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by3">
                        <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content is-italic">
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris."
                        {{--<a>@bulmaio</a>.
                        <a href="#">#css</a> <a href="#">#responsive</a> --}}
                        <br><br>
                        <p class="title is-6">John, 45, Art Bar</p>
                        {{-- <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time> --}}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5 px-6 appear">
    <div class="column is-8">
        <p class="is-size-3 has-text-centered">You can book a class online <a href="/">here.</a></p>  
    </div>
</div>

<div class="columns is-centered mt-5 px-6 appear">
    <div class="column is-8">
        <hr class="grey-8">
        <h1 class="is-size-2 has-text-centered">Our Shop</h1><br>
        <p class="is-size-5 has-text-justified">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolores ipsam et, corporis eligendi rerum esse deleniti soluta veritatis perspiciatis similique voluptate placeat debitis nostrum numquam omnis tenetur excepturi nobis</p>  
    </div>
</div>

<section class="section px-6 is-8">
    <div class="container">
        <div id="products" class="carousel">
            @foreach($products as $product)
                <div class="carousel-item mr-3">
                    <figure class="image is-square">
                        <img class="img_shadow" src="{{asset('storage/' . $product->img)}}" alt="Product image">
                    </figure>                
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        bulmaCarousel.attach('#products', {
            slidesToScroll: 2,
            slidesToShow: 3,
            autoplay:true,
            loop:true,
            autoplaySpeed:1000,
        });

        bulmaCarousel.attach('#hero', {
            slidesToScroll: 1,
            slidesToShow: 1,
            loop:true,
            autoplay:true,
            autoplaySpeed:2500,
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