@extends('master')

@section('content')
@include('message')


<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    thead th {
        background-color: #f2f2f2;
    }

    /* Add this CSS in your stylesheet or style tag */
.product-image-small {
    max-width: 100px;
    height: auto;
}

    
</style>



<table class="mx-4" style="margin-bottom: 5rem;">
    @if ($orders->isEmpty())
    <div class="text-center" style="margin-top: 10rem;">
        <h4>You haven't placed any orders yet.</h4>
        <p>Please order items to see your order history.</p>
    </div>
    @else
    <div class="text-center" style="margin-top: 5rem;">
        <h4>Your Order Details</h4>
    </div>

    <thead>
          <tr>
            <th>S.N.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Order Date</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
          </tr>
        </thead>
    <tbody>
    @php
        $serialNumber = 1;
    @endphp
    @foreach ($orders as $order)
        @foreach ($order->carts as $cart)
            <tr>
                <td>{{$serialNumber}}</td>
                <td><img src="{{asset('images/products/'.$cart->product->photopath)}}" class="product-image-small"></td>
                <td>{{$cart->product->name}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$cart->qty}}</td>
                <td>{{$cart->qty*$cart->product->price}}</td>
                <td class="status">{{$order->status}}</td>
            </tr>
            @php
                $serialNumber++
            @endphp
        @endforeach
    @endforeach
</tbody>

    @endif
</table>
<div class="go-back" style="margin-bottom:1rem; text-align:left; padding:1rem;">
  <a href="/myprofile" class="btn btn-info">Go Back</a>
</div>

@endsection
