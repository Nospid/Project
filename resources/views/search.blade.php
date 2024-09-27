@extends('master')
@section('content')






 <div class="row row-cols-4 g-4 mx-4 mb-4">
   @if(count($products) > 0)

    @foreach($products as $product)
    <div class="col">
      <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">
        <div class="card bg-light" style="width: 250px; height: 300px;">
          <img src="{{ asset('images/products/'.$product->photopath) }}" class="card-img-top object-cover flick-effect" style="height: 200px;" alt="">

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
    @else
     <p class= "mx-10 font-extrabold">No products found.</p>
    @endif
  </div> 
@endsection

 
