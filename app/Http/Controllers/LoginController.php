<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function doLogin(Request $request){
        $roles=$request->only('email','password');

        if(Auth::attempt($roles)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'message'=>'メールアドレス、またはパスワードが正しくありません。',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
