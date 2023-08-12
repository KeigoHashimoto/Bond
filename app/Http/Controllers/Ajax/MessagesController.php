<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Opinion;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MessagesController extends Controller
{
    public function index()
    {
        return Opinion::orderBy('created_at','desc')->paginate(7);
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
