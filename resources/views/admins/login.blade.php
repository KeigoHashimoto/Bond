@extends('layouts.app')

@section('content')
    <div class="home">
        @if(Session::has('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
        
        <h1 class="center">Admin Login</h1>

        {{ Form::open(['route'=>'admin.doLogin']) }}
            <div class="form-group">
                {{ Form::label('email','email',['class'=>'label']) }}
                {{ Form::email('email',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password','password',['class'=>'label']) }}
                {{ Form::password('password',['class'=>'form-control']) }}
            </div>
            <div class="submit-btn">
                {{ Form::submit('ログイン',['class'=>'white']) }}
            </div>
            
        {{ Form::close() }}

        {{ link_to_route('admin.register','新規登録',[],['class'=>'center black-link']) }}
    </div>

@endsection