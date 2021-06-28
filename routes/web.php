<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/vacation', [\App\Http\Controllers\VacationPackagesController::class, 'index']);
Route::post('/show', [\App\Http\Controllers\OrderController::class, 'store']);
Route::post('/showpack', [\App\Http\Controllers\OrderPackController::class , 'store']);
//Route::redirect('/', 'accommodation');
//Route::resource('accommodation', AccommodationController::class);
//Auth::routes();

//Route::redirect('/', 'vacation');
//Route::resource('vacation', VacationPackagesController::class);
Auth::routes();
Route::get('/about', [\App\Http\Controllers\AccommodationController::class, 'welcometest'])->name('about');
Route::get('/', [\App\Http\Controllers\AccommodationController::class, 'welcometest'])->name('about');
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


Route::any ( '/search2', function () {
    $q = Request::get ( 'q' );
    $vacation = VacationPackages::where ( 'package_tags', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $vacation ) > 0)
        return view ( 'psearch' )->withPackages ( $vacation )->withQuery ( $q );
    else
        return view ( 'psearch' )->withMessage ( 'No vacation packages found. Try to search again !' );
} );

Auth::routes();

Route::any ( '/search1', function () {

    $accommodation_type = Request::get ('accommodation_type');
    $aprice = Request::get ('aprice');
    $location = Request::get ('location');
    $s = Request::get ('s');
    $e = Request::get ('e');

    $accommodation = Accommodation::where('accommodation_type', $accommodation_type)
    ->where('accommodation_price', 'LIKE', '%' . $aprice . '%')
    ->orwhere('accommodation_city',  $location)
    ->where('start_date', 'LIKE', '%' . $s . '%')
    ->where('end_date', 'LIKE', '%' . $e . '%')
    ->get();
      if (count ( $accommodation ) > 0)
          return view ( 'asearch' )->withDetails ( $accommodation )->withQuery( $accommodation_type)->withQuery( $aprice)->withQuery( $location)->withQuery( $s)->withQuery( $e);
      else
          return view ( 'asearch' )->withMessage ( 'No Details found. Try to search again !' );
} );
Route::any ( '/search3', function () {

    $package_type = Request::get ('package_type');
    $vprice = Request::get ('vprice');
    $vlocation = Request::get ('vlocation');
    $date = Request::get ('date');

    $vacation = VacationPackages::where('package_type', $package_type)
    ->where('package_price', 'LIKE', '%' . $vprice . '%')
    ->where('package_city',  $vlocation)
    ->where('date', 'LIKE', '%' . $date . '%')
    ->get();
      if (count ( $vacation ) > 0)
          return view ( 'psearch' )->withPackages ( $vacation )->withQuery( $package_type)->withQuery( $vprice)->withQuery( $vlocation)->withQuery( $date);
      else
          return view ( 'psearch' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::get('accommodation/{id}/show', [AccommodationController::class, 'show']);
Route::get('vacation/{id}/show', [VacationPackagesController::class, 'show']);


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Auth::routes();


Route::get('/reservations', [\App\Http\Controllers\OrderController::class, 'orders']);
Route::get('/reservationcheck/{id?}', [\App\Http\Controllers\OrderController::class, 'create']);
Route::get('/reservationpackcheck/{id?}', [\App\Http\Controllers\OrderPackController::class, 'create']);
// Admin


    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/{id}', [App\Http\Controllers\AccommodationController::class, 'destroy']);
    Route::get('/create',[App\Http\Controllers\AccommodationController::class,'insertform']);
    Route::post('create',[App\Http\Controllers\AccommodationController::class,'insert']);
    Route::get('update',[App\Http\Controllers\AccommodationController::class,'index']);
    Route::get('edit/{id}',[App\Http\Controllers\AccommodationController::class,'show1']);
    Route::post('edit/{id}',[App\Http\Controllers\AccommodationController::class, 'edit']);

    //liking accommodation
    Route::get('accommodation/{id}/like', [AccommodationController::class, 'like']);

//delete accommodation
    Route::get('accommodation/{id}/delete', [AccommodationController::class, 'delete']);

//liking vacations
    Route::get('vacation/{id}/like', [VacationPackagesController::class, 'like']);

//delete vacations
Route::get('vacation/{id}/delete', [VacationPackagesController::class, 'delete']);
    
//showing favourites
Route::get('/favourites', [\App\Http\Controllers\FavouriteController::class, 'index'])->name('favourites');