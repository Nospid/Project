@extends('master')
@section('shop')


<div class="container">
  <div class="container px-lg-3 mt-4">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{ asset('images/images/image.png') }})">
            <div class="container py-5">
              <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                  <p class="text-muted small text-uppercase mb-2 text-black">New Inspiration 2023</p>
                  <h1 class="h2 text-uppercase mb-3" style="background-color: white;">20% off on new season</h1>
                  <a class="btn btn-dark" href="/">Browse collections</a>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="carousel-item">
          <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{ asset('images/images/good.jpg') }})">
            <div class="container">
              <div class="row px-4">
                <div class="col-lg-6">
                  <p class="text-muted small text-uppercase mb-2 text-yellow-500">Hot Deal</p>
                  <h1 class="h2 text-uppercase mb-3 text-gray-800">Up to 70% off on selected items</h1>
                  <a class="btn btn-dark" href="">Shop now</a>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="carousel-item">
          <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{ asset('images/images/hello.jpg') }})">
            <div class="container py-5">
              <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                  <p class="text-muted small text-uppercase mb-2 text-danger">Limited Time Offer</p>
                  <h1 class="h2 text-uppercase mb-3">Get 20% off on all products</h1>
                  <a class="btn btn-dark" href="">Explore now</a>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

      <!-- Add carousel controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>



<link rel="stylesheet" href="{{asset('mycss/index.css')}}">





    <div class="page-holder">
   
      <div class="container">
     
   
        <section class="py-5">
          <div class="container p-0">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6 ">
                <h1 class="h2 text-uppercase mb-0 text-dark">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 ">
                    <li class="breadcrumb-item"><a  href="/">Home</a></li>
                    <li class="breadcrumb-item active " aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="container">
              <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1 mt-4">
                  <div>
                    <h5 class="text-uppercase mb-4">Categories</h5>
                    @foreach ($categories as $category)
                    <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                      <li class="mb-2">
                        <a class="reset-anchor" href="{{ route('categoryproduct', $category->id) }}">
                          {{ $category->name }}
                        </a>
                      </li>
                    </ul>
                    @endforeach
                  </div>
                  <h5 class="text-uppercase mb-4 mt-4">Brands</h5>
                  @foreach($brands as $brand)
                  <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                    <li class="mb-2">
                      <a class="reset-anchor" href="{{ route('brandproduct', $brand->id) }}">
                        {{$brand->name}}
                      </a>
                    </li>
                  </ul>
                  @endforeach
                
                  
                </div>
                  
             











                
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                  <div class="row row-cols-4 g-4 p-3">
                    <!-- PRODUCT-->
                    @foreach($products as $product)
                    <div class="col mx-4">
                      <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">
                        <div class="card bg-light flicker-horizontal">
                          <img src="{{ asset('images/products/'.$product->photopath) }}" class="card-img-top object-cover" style="height: 200px;" alt="">
                          <div class="card-body">
                            <h5 class="card-title font-weight-bold text-dark">{{ $product->name }}</h5>
                            <p class="card-text">
                              @if($product->oldprice != '')
                              <span class="text-decoration-line-through text-danger">{{ $product->oldprice }}/-</span>
                              @endif
                              <span class="text-dark">Rs. {{ $product->price }}/-</span>
                            </p>
                            @if($product->oldprice != '')
                            @php
                              $discount = ($product->oldprice - $product->price) / $product->oldprice * 100;
                              $discount = round($discount);
                            @endphp
                            <p class="position-absolute top-0 end-0 bg-info text-white rounded-pill px-2 py-1">{{ $discount }}% off</p>
                            @endif
                          </div>
                        </div>
                      </a>
                    </div>
                    @endforeach
                  </div>
                </div>
                
              </div>
            </div>
          </div>
            
          </div>
          {{-- <div class="col-lg-3 order-3 order-lg-1 mt-5">
            <h5 class="text-uppercase mb-4 text-white">Brands</h5>
            @foreach ($brands as $brand)
                
          
            <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
              <li class="mb-2"><a class="reset-anchor" href="{{route('brandproduct'
              ,$brand->id)}}">{{$brand->name}}</a></li>
             
            </ul>
            @endforeach
         
           
          </div> --}}
        </section>
      </div>



            
      
    
    </div>


   


    
@endsection