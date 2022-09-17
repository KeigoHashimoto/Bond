<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Infomation;
use App\Models\User;
use App\Models\BulletinBoard;
use App\Models\Opinion;

class UsersController extends Controller
{
    public function index(){
        $user=\Auth::user();

        $date=date('Y-m');

        $infos=Infomation::where('created_at','like',$date.'%')->orderBy('created_at','desc')->paginate(6);

        $myBoards = BulletinBoard::where('user_id',\Auth::id())
            ->orderBy('created_at','desc')
            ->paginate(5);

        return view('welcome',compact('user','infos','myBoards'));
    }

    public function users(){
        if(\Auth::check()){
            if(\Auth::id() === 1){
                $users=User::orderBy('id')->get();
                return view('users.index',compact('users'));
            }
        }else{
            return redirect("/");
        }
    }
}
