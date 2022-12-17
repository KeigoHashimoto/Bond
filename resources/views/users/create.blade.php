@extends('layouts.app')

@section('content')
<div class="home">
    <div class="user-form">
        <h1 class="center">プロフィール登録画面</h1>
        <p class="center">プロフィールが登録できます。</p>
        <div class="schedule-form">
            {{ Form::model($user,['route'=>['user.edit',$user->id],'enctype'=>'multipart/form-data','method'=>'put']) }}
                <div class="form-group">
                    {{ Form::label('name','名前',['class'=>'label']) }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('profile','プロフィール',['class'=>'label']) }}
                    {{ Form::textarea('profile',null,['class'=>'textarea']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('profile_img','プロフィール画像',['class'=>'label']) }}
                    {{ Form::file('profile_img',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('profile_header','プロフィールヘッダー画像',['class'=>'label']) }}
                    {{ Form::file('profile_header',null,['class'=>'form-control']) }}
                </div>
    
                <div class="submit-btn">
                    {{ Form::submit('regist',['class'=>'white']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>

@endsection