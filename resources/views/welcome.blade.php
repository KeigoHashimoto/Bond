@extends('layouts.app')

@section('content')
@auth
<div class="main">
    <p class="greet">Hello!{{ $user->name }}さん</p>

    <a href="{{ route('user.show',[$user->id])}}"><img src="uploads/{{ $user->profile_img }}" alt="" class="profile-top-image"></a>
    {{ link_to_route('user.create','プロフィールを編集',[$user->id],['class'=>'center small']) }}

    <h1 class="center">Infomation</h1>

    @include('commons.info')

    <p class="small center">{!! link_to_route('info.index','show all infomations') !!}</p>

    <h1 class="center">Affiliation Group</h1>

    <div class="group-wrap">
        @foreach($user->affiliations()->get() as $office)
            {!! link_to_route('office.show',$office->name,[$office->id],['class'=>'center']) !!}
        @endforeach
    </div>
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
