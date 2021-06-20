<!DOCTYPE html>
<html>
<head>
<title>New city</title>
</head>
<body>



<form method="POST" action="{{action([App\Http\Controllers\AccommodationController::class, 'show'],$accommodations->id ) }}">



We will add a city for <b>{{ $accommodation->id }}</b>:
<div class="gallery">
  <div class="zoom">
    <figure>
    <figcaption>{{ $accommodation->id}}</figcaption>
    <img src="{{ $accommodation->image }}" alt="accommodation_image" style="width:180px" style="height:90px">
    <figcaption>{{ $accommodation->accommodation_price }}<p>EUR</p></figcaption>
    </div>
</div>




@csrf 
</form>
</body>
</html>