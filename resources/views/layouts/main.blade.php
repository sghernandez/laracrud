<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 8 CRUD Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <style>
    .uper {
      margin-top: 40px;
    }
  </style> 
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0)">Laravel 8</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    @if(session()->has('user'))
    <div class="collapse navbar-collapse" id="navbarSupportedContent">          
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">Products</a>
              </li>                        
      </ul>

      <div class="form-inline my-2 my-lg-0">        
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link disabled" href="#">{{ session()->get('user') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signout') }}">Salir</a>
          </li>          
      </ul>   
    </div>   
     @else
 
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">Login</a>
        </li>          
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('register-user') }}">Register</a>
        </li>    
    </ul>   
  
     @endif

    </div>
  </nav>
 
  <div class="container">
    
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif  
   
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>