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
    public function store(Request $request){
        $request->validate([
            'opinion'=>'max:500',
            'image'=>'file|mimes:jpeg,png,jpg,bmp|max:5000',
        ]);

        $user=\Auth::user();
        $board = BulletinBoard::findOrFail($request->board_id);
        if(!empty($board->office_id)){
            $office = $board->office;
        }

        if($file = $request->image){
            $file_name = time() . $file->getClientOriginalName();
            $file_path = public_path('/uploads/');
            $file -> move($file_path,$file_name);
        }else{
            $file_name="";
        }

        $opinions = new Opinion;
        $opinions->user_id = $user->id;
        $opinions->board_id = $board->id;
        $opinions->opinion = $request->opinion;
        $opinions->img_path = $file_name;
        $opinions->save();

        if(!empty($board->office_id)){            
            $users=$office->affiliationUsers()->get();
        }else{
            $users=User::get();
        }

        event(new MessageCreated($opinions));

        $time = date('H');
        $greet;
        $words;
        if($time >= 6 && $time <= 11){
            $greet = 'おはようございます';
            $words = '今日も１日頑張りましょう！';
        }else if($time > 11 && $time <= 18 ){
            $greet = 'こんにちは';
            $words = '毎日ご苦労様です！';
        }else{
            $greet = 'こんばんは。';
            $words = '今日もお疲れ様でした！';
        }

        Mail::to($users)->send(new NewOpinion($greet,$words,'['.$board->title.']に新着投稿がありました。',));

        return response()->json('test');
    }
}
