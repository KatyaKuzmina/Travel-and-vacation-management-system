<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\VacationPackages;
use App\Models\PackageFeedback;
use App\Models\User;


class VacationPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $vacations= VacationPackages::all();
        $user = Auth::user();

        /*Price change*/
        if(!is_null($request->tmp)){
        if($request->tmp==1) $vacation = $vacation->sortBy('package_price');
        if($request->tmp==2) $vacation = $vacation->sortByDesc('package_price');}
        else $request->tmp=0;

        return view('vacations',compact('vacations'), array('tmp'=>$request->tmp));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        $vacations= VacationPackages::where('id', $id)->first();
        $packages_feedback=PackageFeedback::where('package_id', '=', $id)->first();
        $users=User::where('id', $id)->first();
        return view('vacations_new', compact('vacations', 'packages_feedback', 'users'));
    }
    
    public function like($id)
    {
        $vacations= VacationPackages::where('id', $id)->first();
        $packages_feedback=PackageFeedback::where('package_id', '=', $id)->first();
        $users=User::where('id', $id)->first();
        return view('vacfavourites', compact('vacations', 'packages_feedback', 'users'));
    }

    public function delete($id)
    {
        $vacations= VacationPackages::where('id', $id)->first();
        $packages_feedback=PackageFeedback::where('package_id', '=', $id)->first();
        $users=User::where('id', $id)->first();
        return view('vacdelete', compact('vacations', 'packages_feedback', 'users'));
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
