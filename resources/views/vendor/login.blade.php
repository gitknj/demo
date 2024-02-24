



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Vendor::SignIn</title>

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
    
<main class="form-signin">
      @isset($registrationsuccess)
      <script>
          alert('You have been registered successfullly. Login with your registerd email and password');
      </script>
      
    @endisset   
  <form method="post" name="vendorloginform" id="vendorloginform" action='{{url('vendor/login')}}'>
    @csrf
    <img class="mb-4" src="{{ url('vendor/assets/brand/bootstrap-logo.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>
    <div class="form-floating mb-3">
      <span class="text-primary " >New Vendor? <a href="{{ route('vendor.register')}}">Register Here</a></span>
      
    </div> 
    @if(Session::has('error_message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Error: {{ Session::get('error_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" >
      <label for="floatingInput">Email address</label>
    </div>
    @error('email')
    <div class="form-floating">
    <span class="alert-danger">
        {{ $message }}
    </span>
    </div>
    @enderror
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
      <label for="floatingPassword">Password</label>
    </div>
    @error('password')
    <div class="form-floating">
    <span class="alert-danger">
        {{ $message }}
    </span>
    </div>
    @enderror
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2024</p>
  </form>
</main>


    
  </body>
</html>
