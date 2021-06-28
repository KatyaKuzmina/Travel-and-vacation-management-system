@extends('layouts.app')
@section('content')
<a href="vacations.blade.php"></a>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="lv">
<head>
    <meta charset="utf-8">
<style>
body{
  background-color: #fff;
                  color: #636b6f;
                  font-family: 'Nunito', sans-serif;
                  font-weight: 200;
                  height: 100vh;
                  margin: 0;
                  box-sizing: border-box;

}
.gallery{
  display: flex;
  width: 900px;
  margin: auto;
  justify-content: space-between;
  flex-wrap: wrap;
}
figure{
  width: 200px;
  margin: 0;
  margin-bottom: 15px;
  border: 1px solid #777;
  padding: 8px;
  box-sizing: border-box;
  border-radius: 15px;
  border-color:rgba(70, 91, 227, 0.4);
  background: rgb(57, 187, 255, 0.2);
}
figure img{
  width: 100%;
}
figure figcaption{
  text-align: center;
  padding: 8px 4px;
}
#search {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}

.button {
  border-radius: 4px;
  background-color: red;
  border: none;
  color: white;
  text-align: center;
  width: 50%;
  font-size: 15px;
  padding: 10px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.2s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -10px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 15px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.zoom {
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -webkit-transform: scale(1.01); /* Safari 3-8 */
  transform: scale(1.01);
}
.filter{

  padding-top: 25px;
}

.table{
  border-style: solid;
  border-color: black;
  background-color: #E0FFFF;
}
.sb{
    border-radius: 4px;
    background-color: red;
    border: none;
    color: white;
    text-align: center;
    width: 10%;
    font-size: 15px;
    padding: 10px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 2px;
}
.sb:hover {background-color: #3e8e41}

.sb:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.filter{
  font-size: 16px;
}
.tags{
margin-left: 21%;
padding-top: 30px;

}
#input{
  padding-right: 410px;
}
#searchfor{
  font-size:18px;
}
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <img src="{{  url('https://caaneo.ca/static/014ffa5eede1abe6478b9e1d111daff8/b1a36/f0d045d1-d77c-448b-8042-cee808ac0525_adobestock_158208243-min.jpg') }}" width="100%" height="300px" alt="foto" >
        <div class="tags">
                <form action="/search2" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                      <label><b>{{ __('messages.Search_by_tags')}}: </b></label>
                        <input id="input" type="text" name="q" placeholder="#brieftaking">
                        <button style="background-color: red; color:white">Go!</button>
                      </div>
                    </div>
                </form>
        </div>
        <div class="filter">
        <table class="table">
          <th style = "text-transform:uppercase;"><center>{{ __('messages.Filter_box')}}</center></th>
            <form action="/search3" method="POST" role="search">
               {{ csrf_field() }}
            <tr><td> {{ __('messages.Location')}}:
                 <div class="row">
                   <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                      <div class="form-group">
                         <select class="selectpicker search-fields" name="vlocation">
                        <option value=""></option>
                       <option value="Salaspils"> Salaspils </option>
                       <option value="Rīga"> Rīga</option>
                       <option value="Jelgava"> Jelgava </option>
                       <option value="Krimuldas novads"> Krimuldas novads </option>
                       <option value="Engures novads"> Engures novads </option>
                       <option value="Tukums"> Tukums </option>
                    </select>
                 </div>
              </div>
            </td></tr>
            <div class="input-group">
            <tr><td>{{ __('messages.Date')}}: <input type="date" name="date"></button></td></tr>
            <span class="input-group-btn"></span>
              </div>
        <div class="input-group">
          <tr><td>{{ __('messages.Price')}}:<input type="text" placeholder="30" name="vprice"></td></tr>
          <span class="input-group-btn">
              </span>
            </div>
          <div class="input-group">
          <tr><td>{{ __('messages.Package_type')}}:
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
               <div class="form-group">
                  <select class="selectpicker search-fields" name="package_type">
                    <option value=""></option>
                     <option value="Extreme"> Extreme </option>
                     <option value="Sport and Activities"> Sport and Activities </option>
                     <option value="Relax and selfcare"> Relax and selfcare </option>
                  </select>
               </div>
            </div>
          </tr></td>
          <div class="row p-3">
             <div class="col-lg-12 col-md-12 col-sm-6 col-12">
                <div class="form-group">
                   <td><center><button class="sb" class="search-button">{{ __('messages.Search')}}</button></div></center>
                </div>
             </div>
          </div>
       </form>
     </table>
   </div>
        @if (count($vacations)==0)
<center><p id="searchfor"> Unfortunately, there are no vacation packages available for now!</p><center>
@else
@foreach ($vacations as $vacation)
<div class="gallery">
  <div class="zoom">
    <figure>
    <figcaption>{{ $vacation->package_name }}</figcaption>
    <img <img src="{{ $vacation->image }}" alt="package_image" style="width:180px" style="height:90px">
    <figcaption>{{ $vacation->package_price }}<p>EUR</p></figcaption>
  <center><button id="view" class="button" onclick="showVacations({{ $vacation->id }})"><span>{{ __('messages.View')}}</span></button></center>
  <?php
  $userid = Auth::id();
  $count = 0;
  $zero = 0;
  if (Auth::check()){
    $link = mysqli_connect("127.0.0.1", "admin", "0000");
    $link->set_charset("utf8mb4");
    mysqli_select_db($link, "database");
    $loop = mysqli_query($link, "SELECT * FROM fav_packages WHERE user_id=$userid") or die (mysqli_error($link));
    while ($row = mysqli_fetch_array($loop)) {
      $r = $row['package_id'];
      $a = $vacation->id;
      $one = 1;
      $zero = 0;
      if ($r == $a){
        $count = $count + $one;
      } 
    }
    if ($count == $zero){
?>
  <center><button id="view" class="button" onclick="newLike({{ $vacation->id }})"><span>{{ __('messages.Like')}}</span></button></center>
  <script>
    function newLike(vacationID) {
    window.location.href="/vacation/"+vacationID+"/like";
    }
  </script>
<?php
    }
    else{    
?>
<?php
    }  
  }
  else { 
?>
  <center><button id="view" class="button" onclick="newLike({{ $vacation->id }})"><span>{{ __('messages.Like')}}</span></button></center>
  <script>
    function newLike(vacationID) {
      window.location.href="/login/";
    }
  </script>
<?php
  }
?>
    </figure>
    </div>
</div>
@endforeach
@endif
<script>
    function showVacations(vacationID) {
        window.location.href="/vacation/"+vacationID+"/show";
    }
</script>
</body>
@endsection
