@extends('layouts.app')
@section('content')
@include('layouts.message')

    <h2 class="font-bold text-4xl text-black-700 mx-2">Brands</h2> 
    <hr class="h-1 bg-blue-200">

    <div class="my-4 text-right px-10">
        <a href="{{route('brand.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Brand</a>
    </div>

    <table id="mytable" class="display">
        <thead>
            <th>Order</th>
            <th>Brand Name</th>
            <th>Category </th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{$brand->priority}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->category->name}}</td>
                <td>
                    <a href="{{route('brand.edit',$brand->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"> <i class="fas fa-edit"></i></a>
                    {{-- <a onclick="return confirm('Are you sure to delete?')" href="{{route('category.destroy',$category->id)}}" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a> --}}

                    <a onclick="showDelete('{{$brand->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer"> <i class="fas fa-trash-alt mr-1"></i></a>
                    
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('brand.destroy')}}" method="POST">
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