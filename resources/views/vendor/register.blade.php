



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Vendor::Registration</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="{{ url('vendor/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ url('vendor/assets/dist/css/signin.css')}}" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-register">
   
  <form method="post" name="vendorregisterform" id="vendorregisterform"  onsubmit="return confirm('Verify your details before submission. If correct : Ok ');" action='{{url('vendor/register')}}'>
    @csrf
    <img class="mb-4" src="{{ url('vendor/assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Register</h1>
    <div class="form-floating mb-3">
      <span class="text-primary " >Already Registered? <a href="{{ route('vendor.login')}}">Sign In Here</a></span>
      
    </div> 
    @if(Session::has('error_message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Error: {{ Session::get('error_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <div class="form-floating">
      <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}">
      <label for="name">Your Name</label>
    </div>
    @error('name')
        <div class="form-floating">
        <span class="alert-danger">
            {{ $message }}
        </span>
        </div>
    @enderror
     <div class="form-floating ">
        <input type="email" class="form-control" id="email" name="email" placeholder=""  value="{{old('email')}}">
        <label for="email">Email</label>
      </div>
      @error('email')
        <div class="form-floating">
        <span class="alert-danger">
            {{ $message }}
        </span>
        </div>
     @enderror
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder=""  >
      <label for="password">Password</label>
    </div>
     @error('password')
        <div class="form-floating">
        <span class="alert-danger">
            {{ $message }}
        </span>
        </div>
     @enderror
    <div class="form-floating ">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder=""  >
        <label for="password_confirmation">Re-type Password</label>
      </div>
      @error('password_confirmation')
        <div class="form-floating">
        <span class="alert-danger">
            {{ $message }}
        </span>
        </div>
        @enderror
      <div class="form-floating ">
        <input type="text" class="form-control" id="mobile" name="mobile" placeholder=""  value="{{old('mobile')}}">
        <label for="mobile">Contact No.</label>
      </div>
      @error('mobile')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <textarea name="address" class="form-control" id="address" cols="50" rows="10" placeholder="Address">{{old('address')}}</textarea>
        <label for="address">Address</label>
      </div>
      @error('address')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="city" name="city" placeholder=""  value="{{old('city')}}">
        <label for="city">City Name</label>
      </div>
      @error('city')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="pincode" name="pincode" placeholder=""  value="{{old('pincode')}}">
        <label for="pincode">Pincode</label>
      </div>
      @error('pincode')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="state" name="state" placeholder=""  value="{{old('state')}}">
        <label for="state">State Name</label>
      </div>
      @error('state')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
      <div class="form-floating">
        <input type="text" class="form-control" id="country" name="country" placeholder=""  value="{{old('country')}}">
        <label for="country">Country Name</label>
      </div>
      @error('country')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="1"  name="agreeto" id="agreeto"> I agree to the Terms and Conditions of Ecom
      </label>
    </div>
    @error('agreeto')
      <div class="form-floating">
      <span class="alert-danger">
          {{ $message }}
      </span>
      </div>
      @enderror
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2024</p>
  </form>
</main>


    
  </body>
</html>
