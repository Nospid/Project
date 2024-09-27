@extends('master')
@section('shop')

@include('message')
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

  <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
    <div class="col-lg-6 text-right">
        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 ">
            <li class="breadcrumb-item"><a  href="/">Home</a></li>
            <li class="breadcrumb-item"><a  href="/shop">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">CategoryProduct</li>

          </ol>
    </div>
    
  </div>

<h2 class="text-center mt-4">{{$category->name}}</h2>
<div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
               
    <div class="row row-cols-4 g-4 p-3">
     
      <!-- PRODUCT-->
      @foreach($products as $product)
      <div class="col mx-4">
        <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">
          <div class="card bg-light" style="width: 250px; height: 300px;">
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
            <div class="card-hover-overlay">
              <div class="card-overlay-content">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">
                  @if($product->oldprice != '')
                  <span class="text-decoration-line-through text-danger">{{ $product->oldprice }}/-</span>
                  @endif
                  <span class="text-dark">Rs. {{ $product->price }}/-</span>
                </p>
                <p>{{ $product->description }}</p>
                <a href="{{ route('viewproduct', $product->id) }}" class="btn btn-primary">View Product</a>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  
  </div>

  <div class="mx-24 my-10">
    {{$products->links()}}
  </div>

@endsection