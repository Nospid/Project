@extends('layouts.app')
@section('content')
@include('layouts.message')

    <h2 class="font-bold text-4xl text-black-700 mx-2 mt-4">Ordes Details</h2> 
    <hr class="h-1 bg-blue-200">

    {{-- <div class="my-4 text-right px-10">
        <a href="{{route('order.details')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Go Back</a>
    </div> --}}
   

    <table id="mytable" class="display">
        <thead>
            <th>OrderDate</th>
            <th> Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Amount</th>
            <th>PaymentMethod</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->order_date}}</td>
                <td>{{$order->person_name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->shipping_address}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->status}}</td>
                <td>



                    {{-- <a href="" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Edit</a>
                    {{-- <a onclick="return confirm('Are you sure to delete?')" href="{{route('category.destroy',$category->id)}}" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a> --}}
{{-- 
                    <a onclick="return confirm('Are you sure to delete?')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer">Delete</a>  --}}
                    <a href="{{route('order.orderdetails',$order->id)}}" class="bg-purple-600 text-white px-3 py-1 rounded shadow hover:shadow-blue-400">
                        <i class="fas fa-eye mr-1"></i> 
                    </a>
                    
                    @if($order->status=='Pending')
                    <a  onclick="return confirm('Are you sure to change status?')" href="{{route('order.status',[$order->id,"Processing"])}}" class="bg-cyan-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-spinner fa-spin mr-1"></i></a>
                    <a onclick="return confirm('Are you sure to change status?')" href="{{ route('order.status', [$order->id, 'Cancelled']) }}" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">
                        <i class="fas fa-times-circle mr-1"></i> 
                      </a>
                      
                    @elseif($order->status=='Processing')
                    <a  onclick="return confirm('Are you sure to change status?')" href="{{route('order.status',[$order->id,"Completed"])}}" class="bg-green-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-check-circle mr-1"></i> </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('category.destroy')}}" method="POST">
                    @csrf
                    <p class="font-bold text-2xl">Are you Sure to Delete?</p>
                    <input type="hidden" name="dataid" id="dataid" value="">
                    <div class="flex justify-center">
                        <input type="submit" value="Yes" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">
                        <a onclick="hideDelete()" class="bg-red-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>

    <script>

        function showDelete(x)
        {
            // $('#dataid').val(x);
            document.getElementById('dataid').value = x;
            document.getElementById('deleteModal').style.display = "block";
        }

        function hideDelete()
        {
            document.getElementById('deleteModal').style.display = "none";
        }
    </script>
@endsection