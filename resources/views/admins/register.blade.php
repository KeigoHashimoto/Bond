@extends('layouts.app')

@section('content')
    <div class="home">
        <h1 class="center">Admin Registration</h1>
    
        {{ Form::open(['route'=>'admin.regist.post']) }}
            <div class="form-group">
                {{ Form::label('name','name',['class'=>'label']) }}
                {{ Form::text('name',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email','email',['class'=>'label']) }}
                {{ Form::email('email',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone','Phone',['class'=>'label']) }}
                {{ Form::text('phone',null,['class'=>'form-control']) }}
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

        {{ link_to_route('admin.login','ログイン',[],['class'=>'center']) }}

@endsection