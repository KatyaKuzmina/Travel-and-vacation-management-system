<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use DB;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Models\User;

class CommentController extends Controller
{
  public function index(request $request)
  {
    $user = Auth::user();
    $comments= Comment::all();

  }
   public function insert(Request $request) {

   $rules = array(
    'comment' => 'required',
    );
    $this->validate($request, $rules);

  $comment = $request->input('comment');
  $userid = $request->input('user_id');
  $acc_id = $request->input('accommodation_id');

  DB::insert('insert into comments (comment, user_id, accommodation_id) values(?, ?, ?)',[$comment, $userid, $acc_id]);
  ?>
  <br>
  <p style="font-size: 40px; text-align: justify; margin-left: 30%; margin-right: 25%;" >Thank you for your feedback</p>

  <p style="font-size: 40px; text-align: justify; margin-left: 30%; margin-right: 25%;" >Paldies par jūsu atsauksmēm</p>

 <p style="font-size: 40px; text-align: justify; margin-left: 40%; margin-right: 40%;" ><a href="#" onclick="location.href = document.referrer; return false;">Back/Atpakaļ</a></p>

  <?php

   }
   public function insertform() {
     return view('comment');
  }

  public function show($id)
    {
        $comments=Comment::where('id', $id)->first();
        $users=User::where('id', $id)->first();
        $accommodations=Accommodation::where('id', $id)->first();
        return view('accommodation_new',compact('comments', 'users', 'accommodations'));
    }
}
