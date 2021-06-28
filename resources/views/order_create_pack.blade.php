@extends('layouts.app')
@section('content')
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
            <div class="col-sm">
                <div class="card">
                    <div class="list-group-item list-group-item-primary"><h4> {{ __('messages.Reservation_info') }}</h4></div>
                    
                        <h3> 
                                <div>   {{ __('messages.Name') }} : {{$vacation->package_name}} </div>
                                <div>   {{ __('messages.City') }} : {{$vacation->package_city}} </div>
                                <div>   {{ __('messages.From') }} : {{$vacation->date}} </div>
                                <div>   {{ __('messages.Address') }} : {{$vacation->package_address}} </div>
                </div>
                </div>
<div class="col-sm-8">
             
             <div class="card">
                 <div class="list-group-item list-group-item-primary"><h4>{{ __('messages.Order_placing') }}</h4></div>
                 <div class="list-group-item"class="dates" >
                     {!! Form::open(array('action'=>'OrderPackController@store')) !!}   
        
                    <div class="form-group">
                        {{Form::label('name',__('messages.Name'))}}
                        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
                        @if ($errors->has('name'))
                        <span >
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif 
                        
                    </div>
                    <div class="form-group">
                        {{Form::label('surname',__('messages.Surname'))}}
                        {{Form::text('surname','',['class'=>'form-control','placeholder'=>__('messages.Surname')])}}
                        @if ($errors->has('surname'))
                        <span >
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                        @endif
                    </div>
                     <div class="form-group">
                        {{Form::label('perskods',__('messages.Person_code'))}}
                        {{Form::text('perskods','',['class'=>'form-control','placeholder'=>__('messages.Person_code')])}}
                        @if ($errors->has('perskods'))
                        <span >
                            <strong>{{ $errors->first('perskods') }}</strong>
                        </span>
                        @endif 
                    </div>
                 </div>
                 <input type="hidden" name="veids" value="{{$vacation->id}}" />
                 
                 
                 {{Form::submit(__('messages.Submit'),['class'=>'btn btn-primary'])}}
                 {!!Form::close()!!}
                 
             </div>
</div>
    </div>
</body>
                    @endsection

