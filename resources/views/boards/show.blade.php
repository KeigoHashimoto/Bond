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
        {{ Form::label('img_path','画像：') }}
        {{ Form::file('img_path') }}
        <div class="submit-btn">
            {{ Form::submit('送信',['class'=>'white']) }}
        </div>
    {{ Form::close() }}

    @foreach($opinions as $opinion)
    <div class="opinion">
        @if(!empty($opinion->user->name))
            @if($opinion->user->id === Auth::id())
                <div class="self-opinion">
                    <div class="opinion-contents">
                        <div class="opinion-content-myself">{!! nl2br(e($opinion->opinion)) !!}
                            @if(!empty($opinion->img_path))
                                <a href="{{ asset('uploads/' . $opinion->img_path) }}"><img src="{{ asset('uploads/'. $opinion->img_path )}}" alt="" class="self-opinion-img"></a>
                            @endif
                        </div>
                        
                        <p class="self-opinion-at small">{{ $opinion->created_at }}</p>
                    </div>
                    <div>
                        <a href="{{ route('user.show',[$opinion->user->id]) }}"><img class="opinion-profile-img" src="{{ asset('uploads/'. $opinion->user->profile_img ) }}" alt=""></a>
                        <p class="opinion-user">{{ $opinion->user->name }}</p>
                    </div>
                </div>
            @else
                <div>
                    <a href="{{ route('user.show',[$opinion->user->id]) }}"><img class="opinion-profile-img" src="{{ asset('uploads/'. $opinion->user->profile_img ) }}" alt=""></a>
                    <p class="opinion-user">{{ $opinion->user->name }}</p>
                </div>
                <div class="opinion-contents">
                    <div class="opinion-content">{!! nl2br(e($opinion->opinion)) !!}
                        @if(!empty($opinion->img_path))
                            <a href="{{ asset('uploads/' . $opinion->img_path) }}"><img src="{{ asset('uploads/'. $opinion->img_path )}}" alt="" class="opinion-img"></a>
                        @endif
                    </div>
                    
                    <p class="opinion-at small">{{ $opinion->created_at }}</p>
                </div>
            @endif

        @else
            @if($opinion === null)
                <p>議論を開始して下さい</p>
            @endif
        @endif
    </div>
    @endforeach

    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
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