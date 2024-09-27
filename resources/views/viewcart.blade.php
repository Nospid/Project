@extends('master')
@section('content')

@include('message')

<style>
  .small-input {
    width: 60px;
    height: 30px;
    font-size: 16px;
  }
</style>

<section class="py-5 mx-4">
  <h2 class="h5 text-uppercase mb-4" style="margin-inline-start: 30rem">Shopping cart</h2>
  <div class="row" style="margin-left: 100px;">
    <div class="col-lg-8 mb-4 mb-lg-0">
      <!-- CART TABLE-->
      <div class="table-responsive mb-4">
        @if ($carts->isEmpty())
        <div class="text-center">
          <h4>Your cart is empty.</h4>
          <p>Please add items to your cart before proceeding to checkout.</p>
        </div>
        @else
        <table class="table text-nowrap">
          <thead>
            <tr>
              <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
              <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
              <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
              <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">SubTotal</strong></th>
              <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Action</strong></th>
            </tr>
          </thead>
          <tbody>
            @php 
            $totalamount=0
            @endphp
            @foreach ($carts as $cart)
            <tr>
              <th class="ps-0 py-3" scope="row">
                <div class="d-flex align-items-center">
                  <a class="reset-anchor d-block animsition-link">
                    <img src="{{ asset('images/products/'.$cart->product->photopath) }}" alt="..." width="100"/>
                  </a>
                  <div class="ms-3">
                    <strong class="h6"><a class="reset-anchor animsition-link">{{ $cart->product->name }}</a></strong>
                  </div>
                </div>
              </th>
              <td class="p-3 align-middle">
                <p class="mb-0 small">{{ $cart->product->price }}</p>
              </td>
              <form action="{{ route('cart.update', $cart->id) }}" method="post" class="updateform">
                @csrf
                <td class="align-middle">
                  <p class="mt-4 d-flex align-items-center">
                    <span class="bg-gray-200 px-4 font-bold text-xl" onclick="subqty('{{ $cart->id }}')">-</span>
                    <input class="h-11 w-12 small-input text-center border-0 bg-gray-100" id="qty{{ $cart->id }}" name="qty" value="{{ $cart->qty }}" type="number" readonly>

                    <span class="bg-gray-200 px-4 font-bold text-xl" onclick="addqty('{{ $cart->id }}')">+</span>
                    <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stock }}">
                  </p>
                </td>
                <td class="p-3 align-middle">
                  <p class="mb-0 small product-total" id="total{{ $cart->id }}">{{ $cart->qty * $cart->product->price }}</p>
                </td>
                <td class="align-middle border-1">
                  <button type="submit" class="bg-dark text-info rounded-lg px-2 py-1 mx-2">Update</button>
                  </form>
                  <a class="reset-anchor" onclick="return confirm('Are you sure to delete?')" href="{{ route('cart.delete', $cart->id) }}"><i class="fas fa-trash-alt small text-dark mx-3"></i></a>
                </td>
            </tr>
            @php
         
            $totalamount+= $cart->product->price * $cart->qty;
            @endphp
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <h5>Grandtotal</h5>
              </td>
              <td>
                <h5>Rs. {{ $totalamount }}</h5>
              </td>
            </tr>
          </tbody>
        </table>
        @endif
      </div>
    </div>
      <!-- CART NAV-->
      <div class="bg-light px-4 py-3">
        <div class="row align-items-center text-center">
          <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="{{ route('home') }}"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></div>
          
          @if (!$carts->isEmpty())
      <div class="col-md-6 mb-3 mb-md-0">
        <a class="btn btn-outline-dark btn-sm" href="{{ route('cart.checkout') }}">Proceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a>
      </div>
    @endif
        </div>
      </div>
    
  </div>
</section>

<script>
  function addqty(x) {
    var qtyInput = document.getElementById('qty' + x);
    var qtyValue = parseInt(qtyInput.value);
    var stock = parseInt(document.getElementById('stock' + x).value);
    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
      var rate = parseFloat(document.getElementById('total' + x).innerHTML) / qtyValue;
      document.getElementById('total' + x).innerHTML = rate * (qtyValue + 1);
    }
  }

  function subqty(x) {
    var qtyInput = document.getElementById('qty' + x);
    var qtyValue = parseInt(qtyInput.value);
    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
      var rate = parseFloat(document.getElementById('total' + x).innerHTML) / qtyValue;
      document.getElementById('total' + x).innerHTML = rate * (qtyValue - 1);
    }
  }
</script>

@endsection
