@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="user-form">
            <h2 class="center">ログイン</h2>

            {{ Form::open(['route'=>'doLogin']) }}
                <div class="form-group">
                    {{ Form::label('email','email',['class'=>'label']) }}
                    {{ Form::email('email',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password','password',['class'=>'label']) }}
                    {{ Form::password('password',['class'=>'form-control']) }}
                </div>
                <div class="submit-btn">
                    {{ Form::submit('ログイン') }}
                </div>
            {{ Form::close() }}

            {{ link_to_route('register','新規登録',[],['class'=>'center small']) }}
        </div>

    </div>

@endsection