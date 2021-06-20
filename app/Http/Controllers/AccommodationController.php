<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\AccommodationFeedback;


class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $accommodations= Accommodation::all();
        return view('accommodations',compact('accommodations'));


        $user = Auth::user();

        /*Price change*/
        if(!is_null($request->tmp)){
        if($request->tmp==1) $accommodations = $accommodations->sortBy('accommodation_price');
        if($request->tmp==2) $accommodations = $accommodations->sortByDesc('accommodation_price');}
        else $request->tmp=0;

       
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function welcometest() {
        return view ('about');
    }
    
    public function testing() {
        $accommodationtest = Accommodation::all();
        return View::make('accommodations', compact('accommodations'));
    }

}
