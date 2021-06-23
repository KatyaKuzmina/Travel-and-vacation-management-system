@extends('layouts.app')
@section('content')
<a href="accommodations.blade.php"></a>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<head>
<head>
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
  font-size: 35px;
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

.column12 {
  height: 100%;
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
  font-size: 15px;
  text-align: justify;
  margin-top: 20px;
  margin-bottom: 20px;
}

#h2 {
  margin-top: 20px;
  font-size: 25px;
}

#review {
  margin-top: 20px;
  margin-bottom: 20px;
  color: white;
  margin-left: 5%;
  margin-right: 5%;
  font-size: 25px;
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

.feedback {
  margin-left: 10%;
  margin-right: 10%;
  padding: 20px 0% 0% 0%;
  text-align: justify;
}
</style>

<form method="POST" action="{{action([App\Http\Controllers\AccommodationController::class, 'show'],$accommodations->id ) }}">

<br>
<div>
  <h3 id="accommodation_name">{{ $accommodations->accommodation_name }}</h3>
</div>
<br><br>
<div class="column12" style="background-color:#f2f0f8;">
<br><br>
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
<h2 id="review">Reviews</h2> 
<div style="background-color:#f2f0f8;">
  <div class="feedback" style="background-color:#f2f0f8;">
    <?php
      $link = mysqli_connect("127.0.0.1", "admin", "0000");
      $link->set_charset("utf8mb4");
      mysqli_select_db($link, "database");
      $loop = mysqli_query($link, "SELECT * FROM accommodation_feedback") or die (mysqli_error($link));
      while ($row = mysqli_fetch_array($loop)) {
        if ($row['accommodation_id']==$accommodation_feedback->accommodation_id){
          $loops = mysqli_query($link, "SELECT * FROM users") or die (mysqli_error($link));
          while ($rows = mysqli_fetch_array($loops)) {
            if ($row['user_id']==$rows['id']) {
              echo "<u>". '<span style="font-size: 20px;">'. $rows['name']. '</span>'. "</u>". "<br/>";
              echo "<br/>";
              echo $row['feedback_description'] . "<br/>";
              echo "<br/>";
            }
          } 
        }
      }
      //printf("Current character set: %s\n", $link->character_set_name());
    ?>
  </div>
</div>
</form>
</body>
@endsection
