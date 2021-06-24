<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
  public function index(Request $request){
    $accommodation= DB::table('accommodations')->select('accommodation_city')->distinct()->get()->pluck('accommodation')->sort();
    $accommodation= DB::table('accommodations')->select('accommodation_type')->distinct()->get()->pluck('accommodation')->sort();

    return view('accommodations',compact('accommodations'));
  }

}
