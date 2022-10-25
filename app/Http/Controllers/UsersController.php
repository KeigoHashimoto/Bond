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

    public function show($id){
        $user=User::findOrFail($id);

        $myBoards = BulletinBoard::where('user_id',$user->id)
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
            'name'=>'required|string|max:255',
            'profile_img'=>'file|mimes:jpeg,png,jpg,bmb|max:5000',
            'profile_header'=>'file|mimes:jpeg,png,jpg,bmb|max:5000'
        ]);

        $profile = User::findOrFail($id);

        //requestの中にprofile_imgがあったら

        if($file = $request->profile_img){
            //file名をつける
            $fileName = time(). $file->getClientOriginalName();
            //保存先を指定
            $path = public_path('/uploads/');
            //画像を保存
            $file->move($path,$fileName);
        }else{
            $fileName = $profile->profile_img;
        }

        if($file = $request->profile_header){
            $headerFileName = time() . $file->getClientOriginalName();
            $path = public_path('/uploads/');
            $file->move($path,$headerFileName);
        }else{
            $headerFileName = $profile->profile_header;
        }
        $profile->profile = $request->profile;
        $profile->name = $request->name;
        $profile->profile_img = $fileName;
        $profile->profile_header = $headerFileName;
        $profile->save();
        // dd($profile->profile_header);

        return redirect('/');
    }
}
