@extends('layouts.app')
@section('content')
@include('message')


<style>
    .profile-card {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: left;
        color: black;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 10px;
        object-fit: cover;
    }
    .profile-name {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .profile-info {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
    }
</style>


<div class="container mb-4">

    <form action="{{ route('userprofile.update') }}" method="post">
        @csrf
        <div class="profile-card bg-dark p-4">
            <img class="profile-picture"
                src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                alt="Profile Picture">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ auth()->user()->name }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                    value="{{ auth()->user()->address }}" required>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ auth()->user()->email }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ auth()->user()->phone }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <a href="/myprofile" class="btn btn-dark mt-3">Go Back</a>
            <button type="submit" class="btn btn-warning mt-3">Update Profile</button>
        
            </div>
        </div>
    </form>
</div>

@endsection
