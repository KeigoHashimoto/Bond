@extends('layouts.app')

@section('content')

@if(\Auth::user()->is_joined($office->id))
<div class="flex">
    <h1 class="group-name">
         {{ $office->name }}</h1>

    <div class='downmenu-icon' v-on:click="sideSwitch = !sideSwitch"><i class="fas fa-caret-down"></i></div>
</div>


<div id="group">
    <div id="group-contents">
        <div v-if="activeTab == 'board'">
            @include('commons.bulletinboardCreate')
        </div>

        <div v-else-if="activeTab == 'info'">
            @include('commons.infoCreate')
        </div>
            
        <div v-else-if="activeTab == 'schedule'">
            @include('commons.schedulesCreate')
        </div>

        <div v-else>
            <h2 class="group-greet">Hello!<br>
            {{ $office->name }}のグループに加入しています。</h2>
            <p>ここでの内容はグループメンバーのみに公開されます。</p>
        </div>
    </div>

    <div id="side-menu">
        <div class="relative" 
        v-bind:class="{sideSwitch:sideSwitch}">
            <div class="group-menu">
                <h1 class="center">Group Menu</h1>
                <h2 v-on:click="onOff1 = !onOff1">group menbers</h2>
                <div class="group-menu-list" v-bind:class='{switchActive:onOff1}'>
                    @foreach($users as $user)
                        <p>{{ $user->name }}</p>
                    @endforeach
                </div>
        
                <h2 v-on:click="onOff2 = !onOff2">group discussion</h2>
                <div class="group-menu-list" v-bind:class='{switchActive:onOff2}'>
                    @foreach($users as $user)
                        @foreach($user->boards()->where('office_id',$office->id)->get() as $board)
                            @if($board->office_id == $office->id)
                                <p>{!! link_to_route('board.show',$board->title,[$board->id]) !!}</p>
                            @endif
                        @endforeach
                    @endforeach
                </div>

                <h2 v-on:click="onOff3 = !onOff3">group infomation</h2>
                <div class="group-menu-list" v-bind:class='{switchActive:onOff3}'>
                    @foreach($users as $user)
                        @foreach($user->infomations()->where('office_id',$office->id)->get() as $info)
                            <p>{!! link_to_route('info.show',$info->title,[$info->id]) !!}</p>
                        @endforeach
                    @endforeach
                </div>
        
                <h2 v-on:click="onOff4 = !onOff4">group schedules</h2>
                <div class="group-menu-list" v-bind:class='{switchActive:onOff4}'>
                    @foreach($users as $user)
                        @foreach($user->schedules()->where('office_id',$office->id)->get() as $schedule)
                            <p>{{ $schedule->date }} | {{ $schedule->time }} | {{ $schedule->content }}</p>
                        @endforeach
                    @endforeach
                </div>
            </div>
            
            <div class="create-menu">
                <ul>
                    <li v-on:click="activeTab = '',sideSwitch = !sideSwitch">グループトップ</li>
                    <li v-on:click="activeTab = 'board',sideSwitch = !sideSwitch">議題の作成</li>
                    <li v-on:click="activeTab = 'info',sideSwitch = !sideSwitch">連絡事項の作成</li>
                    <li v-on:click="activeTab = 'schedule',sideSwitch = !sideSwitch">予定の作成</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@else
    <p>正しいパスワードを入力してください。</p>
@endif

@endsection