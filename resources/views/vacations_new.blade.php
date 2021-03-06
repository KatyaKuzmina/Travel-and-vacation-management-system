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
.package_name {
  background-color: rgb(24, 62, 38);
  display: flex;
  flex-direction: column;
  padding: 10px 15% 0px 15%;
}
#package_name {
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
.star {
  position: relative;
  
  display: inline-block;
  width: 0;
  height: 0;
  
  margin-left: .9em;
  margin-right: .9em;
  margin-bottom: 0.55em;
  
  border-right:  .3em solid transparent;
  border-bottom: .7em  solid #FC0;
  border-left:   .3em solid transparent;
  /* Controlls the size of the stars. */
  font-size: 24px;
}
  .star:before{
    content: '';
    
    display: block;
    width: 0;
    height: 0;
    
    position: absolute;
    top: .6em;
    left: -1em;
  
    border-right:  1em solid transparent;
    border-bottom: .7em  solid #FC0;
    border-left:   1em solid transparent;
  
    transform: rotate(-35deg);
  }
  .star:after {
  content: '';
    
    display: block;
    width: 0;
    height: 0;
    
    position: absolute;
    top: .6em;
    left: -1em;
  
    border-right:  1em solid transparent;
    border-bottom: .7em  solid #FC0;
    border-left:   1em solid transparent;
  
    transform: rotate(-35deg);
  }
  .star:after {  
    transform: rotate(35deg);
  }
  #desc1{
background-color: none; /* Green */
  border-style: solid;
  color: black;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 10px 0px 10px 0px;
  border-radius: 20px;
}
</style>

<form method="POST" action="{{action([App\Http\Controllers\VacationPackagesController::class, 'show'],$vacations->id ) }}">

<br>
<h3 id="package_name">{{ $vacations->package_name }}</h3>
<br><br>
<div class="row" style="background-color:white;">
  <div class="column1" style="background-color:#f2f0f8;">
    <img id="image" src="{{ $vacations->image }}" alt="image">
    <p id="tags">{{ $vacations->package_tags }}</p>
  </div>
  <div class="column2" style="background-color:#f2f0f8;">
    <h2 id="h2">{{ __('messages.Description')}}</h2>
    <p id="description">{{$vacations->package_description}}</p>
    <h2 id="h2">{{ __('messages.Adrese')}}</h2>
    <p id="description">{{$vacations->package_city}},
    {{$vacations->package_address}}</p>
    <h2 id="h2">{{ __('messages.Type')}}</h2>
    <p id="description">{{ $vacations->package_type }}</p>
    <h2 id="h2">{{ __('messages.Price')}}</h2>
    <p id="description">{{ $vacations->package_price }} EUR</p>
    <h2 id="h2">{{ __('messages.Rating')}}</h2>
    <?php
    $link = mysqli_connect("127.0.0.1", "admin", "0000");
      $link->set_charset("utf8mb4");
      mysqli_select_db($link, "database");
      $loop = mysqli_query($link, "SELECT * FROM package_feedback") or die (mysqli_error($link));
      $rating = 0;
      $numb = 0;
      $people = 0;
      while ($row = mysqli_fetch_array($loop)) {
        if ($row['package_id']==$vacations->id){
          $numb = $row['rate'];
          $rating = $rating + $numb;
          $people = $people +1;
        }
      }
      if ($people != 0){
      $rating = $rating/$people;
      $rating=(round($rating, 1));
      }
      else{
        $rating = 0;
        $people = 0;
      }
    ?>
      <i class="star"></i>
    <p id="desc1"><b>{{ $rating }} ({{ __('messages.People_voted' )}}:  {{ $people }}) </b></p>
  </div>
</div>
<h2 id="review">{{ __('messages.Reviews')}}</h2>
<div style="background-color:#f2f0f8;">
  <div class="feedback" style="background-color:#f2f0f8;">
    <?php
//---------------------------Feedback-------------------------------------------------
      $link = mysqli_connect("127.0.0.1", "admin", "0000");
      $link->set_charset("utf8mb4");
      mysqli_select_db($link, "database");
      $loop = mysqli_query($link, "SELECT * FROM package_feedback") or die (mysqli_error($link));
      while ($row = mysqli_fetch_array($loop)) {
        if ($row['package_id']==$vacations->id){
          $loops = mysqli_query($link, "SELECT * FROM users") or die (mysqli_error($link));
          while ($rows = mysqli_fetch_array($loops)) {
            if ($row['user_id']==$rows['id']) {
              if($row['feedback_description'] != Null){
                echo "<u>". '<span style="font-size: 20px;">'. $rows['name']. '</span>'. "</u>". "<br/>";
                echo "<br/>";
                echo $row['feedback_description'] . "<br/>";
                echo "<br/>";
              }
            }
          }
        }
      }
      //printf("Current character set: %s\n", $link->character_set_name());
      $userid = Auth::id();

//--------------------------------------Comments----------------------------------------    
      $link = mysqli_connect("127.0.0.1", "admin", "0000");
      $link->set_charset("utf8mb4");
      mysqli_select_db($link, "database");
      $loop = mysqli_query($link, "SELECT * FROM vaccomments") or die (mysqli_error($link));
      while ($row = mysqli_fetch_array($loop)) {
        if ($row['user_id']==$userid){
          $loops = mysqli_query($link, "SELECT * FROM users") or die (mysqli_error($link));
          while ($rows = mysqli_fetch_array($loops)) {
            if ($row['user_id']==$rows['id']) {
              if($row['package_id'] == $vacations->id){
                echo "<u>". '<span style="font-size: 20px;">'. $rows['name']. '</span>'. "</u>". "<br/>";
                echo "<br/>";
                echo $row['comment'] . "<br/>";
                echo "<br/>";
               }
            }
          }
        }
      }
    
      //printf("Current character set: %s\n", $link->character_set_name());
     $userid = Auth::id();
    ?>
  <br>
  <?php
  if (Auth::check()){
    ?>
  <form action = "/comment" method = "post">
   <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <input type = "hidden" name = "user_id" value = "{{ $userid }}">
    <input type = "hidden" name = "package_id" value = "{{ $vacations->id }}">
  <table class="table">
      <tr>
        <td><span> {{ __('messages.Comment' )}} </span> <input type='textarea' name='comment' /></td>
      </tr>
      <td colspan = '2'>
        <input class="btn btn-success" type="submit" value="{{ __('messages.Submit' )}}" onClick='location.href="vacation/{id}/show"'>
      </td>
    </tr>
  </table>
  </form>
  @if (count($errors) > 0)
  <div>
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  </div>
  @endif
  <?php
  }
  ?>
 
</div>

</body>
@endsection
