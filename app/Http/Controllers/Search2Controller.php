<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
  public function index(Request $request){
    $vacation= DB::table('vacation_packages')->select('package_city')->distinct()->get()->pluck('vacation')->sort();
    $vacation= DB::table('vacation_packages')->select('package_type')->distinct()->get()->pluck('vacation')->sort();

    return view('vacations',compact('vacations');
  }

}
