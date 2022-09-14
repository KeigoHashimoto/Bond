<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Infomation;

class UsersController extends Controller
{
    public function index(){
        $user=\Auth::user();

        $date=date('Y-m');

        $infos=Infomation::where('created_at','like',$date.'%')->orderBy('created_at','desc')->paginate(6);

        return view('welcome',compact('user','infos'));
    }
}
