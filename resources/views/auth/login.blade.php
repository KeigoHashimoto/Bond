@extends('layouts.app')

@section('content')
    <div class="home">
        <h1 class="center">ログイン</h1>

        {{ Form::open(['route'=>'auth']) }}
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

        {{-- {{ link_to_route('register','新規登録',[],['class'=>'center black-link']) }} --}}
    </div>

@endsection