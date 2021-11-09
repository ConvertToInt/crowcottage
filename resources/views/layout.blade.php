<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <a class="copper" href="{{route('basket_show')}}" style="display:flex;justify-content:right;">
      <i class="fas fa-shopping-basket has-text-right"></i>
    </a>
  </div> --}}
  
  
  <nav class="navbar" role="navigation" aria-label="main navigation">
    
    <div class="navbar-brand">
      <a class="navbar-item mt-2" href="{{route('home')}}" style="position:absolute"> {{-- style="position:absolute" --}}
        <img class="ml-1" src="../logo4.png" width="115">
      </a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div class="navbar-menu has-text-centered">
      <div class="navbar-start mt-1" style="flex-grow: 1; justify-content: center;"> {{-- style="flex-grow: 1; justify-content: center;" --}}
        <span class="navbar-item copper is-size-3-widescreen is-size-4-tablet p-1 is-hidden-mobile is-hidden-tablet-only">&middot;</span>
        <a class="navbar-item copper is-size-4-mobile is-size-4-tablet is-size-6-desktop is-size-5-widescreen" href="/">
          HOME
        </a>
        <span class="navbar-item copper is-size-3-widescreen is-size-4-tablet p-1 is-hidden-mobile is-hidden-tablet-only">&middot;</span>
        <a class="navbar-item copper is-size-4-mobile is-size-4-tablet is-size-6-desktop is-size-5-widescreen" href="{{route('alec')}}">
          ALEC GALLOWAY
        </a>
        <span class="navbar-item copper is-size-3-widescreen is-size-4-tablet p-1 is-hidden-mobile is-hidden-tablet-only">&middot;</span>
        <a class="navbar-item copper is-size-4-mobile is-size-4-tablet is-size-6-desktop is-size-5-widescreen" href="{{route('shop')}}">
          SHOP
        </a>
        {{-- <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper my-3">
          <img src="../logo2.png" width="225" height="175">
        </a> --}}
        <span class="navbar-item copper is-size-3-widescreen is-size-4-tablet p-1 is-hidden-mobile is-hidden-tablet-only">&middot;</span>
        <a class="navbar-item copper is-size-4-mobile is-size-4-tablet is-size-6-desktop is-size-5-widescreen" href="{{route('hire')}}">
          HIRE SPACE
        </a>
        <span class="navbar-item copper is-size-3-widescreen is-size-4-tablet p-1 is-hidden-mobile is-hidden-tablet-only">&middot;</span>
        <a class="navbar-item copper is-size-4-mobile is-size-4-tablet is-size-6-desktop is-size-5-widescreen" href="{{route('contact_create')}}">
          CONTACT
        </a>
        <span class="navbar-item copper is-size-3-widescreen is-size-4-tablet p-1 is-hidden-mobile is-hidden-tablet-only">&middot;</span>
        <a class="navbar-item copper is-size-4-mobile is-size-4-tablet is-size-6-desktop is-mobile" href="{{route('basket_show')}}">
          BASKET
        </a>
      </div>
      <div class="navbar-end">
        <a class="navbar-item copper mt-5 mr-4 is-hidden-mobile is-hidden-tablet-only" href="{{route('basket_show')}}" style="position:absolute"> {{-- style="position:absolute" --}}
          <i class="fas fa-shopping-basket has-text-right"></i>
        </a>
      </div>
    </div>
  </nav>

  @yield('content')

  <footer class="mt-6 pt-4 copper is-size-6">
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
    <div class="columns is-mobile is-centered">
      <div class="column is-8-mobile is-4-tablet is-3-widescreen">
        <div class="columns is-mobile has-text-centered">
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

  <div class="loading_modal"><!-- Place at bottom of page --></div>

  <script>

    $( document ).ready(function() {

        $(document.body).on("click", '.navbar-burger', function(event){
          $('.navbar-burger').toggleClass('is-active');
          $('.navbar-menu').toggleClass('is-active');
        });

        $body = $("body");

        $(document).on({
            ajaxStart: function() { $body.addClass("loading");    },
            ajaxStop: function() { $body.removeClass("loading"); }    
        });  

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

  </script>

</body>

</html>
