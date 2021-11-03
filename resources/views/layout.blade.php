<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crow Cottage Arts | Scottish Arts</title>

  <link rel="stylesheet" href="../../css/mystyles.css"> 
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
  <script src="https://kit.fontawesome.com/09255c1d6c.js" crossorigin="anonymous"></script>

  @yield('head')
</head>

<body>
  {{-- <div>
    <a href="{{route('home')}}" style="display:flex;justify-content:center;">
      <img src="../logo2.png" width="350" height="200" >
    </a>
    <a class="nav-font" href="{{route('basket_show')}}" style="display:flex;justify-content:right;">
      <i class="fas fa-shopping-basket has-text-right"></i>
    </a>
  </div> --}}
  
  
  <nav class="navbar" role="navigation" aria-label="main navigation">
    
    <div class="navbar-brand">
      <a class="navbar-item mt-2" href="{{route('home')}}" style="position:absolute"> {{-- style="position:absolute" --}}
        <img class="ml-2" src="../logo4.png" width="115">
      </a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-end" style="flex-grow: 1; justify-content: center;"> {{-- style="flex-grow: 1; justify-content: center;" --}}
        <span class="navbar-item nav-dot">&middot;</span>
        <a class="navbar-item nav-font" href="/">
          HOME
        </a>
        <span class="navbar-item nav-dot">&middot;</span>
        <a class="navbar-item nav-font" href="{{route('alec')}}">
          ALEC GALLOWAY
        </a>
        <span class="navbar-item nav-dot">&middot;</span>
        <a class="navbar-item nav-font" href="{{route('shop')}}">
          SHOP
        </a>
        {{-- <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper my-3">
          <img src="../logo2.png" width="225" height="175">
        </a> --}}
        <span class="navbar-item nav-dot">&middot;</span>
        <a class="navbar-item nav-font" href="{{route('hire')}}">
          HIRE SPACE
        </a>
        <span class="navbar-item nav-dot">&middot;</span>
        <a class="navbar-item nav-font" href="{{route('contact_create')}}">
          CONTACT
        </a>
        <span class="navbar-item nav-dot">&middot;</span>
      </div>
      <div class="navbar-end">
        <a class="navbar-item nav-font" href="{{route('basket_show')}}" style="width:75px;"> {{-- style="position:absolute" --}}
          <i class="fas fa-shopping-basket has-text-right"></i>
        </a>
  
        {{-- <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            More 
          </a>
  
          <div class="navbar-dropdown">
            <a class="navbar-item">
              About
            </a>
            <a class="navbar-item">
              Jobs
            </a>
            <a class="navbar-item">
              Contact
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              Report an issue
            </a>
          </div>
        </div> --}}
      </div>
    </div>
  </nav>

  @yield('content')

  <footer class="mt-6 pt-4 nav-font is-size-6">
    <div class="columns is-centered">
      <div class="column has-text-centered is-6">
        <p class="mb-3 has-text-weight-bold">Opening Hours:</p>
        <p>Mon - 10:00 - 17:00</p>
        <p>Tue - 10:00 - 17:00</p>
        <p>Wed - 10:00 - 17:00</p>
        <p>Thu - 10:00 - 17:00</p>
        <p>Fri - 10:00 - 17:00</p>
        <p>Sat - 10:00 - 17:00</p>
        <p>Sun - CLOSED</p>
      </div>
      {{-- <div class="column is-2">

      </div> --}}
      <div class="column has-text-centered is-6">
        <p class="mb-3 has-text-weight-bold">Address:</p>
        <p>26 Kempock Street</p>
        <p>Gourock</p>
        <p>Inverclyde</p>
        <p>Scotland</p>
        <p>PA19 1NA</p>
        <p>01475 89989</p>
        <a class="has-text-weight-medium is-size-5" href="{{route('contact_create')}}">Contact Us</a>
      </div>
    </div>
    <div class="columns is-centered">
    <div class="column is-4 is-3-desktop">
      <div class="columns">
        <div class="column is-4">
          <a href=""><div class="socials" id="facebook"></div></a>
        </div>
        <div class="column is-4">
          <a href=""><div class="socials" id="insta"></div></a>
        </div>
        <div class="column is-4">
          <a href=""><div class="socials" id="youtube"></div></a>
        </div>
      </div>
    </div>
    </div>
    <div class="columns is-centered">
      <div class="column has-text-centered">
        &#169; 2021 CROWCOTTAGEARTS ALL RIGHTS RESERVED
      </div>
    </div>
  </footer>

  <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
    </script>

</body>

</html>
