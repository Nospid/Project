@extends('layouts.app');
@section('content')
@include('layouts.message');
  <div class="container">
    
      
    <h2 class="text-center">Your Profile</h2>
    <div class="profile-card" style="width: 310px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
      <img class="profile-picture" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture" style="display: block; margin: 0 auto 20px; width: 150px; height: 150px; border-radius: 50%;">
    
      <div class="profile-info">
        <p style="margin-bottom: 10px; font-weight: bold;">Name: {{ auth()->user()->name }}</p>
        <p style="margin-bottom: 10px;">Email: {{ auth()->user()->email }}</p>
        <p style="margin-bottom: 10px;">Location: {{ auth()->user()->address }}</p>
        <p style="margin-bottom: 10px;">Phone: {{ auth()->user()->phone }}</p>
        <a href="{{ route('adminprofile.edit', auth()->user()->id) }}" class="btn btn-primary" style="display: block; width: 100%; padding: 10px; text-align: center; text-decoration: none; color: #fff; background-color: #007bff; border: none; border-radius: 4px;">Edit Profile</a>
      </div>
    </div>
    
     
    
    </div>
  


 @endsection