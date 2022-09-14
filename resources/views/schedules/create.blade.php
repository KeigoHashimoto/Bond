@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">予定を登録</h1>
    <p class="center">決まっている予定を登録してください。<br>間違いがないように確認してから登録してください。</p>
    <div class="schedule-form form">
        {{ Form::open(['route'=>'schedule.post']) }}
            <div class="make-title">
                {{ Form::label('date','日時') }}
                {{ Form::date('date',null,['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('time','時間') }}
                {{ Form::text('time',null,['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('content','内容') }}
                {{ Form::text('content',null,['class'=>'form-control']) }}
            </div>

            {{ Form::submit('regist',['class'=>'submit']) }}
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>
@endsection