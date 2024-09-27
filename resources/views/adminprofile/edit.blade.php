@extends('layouts.app');
@section('content')
@include('layouts.message');
  <div class="container">
    
    <form action="{{ route('userprofile.update') }}" method="POST">
      @csrf  
    
      <div class="profile-card" style="width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <img class="profile-picture" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture" style="display: block; margin: 0 auto 20px; width: 150px; height: 150px; border-radius: 50%;">
      
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ auth()->user()->name }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
         
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
      
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="address" style="display: block; font-weight: bold; margin-bottom: 5px;">Address</label>
          <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" id="address" value="{{ auth()->user()->address }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
          @error('address')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror

        </div>
      
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
          <input type="email" class="form-control @error('address') is-invalid @enderror" name="email" id="email" value="{{ auth()->user()->email }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
      
        <div class="form-group" style="margin-bottom: 15px;">
          <label for="phone" style="display: block; font-weight: bold; margin-bottom: 5px;">Phone</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" name="phone" id="phone" value="{{ auth()->user()->phone }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
          @error('phone')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
        </div>
        <button type="submit" class="btn btn-primary" style="display: block; width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Update Profile</button>
      </div>
    </form>
    </div>
  
  

 @endsection