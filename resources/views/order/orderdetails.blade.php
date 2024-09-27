@extends('layouts.app')
@section('content')
@include('layouts.message')

    <h2 class="font-bold text-4xl text-black-700 mx-2">Ordes </h2> 
    <hr class="h-1 bg-blue-200">

    <div class="my-4 text-right px-10">
        <a href="{{route('order.details')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Go Back</a>
    </div>

  



<table id="mytable" class="display">
     <thead>
        <th>Product</th>
        <th>Product Name</th>
        <th>Rate</th>
        <th>Qty</th>
        <th>Total</th>
        
        @if( $order->status=='Pending' )<th>Action</th>@endif
     </thead>
     <tbody>
        
        @foreach ($carts as $cart)
            
        
        <tr>
           <td><img class="w-20" src="{{ asset('images/products/'.$cart->product->photopath) }}" alt=""></td>
           <td>{{ $cart->product->name }}</td>
           <td>{{ $cart->product->price }}</td>
           <td>{{ $cart->qty }}</td>
           <td>{{ $cart->qty*$cart->product->price }}</td>
           @if( $order->status=='Pending' )
            <td>
             
                <a onclick="return confirm('Are you sure to Delete?')" href="{{ route('order.delete',$cart->id) }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a>
               
                 
            </td>
            @endif
        </tr>
       
        @endforeach
     </tbody>
    

</table>
<script>
    new DataTable('#mytable');
</script>
@endsection