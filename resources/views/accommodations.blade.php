@extends('layouts.app')
@section('content')
<a href="accommodations.blade.php"></a>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
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
  background-color: red;
  border-radius: 50%;
  border-color: grey;
  padding: 15px;
  box-shadow: 0 3px #999;
  text-align: center;
  color: white;
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <img src="{{  url('https://www.hawaii-guide.com/images/made/kauai-accommodations_1_2100_750_85_s_c1_c_c_0_0.jpg') }}" width="100%" height="300px" alt="foto" >
<div class="tags">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
              <label><b>{{ __('messages.Search_by_tags')}}: </b></label>
                <input id="input" type="text" name="p" placeholder="#3guests">
              </div>
            </div>
        </form>
</div>
<div class="filter">
<table class="table">
  <th style = "text-transform:uppercase;"><center>{{ __('messages.Filter_box')}}</center></th>
  <tr><td>
{!! Form::open(['action' => 'SearchController@index', 'method' => 'GET']) !!}
  <div class = "form-group">
    <span>{{ __('messages.Location')}}:</span>
  <select id = "nameid" style="width:200px">
    <option></option>
    @foreach($accommodations as $d)
    <option>{{$d->accommodation_city}}</option>
    @endforeach
</select>
</div>
</td></tr>
  <form action="/search3" method="POST" role="search">
        {{ csrf_field() }}
  <div class="input-group">
  <td>{{ __('messages.Start_Date')}}: <input type="date" name="s"> </td></tr>
  <span class="input-group-btn">
           <button type="submit" class="btn btn-default">
               <span class="glyphicon glyphicon-search"></span>
             </button>
      </span>
    </div>
</form>
<form action="/search5" method="POST" role="search">
      {{ csrf_field() }}
<div class="input-group">
  <tr><td>{{ __('messages.Price')}}:<input type="text" placeholder="30" name="aprice"></td></tr>
  <span class="input-group-btn">
           <button type="submit" class="btn btn-default">
               <span class="glyphicon glyphicon-search"></span>
             </button>
      </span>
    </div>
  </form>
  <tr><td>{{ __('messages.Accommodation_type')}}:
    <select id = "nameid1" style="width:200px">
      <option></option>
      @foreach($accommodations as $t)
      <option>{{$t->accommodation_type}}</option>
      @endforeach
  </select>
</td></tr>
  <td><center><div class="form-group">
    {{ Form::Submit('submit', ['class' => 'btn btn-primary']) }}
</div></center> </td></tr>
  </table>
</div>
        @if (count($accommodations)==0)
<p color='red'> {{ __('messages.Unfortunately')}}!</p>
@else
@foreach ($accommodations as $accommodation)
<div class="gallery">
  <div class="zoom">
    <figure>
    <figcaption><b>{{ $accommodation->accommodation_name }}</b></figcaption>
    <img src="{{ $accommodation->image }}" alt="accommodation_image" style="width:180px" style="height:90px">
    <figcaption>{{ $accommodation->accommodation_price }}<p>EUR</p></figcaption>
    <center><button id="view" class="button" onclick="showAccommodations({{ $accommodation->id }})"><span>{{ __('messages.View')}}</span></button></center>
    </figure>
    </div>
</div>
<td>
</td>
@endforeach
@endif
<script>
    function showAccommodations(accommodationID) {
        window.location.href="/accommodation/"+accommodationID+"/show";
    }
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#nameid").select2({
            placeholder: "Select a City",
            allowClear: true
        });

        $("#nameid1").select2({
              placeholder: "Select a Type",
              allowClear: true
          });
</script>

</body>
@endsection
