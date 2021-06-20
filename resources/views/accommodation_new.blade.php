@extends('layouts.app')
@section('content')
<a href="accommodations.blade.php"></a>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<head>
<head>
<title>New city</title>
</head>
<body>
<style>
body {
  font-family: "Roboto", sans-serif;
  background-color: rgb(24, 62, 38);
}
.accommodation_name {
  background-color: rgb(24, 62, 38);
  display: flex;
  flex-direction: column;
  padding: 10px 15% 0px 15%;
}

#accommodation_name {
  color: white;
  font-size: 40px;
  padding: 0px 15% 0px 15%;
  margin-top: 0px;
  margin-bottom: 0px;
}

* {
  box-sizing: border-box;
}

.column1 {
  float: left;
  width: 50%;
  padding: 10px;
  
}
.column2 {
  float: left;
  width: 50%;
  padding: 10px;
  
}



#image {
  margin-top: 10%;
  margin-left: 10%;
  margin-right: 10%;
  min-width: 100px;
  max-width: 1200px;
  width: 75%;
  height: auto;
}

#description {
  margin-left: 5%;
  margin-right: 10%;
  color: black;
  font-size: 20px;
  text-align: justify;
  margin-top: 20px;
  margin-bottom: 20px;
}
#h2 {
  margin-top: 20px;
}

#tags {
  margin-left: 10%;
  
  color: black;
  font-size: 20px;
  text-align: justify;
  margin-top: 20px;
  margin-bottom: 20px;
}

.row {
  height: 100%;
}
</style>

<form method="POST" action="{{action([App\Http\Controllers\AccommodationController::class, 'show'],$accommodations->id ) }}">

<br>
<h3 id="accommodation_name">{{ $accommodations->accommodation_name }}</h3>
<br><br>
<div class="row" style="background-color:white;">
  <div class="column1" style="background-color:#f2f0f8;">
    <img id="image" src="{{ $accommodations->image }}" alt="accommodation_image">
    <p id="tags">{{ $accommodations->accommodation_tags }}</p>
  </div>
  <div class="column2" style="background-color:#f2f0f8;">
    <h2 id="h2">Description</h2>
    <p id="description">{{$accommodations->accommodation_description}}</p>
    <h2>Adrese</h2>
    <p id="description">{{$accommodations->accommodation_city}}, 
    {{$accommodations->accommodation_address}}</p>
    <h2>Type</h2>
    <p id="description">{{ $accommodations->accommodation_type }}</p>
    <h2>Price</h2>
    <p id="description">{{ $accommodations->accommodation_price }} EUR</p>
  </div>
</div>
@csrf 
</form>
</body>
@endsection
