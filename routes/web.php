<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AccommodationReservationController;
use App\Http\Controllers\VacationPackagesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SearchController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use App\Models\AccommodationReservations;
use App\Models\Accommodation;
use App\Models\VacationPackages;
use App\Models\PackageRes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/accommodation', [\App\Http\Controllers\AccommodationController::class, 'index'])->name('accommodation');
Route::get('/reservations', [\App\Http\Controllers\OrderController::class, 'orders']);
Route::get('/reserveationcheck/{id?}', [\App\Http\Controllers\OrderController::class, 'create']);

//Route::redirect('/', 'accommodation');
//Route::resource('accommodation', AccommodationController::class);
//Auth::routes();

Route::redirect('/', 'vacation');
Route::resource('vacation', VacationPackagesController::class);
Auth::routes();
Route::get('/about', [\App\Http\Controllers\AccommodationController::class, 'welcometest'])->name('about');
Route::get('/', [\App\Http\Controllers\AccommodationController::class, 'welcometest'])->name('about');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get ( '/', function () {
//    return view ( 'asearch' );
//} );
Route::any ( '/search', function () {
    $p = Request::get ( 'p' );
    $accommodation = Accommodation::where ( 'accommodation_tags', 'LIKE', '%' . $p . '%' )->get ();
    if (count ( $accommodation ) > 0)
        return view ( 'asearch' )->withDetails ( $accommodation )->withQuery ( $p );
    else
        return view ( 'asearch' )->withMessage ( 'No accommodations found. Try to search again !' );
} );


//Route::get ( '/', function () {
//    return view ( 'psearch' );
//} );
Route::any ( '/search2', function () {
    $q = Request::get ( 'q' );
    $vacation = VacationPackages::where ( 'package_tags', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $vacation ) > 0)
        return view ( 'psearch' )->withPackages ( $vacation )->withQuery ( $q );
    else
        return view ( 'psearch' )->withMessage ( 'No vacation packages found. Try to search again !' );
} );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::any ( '/search4', function () {
    $date = Request::get ('date');
    $vacation = VacationPackages::where ( 'date', 'LIKE', '%' . $date . '%' )->get ();
    if (count ( $vacation ) > 0)
        return view ( 'psearch' )->withPackages ( $vacation )->withQuery ( $date );
    else
        return view ( 'psearch' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::any ( '/search6', function () {
    $vprice = Request::get ('vprice');
    $vacation = VacationPackages::where ( 'package_price', 'LIKE', '%' . $vprice . '%' )->get ();
    if (count ( $vacation ) > 0)
        return view ( 'psearch' )->withPackages ( $vacation )->withQuery ( $vprice );
    else
        return view ( 'psearch' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::any ( '/search1', function () {

    $accommodation_type = Request::get ('accommodation_type');
    $aprice = Request::get ('aprice');
    $s = Request::get ('s');
    $e = Request::get ('e');
    $location = Request::get ('location');

    $accommodation = Accommodation::where('accommodation_type', $accommodation_type)
    ->orwhere('accommodation_price', 'LIKE', '%' . $aprice . '%')
    ->orwhere('start_date', 'LIKE', '%' . $s . '%')
    ->orwhere('end_date', 'LIKE', '%' . $e . '%')
    ->orwhere('accommodation_city', $location)
    ->get();
      if (count ( $accommodation ) > 0)
          return view ( 'asearch' )->withDetails ( $accommodation )->withQuery( $accommodation_type)->withQuery( $aprice)->withQuery( $s)->withQuery( $e)->withQuery( $location);
      else
          return view ( 'asearch' )->withMessage ( 'No Details found. Try to search again !' );
} );


Route::get('accommodation/{id}/show', [AccommodationController::class, 'show']);
Route::get('vacation/{id}/show', [VacationPackagesController::class, 'show']);

//Route::get('/{lang}', function ($lang) {
    //App::setlocale($lang);
  //  return view('about');
//});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

