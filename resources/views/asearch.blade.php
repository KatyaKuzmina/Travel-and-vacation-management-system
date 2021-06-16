@extends('layouts.app')
@section('content')
<a href="accommodations.blade.php"></a>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<head>
<style>
body{
background-color: white;

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

</style>
</head>
<body>
<div class="container">
    <div class="row">
        <img src="{{  url('https://www.hawaii-guide.com/images/made/kauai-accommodations_1_2100_750_85_s_c1_c_c_0_0.jpg') }}" width="100%" height="300px" alt="foto" >
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
              <label for="fname">Search by tags:</label>
                <input type="text" class="form-control" name="q"
                    placeholder="#3guests"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
</div>
</div>
        @if (count($details)==0)
<p color='red'> Unfortunately, there are no accommodations available for now!</p>
@else
@foreach ($details as $accommodation)
<div class="gallery">
  <div class="zoom">
    <figure>
    <figcaption>{{ $accommodation->accommodation_name }}</figcaption>
    <img src="{{ url('https://lh5.googleusercontent.com/p/AF1QipN8LC6vPsv4TSHgYM8cQ6Tfe4PjDeW-afWge9nQ=w600-h485-p-k-no') }}" alt="Dizkokiphoto" style="width:180px" style="height:90px">
    <figcaption>{{ $accommodation->accommodation_price }}<p>EUR</p></figcaption>
    <button id="view" class="button"><span>View</span></button>
    </figure>
    </div>
</div>
<td>
</td>
@endforeach
@endif
</body>
@endsection
