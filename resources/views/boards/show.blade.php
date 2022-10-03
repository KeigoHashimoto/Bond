@extends('layouts.app')

@section('content')

<div id="schedules-icon" v-on:click="modalSwitch = !modalSwitch">
    <i class="fas fa-calendar-alt"></i>
</div>

<div class="main">
    <h1 class="center">{{ $board->title }}</h1>
    <p class="center board-content">{!! nl2br(e($board->content)) !!}<br><span class="small">by {{ $board->user->name }}</span></p>

    <p class="small center">議題に沿った話し合いをしてください。<br>
    個人名を出したり、誹謗中傷はしないでください。</p>

    {{ Form::open(['route'=>['opinion.post',$board->id],'enctype'=>'multipart/form-data']) }}
        {{ Form::textarea('opinion',null,['class'=>'textarea']) }}
        {{ Form::label('imgpath') }}
        {{ Form::file('img_path') }}
        <div class="submit-btn">
            {{ Form::submit('送信',['class'=>'white']) }}
        </div>
    {{ Form::close() }}

    @foreach($opinions as $opinion)
    <div class="opinion">
        @if(!empty($opinion->user->name))
            <div>
                <img class="opinion-profile-img" src="/uploads/profile/{{ $opinion->user->profile_img }}" alt="">
            </div>
            <div class="opinion-contents">
                <p class="opinion-user">{{ $opinion->user->name }}</p>
                <p class="opinion-content">{!! nl2br(e($opinion->opinion)) !!}</p>
                @if(!empty($pinion->img_path))
                    <img src="/uploads/{{ $opinion->img_path }}" alt="" class="opinion-img">
                @endif
                <p class="opinion-at small">{{ $opinion->created_at }}</p>
            </div>

        @else
            <p>議論を開始して下さい</p>
        @endif
    </div>
    @endforeach

    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>



<div id="schedules" class="board-schedules" v-show="modalSwitch">
    @include('commons.schedules')
    <div class="add-text">{!! link_to_route('schedule.form','+add Schedules',[],['class'=>'add-icon white']) !!}</div>
</div>

<div id="filter" v-on:click="modalSwitch = !modalSwitch" v-show="modalSwitch"></div>
@endsection