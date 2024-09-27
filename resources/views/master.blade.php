{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is title</title>
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex px-24 justify-between p-2 text-lg">
        <span>Ph: 0564564656</span>
        @if(auth()->user())
            <div>
                <a href="">{{auth()->user()->name}} /</a>
                <form class="inline" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit"> Logout</button>
                </form>
                <a href="{{route('cart.index')}}"> My Cart</a>
            </div>
            @else
        <span><a href="{{route('userlogin')}}">Login/Register</a></span>
        @endif
    </div>
    <nav class="navbar sticky top-0">
        <ul class="menu">
            <li><a href="/">Home</a></li>
            @foreach($categories as $category)
            <li><a href="/">{{$category->name}}</a></li>
            @endforeach
            
        </ul>
    </nav>


    @yield('content')

    <footer class="footer">
        <p>This is footer</p>
    </footer>

    
</body>
</html> --}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Optical Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->

    <!-- Google fonts-->
    
    <link rel="stylesheet" href="{{asset('frontend/css/style.default.css')}}" id="theme-stylesheet"> 
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}"> 
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.png')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
  </head>
 
  <body class>
    <div class="page-holder">
      <!-- Top header -->
      <header class="header">
        <div class="container px-lg-3 bg-warning">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0 custom-bg">
            <div class="navbar-collapse justify-content-start">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link custom-text" href="tel:1234567890">
                          <i class="fas fa-phone me-1"></i>+977-9866003340
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link custom-text" href="mailto:info@example.com">
                          <i class="fas fa-envelope me-1"></i>dipsonpokrel4@gmail.com
                      </a>
                  </li>
              </ul>
          
              <!-- Search Form -->
              <form class="d-flex" action="{{ route('search') }}" method="GET" style="margin-right: 4rem;">
                  @csrf
                  <input class="form-control me-2" type="search" name="searchtext" placeholder="Search products" aria-label="Search">
                  <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
              </form>
          </div>
          
            <div class="navbar-collapse justify-content-end">
              @if(auth()->user())
            <div>
                <a class="text-light" href="{{route('myprofile')}}">Welcome:({{auth()->user()->name}})</a>
                <form class="inline" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" style="background-color: black; color: rgb(248, 250, 247);"><i class="fas fa-sign-out-alt"></i>Logout</button>

                </form>
                
            </div>
            @else
            <span>
              <a href="{{ route('userlogin') }}" class="text-light">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </span>
            
        @endif
            </div>
          </nav>
        </div>
      </header>
    
      <!-- Main header -->
      <header class="header bg-light">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
            <a class="navbar-brand" href="/">
              <span class="fw-bold text-uppercase text-light">
                <img src="{{asset('frontend/img/logo.png')}}" alt="">
              </span>
            </a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/">Home</a>
                </li>
                <!-- Add your dynamic categories loop here -->
                {{-- @foreach ($categories as $category)
                <li class="nav-item">
                  <a class="nav-link" href="">{{$category->name}}</a>
                </li>
                @endforeach --}}
                <li class="nav-item">
                  <a class="nav-link" href="{{route('shop')}}">Shop</a>
                </li>
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a>
                    <a class="dropdown-item border-0 transition-link" href="">Category</a>
                    <a class="dropdown-item border-0 transition-link" href="">Product detail</a>
                    <a class="dropdown-item border-0 transition-link" href="{{route('cart.checkout')}}">Checkout</a>
                  </div>
                </li> --}}
              </ul>
             
              @if(auth()->user())
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/cart">
                    <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart
                    <sup class="text-black fw-normal">{{$itemsincart}}</sup>
                  </a>
                </li>
              </ul>
              @endif
            </div>
          </nav>
        </div>
      </header>
      
    </div>
    
      <!-- HERO SECTION -->
   
  
   
@yield('shop')
@yield('content')




<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

<!--Jquery Files-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>





      <!-- JavaScript files-->

      <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
      <script src="{{asset('frontend/js/front.js')}}"></script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>


 




















    <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
               
                <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                <li><a class="footer-link" href="#!">Online Stores</a></li>
                <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="/about">About us</a></li>
                <li><a class="footer-link" href="/contact">Contact us</a></li>
                <li><a class="footer-link" href="/blog">Blogs</a></li>
                <li><a class="footer-link" href="!">Maps</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Twitter</a></li>
                <li><a class="footer-link" href="#!">Instagram</a></li>
                <li><a class="footer-link" href="#!">Facebook</a></li>
                <li><a class="footer-link" href="https://www.google.com/">Google</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="text-center ">
                <p class="small  mb-0 text-light ">&copy; 2021 All rights reserved.</p>
              </div>
              <div class=" text-center text-md-end">
                <p class="small text-muted mb-0 text-center"> <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Optical Store</a></p>
               
              </div>
            </div>
          </div>
        </div>
      </footer>






    
  
  </body>
</html>