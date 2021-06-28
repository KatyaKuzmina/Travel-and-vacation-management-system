@extends('layouts.app')
@section('content')
<a href="accommodations.blade.php"></a>
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

.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>


<?php
$userid = Auth::id();
?>

<div class="gallery">
  <div class="zoom">
    
    <?php
        $link = mysqli_connect("127.0.0.1", "admin", "0000");
        $link->set_charset("utf8mb4");
        mysqli_select_db($link, "database");
        $loop = mysqli_query($link, "SELECT * FROM fav_accommodations") or die (mysqli_error($link));
        while ($row = mysqli_fetch_array($loop)) {
            if ($row['user_id']==$userid) {
                $loops = mysqli_query($link, "SELECT * FROM accommodations") or die (mysqli_error($link));
                while ($rows = mysqli_fetch_array($loops)) {
                    if ($row['accommodation_id']==$rows['id']) {
    ?>
            <figure>
                <figcaption><b>
                <?php
                    echo $rows['accommodation_name'];
                    $image = $rows['image'];
                    $view = $row['accommodation_id'];
                ?>
                </b></figcaption>
                <img id="image" src={{$image}} alt="accommodation_image">
                <figcaption>
                <?php
                echo $rows['accommodation_price'];
                ?><p>EUR</p></figcaption>
                <center><button id="view" class="button" onclick="showAccommodations({{ $view }})"><span>{{ __('messages.View')}}</span></button></center>
                <center><button id="view" class="button" onclick="AccDelete({{ $view }})"><span>{{ __('messages.Delete')}}</span></button></center>
            </figure>
    <?php
                            }
                }
            }
    }
        
    ?>
    
    </div>
</div>
<td>
</td>
<script>
    function showAccommodations(accommodationID) {
        window.location.href="/accommodation/"+accommodationID+"/show";
    }
</script>
<script>
    function AccDelete(accommodationID) {
        window.location.href="/accommodation/"+accommodationID+"/delete";
    }
</script>


        <div class="gallery">
  <div class="zoom">
    
    <?php
        $link = mysqli_connect("127.0.0.1", "admin", "0000");
        $link->set_charset("utf8mb4");
        mysqli_select_db($link, "database");
        $loop = mysqli_query($link, "SELECT * FROM fav_packages") or die (mysqli_error($link));
        while ($row = mysqli_fetch_array($loop)) {
            if ($row['user_id']==$userid) {
                $loops = mysqli_query($link, "SELECT * FROM vacation_packages") or die (mysqli_error($link));
                while ($rows = mysqli_fetch_array($loops)) {
                    if ($row['package_id']==$rows['id']) {
    ?>
            <figure>
                <figcaption><b>
                <?php
                    echo $rows['package_name'];
                    $image = $rows['image'];
                    $view = $row['package_id'];
                ?>
                </b></figcaption>
                <img id="image" src={{$image}} alt="package_image">
                <figcaption>
                <?php
                echo $rows['package_price'];
                ?><p>EUR</p></figcaption>
                <center><button id="view" class="button" onclick="showVacations({{ $view }})"><span>{{ __('messages.View')}}</span></button></center>
                <center><button id="view" class="button" onclick="Delete({{ $view }})"><span>{{ __('messages.Delete')}}</span></button></center>
                
            </figure>
    <?php
                            }
                }
            }
    }
        
    ?>
    
    </div>
</div>
<td>
</td>
<script>
    function showVacations(vacationID) {
        window.location.href="/vacation/"+vacationID+"/show";
    }
</script>
<script>
    function Delete(vacationID) {
        window.location.href="/vacation/"+vacationID+"/delete";
    }
</script>

</body>
@endsection
