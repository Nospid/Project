@extends('layouts.app')
@section('content')

@include('layouts.message')

<h2 class="font-bold text-4xl text-blue-700">Add Brand</h2>
<h2 class="h-1 bg-blue-200"></h2>

<form action="{{route('brand.store')}}" class= "mt-5" method="POST">
    @csrf
    <input type="text" placeholder="Brand Name" name="name" class="w-full rounded-lg border-gray-300 my-2" >
    @error('name')
    <p class="text-red-600" text-xs -mt-2>{{$message}}</p>
        
    @enderror

    <select name="category_id" id="" class="w-full rounded-lg border-gray-300 my-2">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>


    <input type="text" placeholder="Proirity" name="priority" class="w-full rounded-lg border-gray-300 my-2" >
    @error('priority')
    <p class="text-red-600" text-xs -mt-2>{{$message}}</p>


        
    @enderror
<div class="felx">

    <input type="submit"  class="bg-blue-600 tetx-white px-4 py-2 mx-2 rounded-lg" value="Add Brand">

    <a href="{{route('brand.index')}}" class="bg-red-600 text-white px-10 py-2 rounded">Exit</a>
</div>

    
</form>
    
@endsection