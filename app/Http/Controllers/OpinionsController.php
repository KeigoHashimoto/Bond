<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinBoard;
use App\Models\Opinion;

class OpinionsController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'opinion'=>'required|string|max:500',
        ]);

        $user=\Auth::user();
        $board = BulletinBoard::findOrFail($id);

        $opinions = new Opinion;
        $opinions->user_id = $user->id;
        $opinions->board_id = $board->id;
        $opinions->opinion =$request->opinion;
        $opinions->save();

        return back();
    }
}
