@extends('master')
@section('content')
<style>
  .profile-card {
    max-width: 350px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
   
  }
  .profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 10px;
    object-fit: cover;
  }
  .profile-name {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .profile-info {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
    text-align:left;
  }
</style>

  


  <div class="container" style="margin-bottom: 2rem;">
    
      
    <h2 class="text-center">Your Profile</h2>
    <div class="profile-card bg-black" >
      <img class="profile-picture" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture">
      <div class="profile-info text-white">
        <p>Name:{{ auth()->user()->name }}</p>
        <p>Email:{{ auth()->user()->email}} </p>
        <p>Location:{{ auth()->user()->address}}</p>
        <p>Phone:{{ auth()->user()->phone}}</p>
        <a href="{{ route('editprofile',  auth()->user()->id ) }}"  class="btn btn-secondary">Edit Profile</></a>
        <a  class="btn btn-success" style="margin-left:5rem;" href="/myorder">My Orders</a>
      </div>
     
    </div>
     
    
    </div>
  


 @endsection