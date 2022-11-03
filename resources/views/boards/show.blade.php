@extends('layouts.app')

@section('content')

<div id="schedules-icon" v-on:click="modalSwitch = !modalSwitch">
    <i class="far fa-calendar-alt"></i>
</div>

<div class="main">
    <h1 class="center">{{ $board->title }}</h1>
    <p class="center board-content">{!! nl2br(e($board->content)) !!}<br><span class="small">by {{ $board->user->name }}</span></p>

    <p class="small center">議題に沿った話し合いをしてください。<br>
    個人名を出したり、誹謗中傷はしないでください。</p>

    {{ Form::open(['route'=>['opinion.post',$board->id],'enctype'=>'multipart/form-data']) }}
        {{ Form::textarea('opinion',null,['class'=>'textarea']) }}
        {{ Form::label('img_path','画像：') }}
        {{ Form::file('img_path') }}
        <div class="submit-btn">
            {{ Form::submit('送信',['class'=>'white']) }}
        </div>
    {{ Form::close() }}

    {{-- opinion リアルタイムチャット　vuejs --}}
    <example-component :board='@json($board)'></example-component>

    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
    @if($board->office_id)
        {!! link_to_route('office.show','グループへ戻る',[$board->office_id],['class'=>'center']) !!}
    @endif
</div>

<div id="schedules"
    class="board-schedules" 
    v-on:click="modalSwitch = !modalSwitch" 
    v-show="modalSwitch">
    @include('commons.schedules')
    <div class="add-text">{!! link_to_route('schedule.form','+add Schedules',[$board->id],['class'=>'add-icon white']) !!}</div>
</div>

<div id="filter" v-on:click="modalSwitch = !modalSwitch" v-show="modalSwitch"></div>
@endsection