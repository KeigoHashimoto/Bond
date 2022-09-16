@extends('layouts.app')

@section('content')
<div class="welcome">
    <h1 class="center">add Infomation</h1>
    <p class="center">連絡事項を登録してください。<br>
    これはユーザー全員に表示されます。</p>
    <div class="schedule-form">
        {{ Form::open(['route'=>'info.post']) }}
            <div class="make-title">
                {{ Form::label('title','タイトル') }}
                {{ Form::text('title',null,['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('info','内容') }}
                {{ Form::textarea('info',null,['class'=>'textarea']) }}
            </div>

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>
@endsection