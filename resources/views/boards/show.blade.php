@extends('layouts.app')

@section('content')

<div id="schedules-icon" v-on:click="modalSwitch = !modalSwitch">
    <i class="far fa-calendar-alt"></i>
</div>

<div class="board-show">
    <div class="contents-width">
        <h1 class="center show-title">{{ $board->title }}</h1>
        <div class="show-contents">
            <p class="center board-content">{!! nl2br(e($board->content)) !!}<br>
                <span class="small">by {{ $board->user->name }}</span>
            </p>
        </div>
    
        <p class="small center">議題に沿った話し合いをしてください。<br>
        個人名を出したり、誹謗中傷はしないでください。</p>
        
        <div class="opinion-form">
            <post-form :board_id='{{$board->id}}' class="opinion-form-component"></post-form>
        </div>
    
        {{-- opinion リアルタイムチャット　vuejs --}}
        <example-component :board='@json($board)'></example-component>


    
        {!! link_to_route('home','topに戻る',[],['class'=>'center small']) !!}
        @if($board->office_id)
            {!! link_to_route('office.show','グループへ戻る',[$board->office_id],['class'=>'center small']) !!}
        @endif
    </div>
</div>

<div id="schedules"
    class="board-schedules" 
    v-on:click="modalSwitch = !modalSwitch" 
    v-show="modalSwitch">
        @include('commons.schedules')
</div>

<div class="filter" v-on:click="modalSwitch = !modalSwitch" v-show="modalSwitch"></div>
@endsection