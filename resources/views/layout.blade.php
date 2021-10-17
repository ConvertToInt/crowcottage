<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crow Cottage Arts | Scottish Arts</title>

  <link rel="stylesheet" href="../../css/mystyles.css"> 
  <style>
    html{
      background-color:hsl(0, 0%, 92%);
    }

    .copper{
      font-size:1.5rem;
      font-weight:500; 
      color:#A6682E;
      text-shadow: 0 0 1px #7e7e7e;
    }
  </style>

  @yield('head')
</head>

<body>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{route('home')}}">
        {{-- <img src="logo.png" width="412" height="328"> --}}
      </a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="/">
          HOME
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper">
          ABOUT
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper" href="{{route('shop')}}">
          SHOP
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper">
          <img src="../logo.png" width="412" height="328">
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper">
          STAINED GLASS
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper">
          EVENTS
        </a>
        <span class="navbar-item copper">&middot;</span>
        <a class="navbar-item copper">
          CONTACT
        </a>
        <span class="navbar-item copper">&middot;</span>
  
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

</body>
</html>
