@extends('layouts.app')
@include('message')
@section('content')

<div class="">
  <h2 class="text-center text-3xl font-bold">Your Profile</h2>
  <div class="profile-card bg-black max-w-sm mx-auto p-8 border border-gray-300 rounded-lg flex flex-col items-center">
    <img class="profile-picture w-40 h-40 rounded-full object-cover mb-4" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture">
    <div class="profile-info text-white text-left">
      <p class="text-xl font-bold">{{ auth()->user()->name }}</p>
      <p>Email: {{ auth()->user()->email }}</p>
      <p>Location: {{ auth()->user()->address }}</p>
      <p>Phone: {{ auth()->user()->phone }}</p>
      <a href="{{route('adminprofile.edit',auth()->user()->id)}}" class= "my-8 px-2 py-1 bg-amber-600 text-white rounded-lg">Edit Profile</a>
    </div>
  </div>
</div>

@endsection
