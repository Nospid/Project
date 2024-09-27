<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       

    </head>
    <body class=" bg-gradient-to-r from-cyan-100 to-black-500 bg-gray-100">
       <div class="flex">
        <div class="w-56 fixed left-0 h-screen bg-gradient-to-r from-cyan-900 to-black-500 bg-gray-200 top-0 bottom-0">
            <img class=" mx-4 w-44 my-6 rounded-lg py-3" src="{{asset('images\images\logo.png')}}" alt="">
                <div class="flex flex-col">

                 
                    
                    
                    <a href="/dashboard" class="text-xl font-bold border-b-2 block ml-4 px-2 py-2 hover:bg-amber-500 hover:text-black">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    
                    <a href="{{route('category.index')}}" class="text-xl font-bold border-b-2 block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                        <i class="fas fa-list"></i> Categories
                    </a>
                    
                    <a href="{{route('brand.index')}}" class="text-xl font-bold border-b-2  block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                        <i class="fas fa-tags"></i> Brands
                    </a>
                    
                    <a href="{{route('product.index')}}" class="text-xl font-bold border-b-2  block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                        <i class="fas fa-box"></i> Products
                    </a>
                    
                    <a href="{{route('order.details')}}" class="text-xl font-bold border-b-2  block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                        <i class="fas fa-shopping-cart"></i> Orders
                    </a>
                    
                    <a href="{{route('user.userdetails')}}" class="text-xl font-bold border-b-2  block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                        <i class="fas fa-users"></i> Users
                    </a>
                    <a href="/adminprofile" class="text-xl font-bold border-b-2  block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                        <i class="fa fa-user"></i>  Profile
                    </a>
                    
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="text-xl font-bold border-b-2 border-white-500 block ml-4 px-2 py-1 hover:bg-amber-500 hover:text-black">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                    
                    

                {{-- @if(auth()->user()->role=="admin")
                <a href="/product" class="text-20 text-white m-3">Product</a>
                @endif --}}
                
            
                
                </div>
            </div>
            <div class="flex-1 bg-sky-100 pl-56">
                @yield('content')
    
            </div>
        </div>
        
                
       
    </body>
</html>