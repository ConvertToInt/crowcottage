@extends('layout')

@section('head')

<title>Crow Cottage Arts | Alec Galloway</title>
<x-embed-styles />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/css/bulma-carousel.min.css">

@endsection

@section('content')

<div class="columns is-centered m-6">
  <div class="column is-10">
      <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('alec')}}">Alec Galloway</a></p>
      <hr class="grey-8 mb-2">
  </div>
</div>

<div class="columns is-centered px-5">
    <div class="column is-8">
        <p class="has-text-justified is-size-5 has-text-weight-light">Alec Galloway is a Scottish stained glass artist and painter based in Inverclyde on the West coast of Scotland.
        His glass work falls into a range of specialisms including; commercial projects, restoration of traditional glass and contemporary gallery based pieces.</p>
    </div>
</div>


<div class="columns is-centered has-text-centered px-5">
  <div class="column is-8 pt-6">
      <img class="img_shadow is-inline-block" src="img/alec2.jpg" alt="Alec Galloway" style="width:90%">
  </div>
</div>

<div class="columns is-centered mt-6 px-5">
  <div class="column is-8">
      <p class="has-text-centered is-size-3">Behind the scenes</p>
  </div>
</div>

<div class="columns is-centered px-5">
    <div class="column is-6">
        <div class="mt-5" id="vidbox">
            <x-embed url="https://www.youtube.com/watch?v=fOgkD3gzpWc"/>
        </div>
    </div>
</div>

<div class="columns is-centered mt-5 px-5">
  <div class="column is-8">
    <hr class="grey-8">
      <h1 class="is-size-3">My Work</h1><br>
  </div>
</div>

<section class="section">
  <div class="container">
    <!-- Start Carousel -->
    <div id="carousel-demo" class="carousel">
      <div class="item-1 mr-3">
        <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
      </div>
      <div class="item-2 mr-3">
        <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
      </div>
      <div class="item-3 mr-3">
        <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
      </div>
      <div class="item-4 mr-3">
        <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
      </div>
      <div class="item-5 mr-3">
        <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
      </div>
      <div class="item-6 mr-3">
        <img src="{{ asset('img/projects/axis.jpg')}}" alt="" class="img_shadow">
      </div>
    </div>
    <!-- End Carousel -->
  </div>
</section>

<p class="has-text-centered is-size-5 pb-5 px-5">You Can View More of My Work By Clicking <a href="http://alecgalloway.net">Here</a></p>

<script src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/js/bulma-carousel.min.js"></script>

<script>
  bulmaCarousel.attach('#carousel-demo', {
    slidesToScroll: 1,
    slidesToShow: 4,
    autoplay:true,
    autoplaySpeed:1500,
    loop:true
  });
</script>


@endsection
