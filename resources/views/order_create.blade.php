@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="list-group-item list-group-item-primary"><h4> {{ __('messages.Reservation_info') }}</h4></div>
                    
                        <h3> 
                                <div>   {{ __('messages.City') }} : {{$accommodation->accommodation_city}} </div>
                                <div>   {{ __('messages.From') }} : {{$accommodation->start_date}} </div>
                                <div>   {{ __('messages.To') }} : {{$accommodation->end_date}} </div>
                                
                                {{Form::submit(__('messages.Submit'),['class'=>'btn btn-primary','id' => $accommodation->id])}}
                    {!!Form::close()!!}
                        
                        </h3>
                </div>
                </div>
        </div>
    </div>
                    @endsection