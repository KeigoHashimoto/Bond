<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\User;

class OfficesController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'string|max:255|min:8',
        ]);
        $office = new Office;
        $office->name = $request->name;
        $office->password = $request->password;
        $office->save();
        return redirect('/office');
    }
    public function index(Request $request){
        $query= Office::orderBy('name');
        $keyword = $request->input('office_keyword');
        if(!empty($keyword)){
            $query->where('name','like',"%{$keyword}%");
        }
        $offices = $query->get();
        return view('offices.index',compact('offices'));
    }
    public function show(Request $request ,$id){
        $office = Office::findOrFail($id);
        $user=\Auth::user();
        if($request->password == $office->password){
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
    public function form(){
        return view('offices.form');
    }
    public function destroy($id){
        $office=Office::findOrFail($id);
        $office->delete();
        return back();
    }
}
