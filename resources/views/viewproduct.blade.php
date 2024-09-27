@extends('master')
@section('content')
@include('message')

<div class="container mt-4">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset('images/products/'.$product->photopath) }}" alt="" class="w-100 h-96 object-cover rounded-lg">
      </div>
      <div class="col-md-8 border-start">
        <h2 class="text-3xl ">{{ $product->name }}</h2>
        <p class="card-text">
            @if($product->oldprice != '')
            <span class="text-decoration-line-through text-danger">{{$product->oldprice}}/-</span>
            @endif
            <span class="">Rs. {{$product->price}}/-</span>
          </p>
          <p class="">Brand:  {{ $product->brand->name }}</p>
          
          <p class="">Category: {{ $product->category->name }}</p>
        <form action="{{ route('cart.store') }}" method="POST">
         
        <p >Quantity:
            <input class="h-11 w-12 px-0 text-center border-0 bg-light" type="number" name="qty" value="1" min="1" max="{{ $product->stock }}"></p>
       
  
         
          <p >In Stock: {{ $product->stock }}</p>
          
          <div class="mt-14">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-primary px-6 py-2 rounded-lg shadow">Add to Cart</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="container px-44 my-10">
    <h2 class="font-weight-bold text-2xl ">About this product</h2>
    <p class="">{{ $product->description }}</p>
  </div>
  

 

  <h3 class=" text-center text-uppercase py-4" style="margin-inline-start: 7rem;"  >Related Products</h3>
  <div class="container">
      <div class="row row-cols-4 g-4" style=" margin-bottom: 20px;">
        @foreach($relatedproducts as $products)
        <div class="col">
          <a href="{{ route('viewproduct', $products->id) }}" class="text-decoration-none">
            <div class="card bg-light" style="width: 250px; height: 300px;">
              <img src="{{ asset('images/products/'.$products->photopath) }}" class="card-img-top object-cover" style="height: 200px;" alt="">
  
              <div class="card-body">
                <h5 class="card-title font-weight-bold text-dark">{{ $products->name }}</h5>
                <p class="card-text">
                  @if($products->oldprice != '')
                  <span class="text-decoration-line-through text-danger">{{ $products->oldprice }}/-</span>
                  @endif
                  <span class="text-dark">Rs. {{ $products->price }}/-</span>
                </p>
                @if($products->oldprice != '')
                @php
                  $discount = ($products->oldprice - $products->price) / $products->oldprice * 100;
                  $discount = round($discount);
                @endphp
                <p class="position-absolute top-0 end-0 bg-info text-white rounded-pill px-2 py-1">{{ $discount }}% off</p>
                @endif
              </div>
              <div class="card-hover-overlay">
                <div class="card-overlay-content">
                  <h5 class="card-title">{{ $products->name }}</h5>
                  <p class="card-text">
                    @if($products->oldprice != '')
                    <span class="text-decoration-line-through text-danger">{{ $products->oldprice }}/-</span>
                    @endif
                    <span class="text-dark">Rs. {{ $products->price }}/-</span>
                  </p>
                  <p>{{ $products->description }}</p>
                  <a href="{{ route('viewproduct', $products->id) }}" class="btn btn-primary">View Product</a>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
  </div>

  



  
  
@endsection