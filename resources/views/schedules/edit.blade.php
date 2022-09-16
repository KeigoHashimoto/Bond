@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">予定を変更</h1>
    <p class="center">予定を変更してください。</p>
    <div class="schedule-form form">
        {{ Form::model($schedule,['route'=>['schedule.update',$schedule->id],'method'=>'put']) }}
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

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>
@endsection