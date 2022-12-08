<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\User;
use App\Models\BulletinBoard;
use Hash;

class OfficesController extends Controller
{
    /**
     * 新しいグループの作成
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'string|max:255|min:8',
        ]);
        $office = new Office;
        $office->name = $request->name;
        $office->password = Hash::make($request->password);
        $office->save();
        return redirect('/office');
    }
    /**
     * グループの一覧ページ
     */
    public function index(Request $request){
        //グループ検索機能
        //全てのグループを名前順で取得
        $query= Office::orderBy('name');

        $keyword = $request->input('office_keyword');
        if(!empty($keyword)){
            $query->where('name','like',"%{$keyword}%");
        }
        $offices = $query->get();
        return view('offices.index',compact('offices'));
    }

    /**
     * グループの詳細ページ
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function show(Request $request ,$id){
        $office = Office::findOrFail($id);
        $user=\Auth::user();
        //Hash化したパスワードがリクエストと一致しているか
        if($request->password == password_verify($request->password,$office->password)){
            $user->join($office->id);
        }
        $boards = BulletinBoard::where('office_id',$office->id)
            ->orderBy('created_at','desc')
            ->offset(0)
            ->limit(2)
            ->get();
        $users=$office->affiliationUsers()->get();
        return view('offices.show',compact('office','user','users','boards'));
    }

    /**
     * グループ作成フォーム
     *
     * @return void
     */
    public function form(){
        return view('offices.form');
    }

    /**
     * グループ削除機能
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $office=Office::findOrFail($id);
        $office->delete();
        return redirect('/');
    }

    /**
     * グループ情報の更新
     *
     * @param [type] $id
     * @return void
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'string|max:255|min:8',
        ]);
        $office=Office::findOrFail($id);
        $office->name = $request->name;
        $office->password = Hash::make($request->password);
        $office->save();
        return redirect('/office/show/'.$office->id);
    }
}
