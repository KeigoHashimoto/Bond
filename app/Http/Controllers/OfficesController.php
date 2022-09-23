<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\User;

class OfficesController extends Controller
{
    public function create(){
        return view('offices.create');
    }

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

    public function index(){
        $offices = Office::orderBy('name')->get();

        return view('offices.index',compact('offices'));
    }

    public function show(Request $request ,$id){
        $office = Office::findOrFail($id);

        $user=\Auth::user();

        if($request->password == $office->password){
            $user->join($office->id);
        }


        $users=$office->affiliationUsers()->get();

        return view('offices.show',compact('office','user','users'));

    }

}
