<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crow Cottage Arts | Scottish Arts</title>

  <link rel="stylesheet" href="../../css/mystyles.css"> 
  <script src="https://kit.fontawesome.com/09255c1d6c.js" crossorigin="anonymous"></script>

  <style>
    html{
      background-color:#dddddd;
    }
    body{
      font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif; 
      letter-spacing: 3px !important;
    }

    .copper{
      font-size:1.25rem;
      font-weight:500; 
      color:#A6682E;
      text-shadow: 0 0 1px #7e7e7e;
    }

        /* Slideshow container */
    .slideshow-container {
      position: relative;
      margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    @keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    .background-image{
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      background-color: #999;
      height:35em;
    }
</style>

  @yield('head')
</head>

<body>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{route('home')}}">
        {{-- <img src="../logo2.png" width="412" height="328"> --}}
      </a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        {{-- <span class="navbar-item copper">&middot;</span> --}}
        <a class="navbar-item copper" href="/">
          HOME
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="{{route('alec')}}">
          ALEC GALLOWAY
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="{{route('shop')}}">
          SHOP
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper my-3">
          <img src="../logo2.png" width="452" height="378">
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="{{route('hire')}}">
          HIRE SPACE
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="{{route('contact_create')}}">
          CONTACT
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="{{route('basket_show')}}">
          <i class="fas fa-shopping-basket"></i>
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
