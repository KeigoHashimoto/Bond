@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="user-form">
            <h2 class="center">会員登録</h2>
        
            {{ Form::open(['route'=>'regist.post']) }}
                <div class="form-group">
                    {{ Form::label('name','name',['class'=>'label']) }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email','email',['class'=>'label']) }}
                    {{ Form::email('email',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password','password',['class'=>'label']) }}
                    {{ Form::password('password',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation','confirm',['class'=>'label']) }}
                    {{ Form::password('password_confirmation',['class'=>'form-control']) }}
                </div>
    
                <div class="submit-btn">
                    {{ Form::submit('submit',['class'=>'white']) }}
                </div>
            {{ Form::close() }}
    
            {{ link_to_route('login','ログイン',[],['class'=>'center small']) }}
        </div>

@endsection