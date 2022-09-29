<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinBoard;
use App\Models\Opinion;
use App\Models\User;
use App\Models\Office;
use App\Models\Schedule;

class BulletinBoardsController extends Controller
{
    public function index(Request $request){
        $subQuery=function($query){
            $query->from('opinions')
                ->select(['board_id'])
                ->selectRaw('max(created_at) as latest_opinion')
                ->groupBy(['board_id']);
        };

        $query = BulletinBoard::joinSub($subQuery,'opinions','bulletinBoards.id','opinions.board_id')
            ->orderBy('latest_opinion','desc');

        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $query->where('title','like',"%{$keyword}%");
        }

        $boards = $query->get();

        return view('boards.index',compact('boards'));
    }

    public function show($id){
        $board=BulletinBoard::findOrFail($id);

        $opinions=Opinion::where('board_id','=',$board->id)
            ->orderBy('created_at','desc')
            ->paginate(100);

        $new = $opinions->first();

        $date=date('Y-m');

        $schedules = Schedule::where('date','like',$date.'%')->orderBy('date')->get();        

        return view('boards.show',compact('board','opinions','new','schedules'));
    }

    public function create(){
        return view('boards.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
        ]);

        $board = new BulletinBoard;
        $board->title = $request->title;
        $board->content = $request->content;
        $board->user_id = \Auth::user()->id;
        $board->office_id = $request->office_id;
        $board->save();

        $opinion = new Opinion;
        $opinion->board_id = $board->id;
        $opinion->opinion = "";
        $opinion->save();

        if(!empty($board->office_id)){
            return back();
        }else{
            return redirect('/boards');
        }

    }

    public function destroy($id){
        if(\Auth::check()){
            if(\Auth::id() === 1){
                $board = BulletinBoard::findOrFail($id);
    
                $board->delete();

                return back();
            }    
        }

    }
}
