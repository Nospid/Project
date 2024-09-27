@extends('master')
@section('content')


<!-- Font Awesome -->




 

<div class="container">
  <div class="row">
    <div class="col-md-3 mx-auto">
      <div class="card bg-gray-200 shadow-lg rounded-lg my-5">
        <h2 class="card-header text-4xl font-bold text-center my-4">Login</h2>
        <div class="card-body">
          <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email"> <i class="fas fa-envelope"></i>Email</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email"  required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
            </div>
            <div class="form-group">
              <label for="password"> <i class="fas fa-envelope"></i>Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required> 
            </div>
            <div class="form-group">
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <span class="text-danger d-block">{{ $error }}</span>
                  @endforeach
              @endif
          </div>
            <div class="form-group">
              <input type="submit" value="Login" class="btn btn-primary w-20 d-block mx-auto my-4">
            </div>
            <div class="text-center mt-3">
              <p>If you don't have an account?</p>
              <a href="{{ route('user.register') }}" class="bg-dark px-2 py-2 text-white rounded-lg">Register Here</a>
              <a href="{{ route('password.request') }}">Forget Password?</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  

@endsection