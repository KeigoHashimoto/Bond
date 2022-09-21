<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinBoard;
use App\Models\Opinion;
use App\Models\User;
use App\Mail\NewOpinion;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\Mail;

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

        $users=User::get();
        $time = date('H');
        $greet;
        $words;
        if($time >= 6 && $time <= 11){
            $greet = 'おっはー！';
            $words = '今日も元気してるー？？今日も一日頑張りまっしょい！';
        }else if($time > 11 && $time <= 18 ){
            $greet = 'Hallo';
            $words = '今日も張り切ってる？？みんな頑張ってるの知ってるよ！無理しないでね！';
        }else{
            $greet = 'こんばんは！';
            $words = '今日も疲れたね。ビールでも飲んでリラックスたーいむ！';
        }

        event(new MessageCreated($opinions));

        Mail::to($users)->send(new NewOpinion($greet,$words,'['.$board->title.']に新着投稿があったよ！要チェック！',));

        return back();
    }
}
