@extends('layouts.app')

@section('content')
@auth
<div class="main">
    <p class="greet">Hello!{{ $user->name }}さん</p>

    <h1 class="center">Infomation</h1>

    @include('commons.info')

    <p class="small center">{!! link_to_route('info.index','show all infomations') !!}</p>
</div>

@else
<div class="home">
    <h1 class="logo center">HinodeCommunity</h1>

    <div class="welcome">
        {!! link_to_route('register','会員登録',[],['class'=>'welcome-btn']) !!}
        <p class="center">or</p>
        {!! link_to_route('login','ログイン',[],['class'=>'welcome-btn']) !!}
    </div>
</div>
@endauth
@endsection
