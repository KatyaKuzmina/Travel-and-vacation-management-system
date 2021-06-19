<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AccommodationReservationController;
use App\Http\Controllers\VacationPackagesController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use App\Models\AccommodationReservation;
use App\Models\Accommodation;
use App\Models\VacationPackages;

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

//Route::redirect('/', 'accommodation');
//Route::resource('accommodation', AccommodationController::class);
//Auth::routes();

Route::redirect('/', 'vacation');
Route::resource('vacation', VacationPackagesController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get ( '/', function () {
//    return view ( 'asearch' );
//} );
Route::any ( '/search', function () {
    $q = Request::get ( 'q' );
    $accommodation = Accommodation::where ( 'accommodation_tags', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $accommodation ) > 0)
        return view ( 'asearch' )->withDetails ( $accommodation )->withQuery ( $q );
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

//Route::any('/search3',function(){
  //  $start_date = Request::get ( 'start_date' );
  //  $accommodations = AccommodationReservation:: where( 'start_date', 'LIKE', '%' . $start_date . '%' )->get();
  //  if(count($accommodation) > 0)
  //      return view('sdatesearch')->withDetails($accommodation)->withQuery ( $start_date );
  //  else return view ('sdatesearch')->withMessage('No Details found. Try to search again !');
//});
