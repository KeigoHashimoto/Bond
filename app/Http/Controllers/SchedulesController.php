<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class SchedulesController extends Controller
{
    public function currentMonth(){
        $now=date('Y-m');

        $schedules = Schedule::where('date','like',$now.'%')->orderBy('date')->get();

        return view('schedules.index',compact('schedules',));
    }

    public function index(){
        $schedules = Schedule::orderBy('date')->paginate(20);

        return view('schedules.all',compact('schedules'));
    }

    public function create(){
        return view('schedules.create');
    }

    public function store(Request $request){
        $request->validate([
            'date'=>'required|date|',
            'content'=>'required|string|max:255',
        ]);
        $user=\Auth::user();
        $schedule = new Schedule;
        $schedule->date=$request->date;
        $schedule->content=$request->content;
        $schedule->time=$request->time;
        $schedule->user_id = $user->id;
        $schedule->save();

        return view('schedules.complete',compact('schedule'));
    }

    public function edit($id){
        $schedule=Schedule::findOrFail($id);

        return view('schedules.edit',compact('schedule'));
    }

    public function update(Request $request ,$id){
        $request->validate([
            'date'=>'required|date|',
            'content'=>'required|string|max:255',
        ]);
        $user=\Auth::user();
        $schedule = Schedule::findOrFail($id);
        $schedule->date=$request->date;
        $schedule->content=$request->content;
        $schedule->time=$request->time;
        $schedule->user_id = $user->id;
        $schedule->save();

        return redirect('/schedules');
    }

    public function destroy($id){
        $schedule=Schedule::findOrFail($id);

        $schedule->delete();

        return back();
    }
}
