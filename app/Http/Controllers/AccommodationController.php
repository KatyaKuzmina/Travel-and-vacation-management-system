<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\AccommodationFeedback;
use App\Models\User;

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
        $accfeedbacks = AccommodationFeedback::all();
        $user = Auth::user();

        /*Price change*/
        if(!is_null($request->tmp)){
        if($request->tmp==1) $accommodations = $accommodations->sortBy('accommodation_price');
        if($request->tmp==2) $accommodations = $accommodations->sortByDesc('accommodation_price');}
        else $request->tmp=0;

        return view('accommodations',compact('accommodations'), array( 'tmp'=>$request->tmp));

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
        $accommodations=Accommodation::where('id', $id)->first();
        $accommodation_feedback=AccommodationFeedback::where('accommodation_id', '=', $id)->first();
        $users=User::where('id', $id)->first();
        return view('accommodation_new',compact('accommodations', 'accommodation_feedback', 'users'));
    }

public function like($id)
    {
        $accommodations=Accommodation::where('id', $id)->first();
        $accommodation_feedback=AccommodationFeedback::where('accommodation_id', '=', $id)->first();
        $users=User::where('id', $id)->first();
        return view('accfavourites',compact('accommodations', 'accommodation_feedback', 'users'));
    }

public function delete($id)
    {
        $accommodations=Accommodation::where('id', $id)->first();
        $accommodation_feedback=AccommodationFeedback::where('accommodation_id', '=', $id)->first();
        $users=User::where('id', $id)->first();
        return view('accdelete',compact('accommodations', 'accommodation_feedback', 'users'));
    }

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

Accommodation::findOrFail($id)->delete();
return redirect('admin/');

    }

    public function welcometest() {
        return view ('about');
    }

    public function testing() {
        $accommodationtest = Accommodation::all();
        return View::make('accommodations', compact('accommodations'));
    }

    public function insertform() {
      return view('create');
   }

   public function insert(Request $request) {
      $accommodation_name = $request->input('accommodation_name');
      $accommodation_price = $request->input('accommodation_price');
      $accommodation_city = $request->input('accommodation_city');
      $accommodation_type = $request->input('accommodation_type');
      $accommodation_address = $request->input('accommodation_address');
      $start_date = $request->input('start_date');
      $end_date = $request->input('end_date');
      $accommodation_tags = $request->input('accommodation_tags');
      $accommodation_description = $request->input('accommodation_description');
      $image = $request->input('image');
      DB::insert('insert into accommodations (accommodation_name,accommodation_price,accommodation_type,accommodation_city,accommodation_address,start_date, end_date, accommodation_tags, accommodation_description,image) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[$accommodation_name,$accommodation_price,$accommodation_type,$accommodation_city, $accommodation_address, $start_date, $end_date, $accommodation_tags, $accommodation_description, $image]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/admin">Click Here</a> to go back.';
   }
   public function show1($id) {


         $accommodation = DB::select('select * from accommodations where id = ?',[$id]);
         return view('update',['accommodation'=>$accommodation]);
      }
      public function edit(Request $request,$id) {
        $accommodation_name = $request->input('accommodation_name');
        $accommodation_price = $request->input('accommodation_price');
        $accommodation_city = $request->input('accommodation_city');
        $accommodation_type = $request->input('accommodation_type');
        $accommodation_address = $request->input('accommodation_address');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $accommodation_tags = $request->input('accommodation_tags');
        $accommodation_description = $request->input('accommodation_description');
        $image = $request->input('image');
         DB::update('update accommodations set accommodation_name = ? where id = ?',[$accommodation_name,$id]);
         DB::update('update accommodations set accommodation_price = ? where id = ?',[$accommodation_price,$id]);
         DB::update('update accommodations set accommodation_city = ? where id = ?',[$accommodation_city,$id]);
         DB::update('update accommodations set accommodation_address = ? where id = ?',[$accommodation_address,$id]);
         DB::update('update accommodations set start_date = ? where id = ?',[$start_date,$id]);
         DB::update('update accommodations set end_date = ? where id = ?',[$end_date,$id]);
         DB::update('update accommodations set accommodation_tags = ? where id = ?',[$accommodation_tags,$id]);
         DB::update('update accommodations set accommodation_description = ? where id = ?',[$accommodation_description,$id]);
         DB::update('update accommodations set image = ? where id = ?',[$image,$id]);
         echo "Records updated successfully.<br/>";
         echo '<a href = "/admin">Click Here</a> to go back.';
      }
}
