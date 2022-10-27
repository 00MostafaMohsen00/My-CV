<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CV</title>
<link rel="icon" href="{{asset('images/favicon.webp')}}" type="image/icon type">
         <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("font-awesome/css/font-awesome.css") }}">

</head>
<body >
<div class="parent">
    <div class="container container-fluid">
        <div class="card mb-3">
            <div class="row g-0 row-one">
                <div class="col-md-4 col-sm-3" >
                   <img class="image" src="{{ $user->image }}"   alt="My picture">
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="card-body content">
                        <h1 class="card-title">{{ $user->name }}</h1><hr>
                        <div class="row g-0">
                            <div class="col-6 col-md-8 col-sm-8 col-lg-6 w-25 personal">
                                <fieldset>
                                    <legend>Personal Information</legend>
                                    <ul>
                                        <li> Nationality : {{ $user->personals->nationality}}</li>
                                        <li> Address : {{ $user->personals->address}}</li>
                                        <li> Date of birth : {{ $user->personals->date_of_birth}}</li>
                                        <li> Education : {{ $user->personals->education}}</li>
                                        <li> Job : {{ $user->personals->job}}</li>
                                        <li> Military Status : {{ $user->personals->Military_service}}</li>
                                    </ul>
                                </fieldset>
                            </div>
                            <div class="col-6 col-md-8 col-sm-8 col-lg-6 w-25 skills">
                                <fieldset>
                                    <legend>Skills</legend>
                                    <ol>
                                        @foreach ($user->skills as $skills )
                                        <li> {{ $skills->name}}</li>
                                        @endforeach
                                    </ol>
                                </fieldset>
                            </div>
                        </div> 
                        <div class="row g-0">
                            <div class="col-6 col-md-4 col-sm-4 col-lg-6 w-25 contact" >
                                <fieldset >
                                    <legend >Contact Information</legend>
                                    <ul>
                                        @foreach ($user->contacts as $contacts )
                                        <li><a href="{{ $contacts->link }}" target="__blank"><i class="{{ $contacts->icon }}"> {{  $contacts->name }}</i></a></li>
                                        @endforeach
                                    </ul>
                                </fieldset>
                            </div>
                            <div class="col-6 col-md-4 col-sm-4 col-lg-6 w-25 languages" >
                                <div class="row g-0">
                                    <div class="col" >
                                        <fieldset>
                                            <legend >Languages</legend>
                                            <ul>
                                                @foreach ($user->languages as $languages )
                                                    <li>{{ $languages->name }} : {{ $languages->description }}</li>
                                                @endforeach
                                            </ul>
                                        </fieldset>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col" >
                                        <fieldset >
                                            <legend >Projects</legend>
                                            <ul>
                                            @foreach ($projects as $project )
                                            <li><a href="{{ $project->url }}" target="__blank"> {{  $project->title }} <br>({{$project->tools}})</a></li>
                                            @endforeach
                                            </ul>
                                        </fieldset>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-12 col-md-6 col-sm-5 col-lg-12 w-25 summary">
                                <fieldset>
                                    <legend>Summary</legend>
                                    <p> {{ $user->summary->title }}</p>
                                </fieldset>
                          </div>
                    </div>
                </div>
            </div>
     
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset("css/main.css") }}">
</body>
</html>
