@extends('layouts.app')

@section('content')

@if(\Auth::user()->is_joined($office->id))
    <h1 class="center">{{ $office->name }}</h1>

<div id="group">
    <div id="group-contents">
        <div v-show="activeTab == 'board'">
            @include('commons.bulletinboardCreate')
        </div>

        <div v-show="activeTab == 'info'">
            @include('commons.infoCreate')
        </div>
            
        <div v-show="activeTab == 'schedule'">
            @include('commons.schedulesCreate')
        </div>

    </div>

    <div id="side-menu">
        <h1 v-on:click="titleTab = 'menber'">group menbers</h1>
        <div v-show="titleTab === 'menber'">
            @foreach($users as $user)
                <p>{{ $user->name }}</p>
            @endforeach
        </div>

        <h1 v-on:click="titleTab = 'board'">group discussion</h1>
        <div v-show="titleTab === 'board'">
            @foreach($users as $user)
                @foreach($user->boards()->where('office_id',$office->id)->get() as $board)
                    @if($board->office_id == $office->id)
                        {!! link_to_route('board.show',$board->title,[$board->id]) !!}
                    @endif
                @endforeach
            @endforeach
        </div>

        <h1 v-on:click="titleTab = 'info'">group infomation</h1>
        <div v-show="titleTab === 'info'">
            @foreach($users as $user)
                @foreach($user->infomations()->where('office_id',$office->id)->get() as $info)
                    {!! link_to_route('info.show',$info->title,[$info->id]) !!}
                @endforeach
            @endforeach
        </div>

        <h1 v-on:click="titleTab = 'schedule'">group schedules</h1>
        <div v-show="titleTab === 'schedule'">
            @foreach($users as $user)
                @foreach($user->schedules()->where('office_id',$office->id)->get() as $schedule)
                    <p>{{ $schedule->date }} | {{ $schedule->time }} | {{ $schedule->content }}</p>
                @endforeach
            @endforeach
        </div>
        

        <div>
            <ul>
                <li v-on:click="activeTab = 'board'">議題の作成</li>
                <li v-on:click="activeTab = 'info'">連絡事項の作成</li>
                <li v-on:click='activeTab = "schedule"'>予定の作成</li>
            </ul>
        </div>
    </div>

    

</div>

@else
    <p>正しいパスワードを入力してください。</p>
@endif

@endsection