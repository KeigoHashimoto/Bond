<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Opinion;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MessagesController extends Controller
{
    public function index(Request $req,$boardId)
    {
        $opinions = Opinion::where('board_id','=',$boardId)->orderBy('created_at','desc')->paginate(4);
        return $opinions;
    }
    public function users()
    {
        return User::get();
    }
    public function authUser()
    {
        return \Auth::user();
    }
}
