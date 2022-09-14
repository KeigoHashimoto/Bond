@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">連絡事項の登録</h1>
    <p class="center">連絡事項を登録してください。<br>
    これはユーザー全員に表示されます。</p>
    <div class="schedule-form form">
        {{ Form::open(['route'=>'info.post']) }}
            <div class="make-title">
                {{ Form::label('title','タイトル') }}
                {{ Form::text('title',null,['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('info','内容') }}
                {{ Form::textarea('info',null,['class'=>'textarea']) }}
            </div>

            {{ Form::submit('regist',['class'=>'submit']) }}
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>
@endsection