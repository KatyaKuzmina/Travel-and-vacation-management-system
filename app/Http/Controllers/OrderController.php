<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\AccommodationReservations;
use App\Models\PackageRes;
use App\Models\Accommodation;
use App\Models\VacationPackages;
use Illuminate\Support\Facades\Validator;
use App\Models\Personas;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        $accommodation=Accommodation::where('id', $id)->first();
        if (Auth::check()) {
               
                return view('order_create', compact('accommodation'));
               
            }
        else {
            return redirect ('/login');
        }   
    }
    
    public function orders() {
        $orders = AccommodationReservations::with('accommodationorder')->join('accommodations', 'accommodations.id', '=', 'accommodation_reservations.accommodation_id')->where('user_id', Auth::user()->id)->get()->toArray();
        $orderspackage = PackageRes::with('packagesorder')->join('vacation_packages', 'vacation_packages.id', '=', 'package_res.package_id')->where('user_id', Auth::user()->id)->get()->toArray();
//        $orders = AccommodationReservations::where('user_id', Auth::User()->id)->get()->ToArray();
//        dd($orders); die;
//        $packageorders = PackageRes::with('packagesorder')->where('user_id', Auth::user()->id)->get()->toArray();
        return view('orders')->with(compact('orders', 'orderspackage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|min:2|max:29',
        'surname' => 'required|string|min:2|max:29',
        'perskods' => 'required|string|min:12|max:12',   
        ]);
        $persona = new Personas();
        $persona->user_id = Auth::user()->id;
        $persona->Vards=$request->name;
        $persona->save();
        
       $accommodation = new AccommodationReservations();
        $accommodation->user_id = Auth::user()->id;
        $accommodation->accommodation_id = $request->veids;
        $accommodation->save();


        return redirect('/reservations');
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
}
