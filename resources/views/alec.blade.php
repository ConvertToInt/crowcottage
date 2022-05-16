@extends('layout')

@section('head')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.3/dist/css/bulma-carousel.min.css">

@endsection

@section('content')

<div class="columns is-centered m-6">
  <div class="column is-10">
      <p class="is-size-5 site-path"><a href="{{route('home')}}">Home</a> &#8594; <a href="{{route('alec')}}">Alec Galloway</a></p>
      <hr class="grey-8 mb-2">
  </div>
</div>

<div class="columns is-centered px-6">
    <div class="column is-8">
        <p class="has-text-justified is-size-5 has-text-weight-light">Alec Galloway is a Scottish stained glass artist and painter based in Inverclyde on the West coast of Scotland.
        His glass work falls into a range of specialisms including; commercial projects, restoration of traditional glass and contemporary gallery based pieces.</p>
    </div>
</div>


<div class="columns is-centered has-text-centered px-6">
  <div class="column is-8 pt-6">
      <img class="img_shadow is-inline-block" src="img/alec2.jpg" alt="Alec Galloway" style="width:90%">
  </div>
</div>

<div class="columns is-centered mt-6 px-6">
  <div class="column is-8">
      <p class="has-text-justified is-size-5 has-text-weight-light">Alec Galloway is a Scottish stained glass artist and painter based in Inverclyde on the West coast of Scotland.
      His glass work falls into a range of specialisms including; commercial projects, restoration of traditional glass and contemporary gallery based pieces.</p>
  </div>
</div>

<div class="columns is-centered mt-5 px-6">
  <div class="column is-8">
    <hr class="grey-8">
      <h1 class="is-size-3">My Work</h1><br>
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

<p class="has-text-centered is-size-5 pb-5">You Can View More of My Work By Clicking <a href="http://alecgalloway.net">Here</a></p>

{{-- <div class="columns is-centered">
    <div class="column is-8">
        <h1 class="has-text-grey-darker is-size-3 mb-6 mt-6 underlined">Projects</h1>

        <div class="columns">
            <div class="column is-4">
              <a href="axis.html">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="img/projects/axis.jpg" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <p class="card-title has-text-weight-semibold">Axis</p> 
                    <p class="card-description">Axis is an ongoing project that focuses on the study of iconic british guitars</p>
                    
                    <p class="card-date">Jan 2014 - Present</p>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="column is-one-third">
              <a href="absent.html">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="img/projects/absent.jpg" alt="Placeholder image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <p class="card-title has-text-weight-semibold">Absent Voices</p> 
                    <p class="card-description">Focusing on the legacy of Inverclyde’s sugar history and heritage</p>
                    
                    <p class="card-date">Dec 2017 - Feb 2018</p>
                  </div>
                </div>
              </div>
              </a>
            </div>
            <div class="column is-one-third">
                <a href="chair.html">
                  <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by3">
                        <img src="img/projects/chair.jpg" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content">
                        <p class="card-title has-text-weight-semibold">Art Chair</p> 
                        <p class="card-description">Bringing together creatives to create work from the viewpoint of the 'Art Chair'</p>
                        
                        <p class="card-date">March 2012 - July 2014</p>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </a>
        </div>
    </div>
</div>
</div> --}}

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