@extends('layouts.app')
@section('content')
@include('layouts.message')
    <h2 class="font-bold text-4xl mx-3   text-black-700">Edit Category</h2> 
    <hr class="h-1 bg-blue-200">

    <form action="{{route('category.update',$category->id)}}" method="POST" class="mt-5">
        @csrf
        <div>
        <input type="text" placeholder="Category Name" name="name" class="w-96 mx-4 rounded-lg border-gray-300 my-2" value="{{$category->name}}">
        @error('name')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
        </div>
        <div>
        <input type="text" placeholder="Priority" name="priority" class="w-96 mx-4 rounded-lg border-gray-300 my-2" value="{{$category->priority}}">
        @error('priority')
            <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
        @enderror
    </div>
        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-2 py-2 mx-4 rounded-lg" value="Update Category">

            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
        </div>
    </form>

@endsection