<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infomation;
use App\Models\User;

class InfomationsController extends Controller
{
    public function form(){
        return view('infomation.form');
    }

    public function store(Request $request){
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

        if(!$info->exists('office_id')){
            return redirect('/');
        }else{
            return back();
        }

    }

    public function show($id){
        $info=Infomation::findOrFail($id);

        //ログインユーザーを既読にする
        $user=\Auth::user();
        $user->addReads($info->id);
        //対象の連絡事項を読んでいるユーザーの取得
        $readed_users = $info->readUsers()->get();

        $all_users = User::get();

        return view('infomation.show',compact('info','user','readed_users','all_users'));
    }

    public function index(){
        $infos = Infomation::orderBy('created_at','desc')->paginate(20);

        return view('infomation.index',compact('infos'));
    }
}
