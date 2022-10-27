<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="icon" href="{{asset('images/favicon.webp')}}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset("bootstrap-5.0.2-dist/css/bootstrap.css") }}"">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">
    <link rel="stylesheet" href="{{ asset("font-awesome/css/font-awesome.css") }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard')}}">Personal Information</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route("skills.all") }}">Skills</a>
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
        <li class="nav-item">
          <a class="nav-link" href="{{ route('projects.all') }}">Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" target="_blank" href="{{ route('home') }}"><i class="fa fa-eye" aria-hidden="true">View CV</i></a>
        </li>
      </ul>
      
    </div>
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
