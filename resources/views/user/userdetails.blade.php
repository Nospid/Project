@extends('layouts.app')
@section('content')
@include('layouts.message')

    <h2 class="font-bold text-4xl text-black-700  my-4">All User </h2> 
    <hr class="h-1 bg-blue-200">

    <div class="my-4 text-right px-10">
        <a href="{{route('user.createadmin')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Admin</a>
    </div>

    <table id="mytable" class="display">
        <thead>
            <th>S.N.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Role</th>
            {{-- <th>Action</th> --}}
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
              
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
               
                <td>{{$user->role}}</td>
               
                {{-- <td>
                    <a onclick="return confirm('Are you sure to delete?')" href="{{ route('users.delete',$user->id) }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a>
                </td> --}}
          
            </tr>
            @endforeach
        </tbody>
    </table>

   

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