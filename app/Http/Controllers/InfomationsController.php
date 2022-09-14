<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infomation;
use App\Models\User;

class InfomationsController extends Controller
{
    public function create(){
        return view('infomation.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'info'=>'required|string|max:255',
        ]);

        $info=new Infomation;
        $info->title=$request->title;
        $info->info=$request->info;
        $info->user_id=\Auth::id();
        $info->save();

        return redirect('/');
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
