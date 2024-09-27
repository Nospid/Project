@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-3xl text-black-700 my-3">Add Category</h2> 
    <hr class="h-1 bg-blue-200">

    <form action="{{route('category.store')}}" method="POST" class="mt-5">
        @csrf
        <div>
        <input type="text" placeholder="Category Name" name="name" class="w-96 rounded-lg border-black-900 my-2 mx-4" value="{{old('name')}}">
        @error('name')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
        </div>
        <div>
        <input type="text" placeholder="Priority" name="priority" class="w-96 mx-4 rounded-lg border-black-300 my-2" value="{{old('priority')}}">
        @error('priority')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
        </div>

        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-4 my-2 rounded-lg" value="Add Category">

            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2  my-2 rounded-lg">Exit</a>
        </div>
    </form>

@endsection