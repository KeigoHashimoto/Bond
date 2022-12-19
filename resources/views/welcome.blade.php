@extends('layouts.app')

@section('content')
    @auth
        <div class="home">
            <div class="contents-width">
                <p class="greet">Hello!{{ $user->name }}さん</p>
    
                <a href="{{ route('user.show',[$user->id])}}"><img src="uploads/{{ $user->profile_img }}" alt="" class="profile-top-image"></a>
                {{ link_to_route('user.create','プロフィールを編集',[$user->id],['class'=>'center small']) }}
    
                <h1 class="center title">Infomation</h1>
    
                <div class="home-contents">
                    @include('commons.info')
                </div>
    
                <p class="small center">{!! link_to_route('info.index','show all infomations') !!}</p>
    
                <h1 class="center title">Affiliation Group</h1>
    
                <div class="home-contents">
                    @foreach($user->affiliations()->get() as $office)
                        <div class="home-content">
                            <p class="small">{{ $office->created_at }}</p>
                            {!! link_to_route('office.show',$office->name,[$office->id]) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @else
        <div class="no-auth">
            <h1 class="logo center">HinodeCommunity</h1>

            <div class="welcome">
                {!! link_to_route('register','会員登録',[],['class'=>'welcome-btn']) !!}
                <p class="center">or</p>
                {!! link_to_route('login','ログイン',[],['class'=>'welcome-btn']) !!}
            </div>
        </div>
    @endauth
@endsection
