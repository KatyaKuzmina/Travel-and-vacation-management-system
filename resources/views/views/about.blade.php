@extends('layouts.app')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.card {
    text-align:center;
  margin: 0;
  margin-bottom: 15px;
  border: 1px solid #777;
  padding: 8px;
  box-sizing: border-box;
  border-radius: 15px;
  border-color:rgba(70, 91, 227, 0.4);
  background: rgb(57, 187, 255, 0.2);
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

.hesitate{
  font-size: 18px;
}
</style>

@section('content')
<body>
<div class="container">
    <div class="row">
        <img src="{{  url('https://media.istockphoto.com/photos/woman-traveling-in-riga-picture-id628665152?k=6&m=628665152&s=612x612&w=0&h=CIebrox-eErCh4aZhuwuP_DAWfGUm8wKdHJ8a0I5WEI=') }}" class='center' width="300px" height="380px" alt="foto" >
    </div>
    <br>
        <div class="row">
                    <div class="col-sm">
                        <div class="card">
                              <h1 class="list-group-item list-group-item-primary">{{ __('messages.Want_to_travel_around_the_Latvia')}}? {{ __('messages.We_will_help_you')}}.</h1>
                               <div class="card-body">
                                   <form>
                                    <input class="button" type="button" value="{{ __('messages.Accommodation')}}" onClick='location.href="/accommodation"'>
                                    <input class="button" type="button" value="{{ __('messages.Vacations')}}" onClick='location.href="vacation"'>
                                    </form>
                                   <p class="hesitate"><b>{{ __('messages.Do_not_hesitate_to_call_or_e-mail_us')}}!</b><br>
                                   </p>
                                   <br>
                                   <div class="details">
                                   <p><b>{{ __('messages.Address')}}: </b> {{ __('messages.Brīvības_iela')}} 62, {{ __('messages.Vidzemes_priekšpilsēta')}}, {{ __('messages.Rīga')}}, LV-1012 </p><br>
                                   <p><b>{{ __('messages.Email')}}:</b> musuprojekts@gmail.com</p><br>
                                   <p><b>{{ __('messages.Telefons')}}:</b> +371 20129697</p>
                                 </div>
                                </div>
                        </div>
                    </div>

                    </div>
                </div>

</div>
</body>
@endsection
