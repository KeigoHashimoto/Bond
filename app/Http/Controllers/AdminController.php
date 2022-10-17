<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Office;
use App\Models\BulletinBoard;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function create(){
        return view('admins.register');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:admins',
            'password'=>'required|string|confirmed|min:8',
            'password_confirmation'=>'required|same:password',
        ]);
        $user = new Admin;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back();
    }
    public function index(){
        return view('admins.login');
    }
    public function doLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);
        $roles=$request->only('email','password');
        if(Auth::guard('admin')->attempt($roles)){
            return redirect()->route('admin.home')->with('success','welcome!Admin Home.');
        }else{
            return redirect()->back()->with('error','Login Failed');
        };
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function home(Request $request){
        $users = User::paginate(20);
        $query=BulletinBoard::query();
        $keyword=$request->input('sarch');
        if(!empty($keyword)){
            $query->where('title','like',"%{$keyword}%");
            $boards=$query->paginate(10);
        }else{
            $boards = BulletinBoard::orderBy('created_at','desc')->paginate(10);
        }
        $query=Office::query();
        $keyword=$request->input('sarch');
        if(!empty($keyword)){
            $query->where('name','like',"%{$keyword}%");
            $offices=$query->paginate(10);
        }else{
            $offices = Office::paginate(20);
        }
        return view('admins.home',compact('users','boards','offices'));
    }
    public function infoStore(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'info'=>'required|string|max:1000',
        ]);
        $info=new Infomation;
        $info->title=$request->title;
        $info->info=$request->info;
        $info->office_id = $request->office_id;
        $info->user_id=\Auth::id();
        $info->save();
        return back();
    }
}
