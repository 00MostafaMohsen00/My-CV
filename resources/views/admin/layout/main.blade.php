<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset("bootstrap-5.0.2-dist/css/bootstrap.css") }}"">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">
    <link rel="stylesheet" href="{{ asset("font-awesome/css/font-awesome.css") }}">
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('dashboard')}}">Personal Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route("skills.all") }}">Skills</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts.all') }}">Contact Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("languages.all") }}">Languages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('get.summary') }}">Summary</a>
        </li>
      </ul>
      
    </div>
  </nav>
  <div class="container">
      @yield("content")
  </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src={{  asset("bootstrap-5.0.2-dist/js/bootstrap.bundle.js")}}></script>
    @yield("scripts")
</body>
</html>