@extends('layouts.app')

@section('content')

<div id="schedules-icon">
    <i class="far fa-calendar-alt"></i>
</div>

<div class="main">
    <h1 class="center">{{ $board->title }}</h1>
    <p class="center board-content">{!! nl2br(e($board->content)) !!}</p>

    <p class="small center">議題に沿った話し合いをしてください。<br>
    個人名を出したり、誹謗中傷はしないでください。</p>

    {{ Form::open(['route'=>['opinion.post',$board->id]]) }}
        {{ Form::textarea('opinion',null,['class'=>'textarea']) }}
        {{ Form::submit('送信',['class'=>'submit']) }}
    {{ Form::close() }}

    @foreach($opinions as $opinion)
    <div class="opinion">
        @if(!empty($opinion->user->name))
            <p class="opinion-user">{{ $opinion->user->name }}</p>
            <p class="opinion-content">{!! nl2br(e($opinion->opinion)) !!}</p>
            <p class="opinion-at small">{{ $opinion->created_at }}</p>
        @else
            <p>議論を開始して下さい</p>
        @endif
    </div>
    @endforeach

    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>



<div id="schedules" class="board-schedules">
    @include('commons.schedules')
    <div class="add-text">{!! link_to_route('schedule.create','+add Schedules',[],['class'=>'add-icon']) !!}</div>
</div>

<div id="filter"></div>
@endsection