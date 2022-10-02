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

        return view('welcome',compact('user','infos'));
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

    public function show($id){
        $user=User::findOrFail($id);

        $myBoards = BulletinBoard::where('user_id',\Auth::id())
            ->orderBy('created_at','desc')
            ->paginate(5);

        return view('users.show',compact('user','myBoards'));
    }

    public function create($id){
        $user=User::findOrFail($id);

        return view('users.create',compact('user'));
    }

    public function edit(Request $request,$id){
        $request->validate([
            'profile'=>'string|max:500',
            'profile_img'=>'file|image',
        ]);

        $profile = User::findOrFail($id);

        if($file = $request->profile_img){
            $fileName = time(). $file->getClientOriginalName();
            $path = public_path('/uploads/profile/');
            $file->move($path,$fileName);
        }else{
            $fileName = "default.jpg";
            $path = public_path('/uploads/profile/');
        }

        if($file = $request->profile_header){
            $headerFileName = time() . $file->getClientOriginalName();
            $path = public_path('/uploads/header/');
            $file->move($path,$headerFileName);
        }else{
            $headerFileName = "default.jpeg";
            $path = public_path('/uploads/header/');
        }


        $profile->profile = $request->profile;
        $profile->profile_img = $fileName;
        $profile->profile_header = $headerFileName;
        $profile->save();

        // dd($profile->profile_header);

        return redirect('/');
    }
}
