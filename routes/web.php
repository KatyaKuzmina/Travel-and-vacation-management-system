<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AccommodationReservationController;
use App\Http\Controllers\VacationPackagesController;
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

//Route::redirect('/', 'accommodation');
//Route::resource('accommodation', AccommodationController::class);
//Auth::routes();

Route::redirect('/', 'vacation');
Route::resource('vacation', VacationPackagesController::class);
Auth::routes();
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

Route::any ( '/search3', function () {
    $s = Request::get ('s');
    $accommodation = AccommodationReservations::where ( 'start_date', 'LIKE', '%' . $s . '%' )->get ();
    if (count ( $accommodation ) > 0)
        return view ( 'asearch' )->withDetails ( $accommodation )->withQuery ( $s );
    else
        return view ( 'asearch' )->withMessage ( 'No Details found. Try to search again !' );
} );


Route::any ( '/search4', function () {
    $date = Request::get ('date');
    $vacation = PackageRes::where ( 'date', 'LIKE', '%' . $date . '%' )->get ();
    if (count ( $vacation ) > 0)
        return view ( 'psearch' )->withPackages ( $vacation )->withQuery ( $date );
    else
        return view ( 'psearch' )->withMessage ( 'No Details found. Try to search again !' );
} );


Route::any ( '/search5', function () {
    $aprice = Request::get ('aprice');
    $accommodation = Accommodation::where ( 'accommodation_price', 'LIKE', '%' . $aprice . '%' )->get ();
    if (count ( $accommodation ) > 0)
        return view ( 'asearch' )->withDetails ( $accommodation )->withQuery ( $aprice );
    else
        return view ( 'asearch' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::any ( '/search6', function () {
    $vprice = Request::get ('vprice');
    $vacation = VacationPackages::where ( 'package_price', 'LIKE', '%' . $vprice . '%' )->get ();
    if (count ( $vacation ) > 0)
        return view ( 'psearch' )->withPackages ( $vacation )->withQuery ( $vprice );
    else
        return view ( 'psearch' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::get('accommodation/{id}/show', [AccommodationController::class, 'show']);
Route::get('vacation/{id}/show', [VacationPackagesController::class, 'show']);
