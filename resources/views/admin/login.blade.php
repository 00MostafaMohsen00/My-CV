<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{asset('images/favicon.webp')}}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset("bootstrap-5.0.2-dist/css/bootstrap.css") }}"">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">
</head>
<body>
  @if($errors->any())
  @foreach ($errors->all() as $error )
    <div class="alert alert-danger" role="alert">
      {{ $error}}
    </div> 
   @endforeach
  @endif 
  @if(Session::has("msg"))
  <div class="alert alert-danger" role="alert">
    {{ Session::get("msg")}}
  </div>
  @endif
      <div class="parent">
        <div class="container container-fluid">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0" style="background-color:  #eee ;">
                  <div class="col-6 col-md-6 col-sm-12 col-xs-2 col-lg-6" >
                    <img src="{{ asset("images/logo.jpg") }}" class="img-fluid" style="height: 100%;" alt="...">
                  </div>
                  <div class="col-6 col-md-12 col-sm-10 col-xs-2 col-lg-6">
                    <div class="card-body">
                        <p class="card-title h1">Login</p><hr>
                        <form method="POST" action="{{ route("admin.save.login") }}">
                          @csrf
                          <label for="email" class="form-label"><i class="bi bi-person-fill"></i></label>
                          <input type="email" name="email" class="form-controller" placeholder="eg.john"><br>                          
                          <label for="password" class="form-label"><i class="bi bi-lock-fill"></i></label>
                          <input type="password" name="password" class="form-controller" placeholder="*****"><br>
                          <button type="submit" class="btn btn-dark px-5" style="margin-left: 80px;"><i class="bi bi-key-fill"></i></button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <script src={{  asset("bootstrap-5.0.2-dist/js/bootstrap.bundle.js")}}></script>
</body>
</html>