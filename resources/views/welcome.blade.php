 @extends('master')

 

@section('content')

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
        <div class="carousel-item ">
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




<section class="my-5 mx-4 mr-4">
  <header class="text-center">
    <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
    <h2 class="h5 text-uppercase mb-4">Browse our Top Brands</h2>
  </header>
  <div class="row">
    <div class="col-md-4">
      <a class="category-item" href="{{ route('shop') }}">
        <img class="img-fluid img-resize flip-effect" style="height: 27rem;" src="{{ asset('images/images/234.jpg') }}" alt=""/>
        <strong class="category-item-title">RayBan</strong>
      </a>
    </div>
    <div class="col-md-4">
      <a class="category-item mb-4" href="{{ route('shop') }}">
        <img class="img-fluid img-resize flip-effect" src="{{ asset('images/images/mewnew.png') }}" alt=""/>
        <strong class="category-item-title">NewMew</strong>
      </a>
      <a class="category-item" href="{{ route('shop') }}">
        <img class="img-fluid img-resize flip-effect" src="{{ asset('images/images/gucci.jpg') }}" alt=""/>
        <strong class="category-item-title">Gucci</strong>
      </a>
    </div>
    <div class="col-md-4">
      <a class="category-item" href="{{ route('shop') }}">
        <img class="img-fluid img-resize flip-effect" style="height: 27rem;" src="{{ asset('images/images/123.jpg') }}" alt=""/>
        <strong class="category-item-title">Oakley</strong>
      </a>
    </div>
  </div>
</section>










    
<link rel="stylesheet" href="{{asset('mycss/style.css')}}">

<p class="small text-muted small text-uppercase my-4 mx-4">Made the hard way</p>
<h2 class="h5 text-uppercase text-warning my-4 mx-4">Top trending products</h2>




<div class="container">
    <div class="row row-cols-4 g-4">
      @foreach($products as $product)
      <div class="col">
        <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">
          <div class="card bg-light" style="width: 250px; height: 300px;">
            <img src="{{ asset('images/products/'.$product->photopath) }}" class="card-img-top object-cover " style="height: 200px;" alt="">

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
   
      
    
      <div class="row">
        <div class="col">
          {{ $products->links('pagination::bootstrap-5') }}
        </div>
      </div>
   
    
    
</div>



<div class="container">
  {{-- <div class="row row-cols-4 g-4">
    @foreach($topeightproducts as $product)
    <div class="col">
      <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">
        <div class="card bg-light" style="width: 250px; height: 300px;">
          <img src="{{ asset('images/products/'.$product->photopath) }}" class="card-img-top object-cover " style="height: 200px;" alt="">

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
  </div> --}}
 
    
  
     {{-- <div class="row">
      <div class="col">
        {{ $products->links('pagination::bootstrap-5') }}
      </div>
    </div> 
  --}}
  
  
</div>
















<section class="bg-warning mt-32 my-5">
  <div class="container">
    <div class="row text-center gy-3">
      <div class="col-lg-3">
        <div class="d-inline-block">
          <div class="d-flex align-items-end">
            <svg class="svg-icon svg-icon-big svg-icon-dark">
              <use xlink:href="#delivery-time-1"> </use>
            </svg>
            <div class="text-startms-3">
              <h6 class="text-uppercase mb-1">Free shipping</h6>
              <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="d-inline-block">
          <div class="d-flex align-items-end">
            <svg class="svg-icon svg-icon-big svg-icon-light">
              <use xlink:href="#helpline-24h-1"> </use>
            </svg>
            <div class="text-start ms-3">
              <h6 class="text-uppercase mb-1">24 x 7 service</h6>
              <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-inline-block">
          <div class="d-flex align-items-end">
            <svg class="svg-icon svg-icon-big svg-icon-light">
              <use xlink:href="#label-tag-1"> </use>
            </svg>
            <div class="text-start ms-3">
              <h6 class="text-uppercase mb-1">Festivaloffers</h6>
              <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container p-0">
    <div class="row gy-3">
      <div class="col-lg-6">
        <h5 class="text-uppercase text-warning">Let's be friends!</h5>
        <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
      </div>
      <div class="col-lg-6">
        <form action="#">
          <div class="input-group">
            <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
            <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>










@endsection