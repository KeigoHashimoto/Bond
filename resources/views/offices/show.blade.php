@extends('layouts.app')

@section('content')

{{-- グループに加入しているか --}}
@if(\Auth::user()->is_joined($office->id))

<div class="flex">
    <h1 class="group-name">
         {{ $office->name }}</h1>
    <div class='downmenu-icon' v-on:click="sideSwitch = !sideSwitch"><i class="fas fa-caret-down"></i></div>
</div>

<div id="group" v-on:click="sideSwitch = false">

    {{-- mobile sidemenu --}}
    <div id="side-menu" v-show="sideSwitch">
        <div class="relative">
            <h1 class="center">Group Menu</h1>
            <div class="create-menu">
                <div class="group-menu-tabs">
                    <h2 v-on:click="activeTab = 'menbers',sideSwitch = !sideSwitch">group menbers</h2>
                    <h2 v-on:click="activeTab = 'discussion',sideSwitch = !sideSwitch">group discussion</h2>
                    <h2 v-on:click="activeTab = 'infomation',sideSwitch = !sideSwitch">group infomation</h2>        
                    <h2 v-on:click="activeTab = 'schedules',sideSwitch = !sideSwitch">group schedules</h2>    
                </div>
                <ul>
                    <li v-on:click="activeTab = '',sideSwitch = !sideSwitch">グループトップ</li>
                    <li v-on:click="activeTab = 'board',sideSwitch = !sideSwitch">議題の作成</li>
                    <li v-on:click="activeTab = 'info',sideSwitch = !sideSwitch">連絡事項の作成</li>
                    <li v-on:click="activeTab = 'schedule',sideSwitch = !sideSwitch">予定の作成</li>
                    <li v-on:click="activeTab = 'edit',sideSwitch = !sideSwitch">グループ情報の編集</li>
                    <li>
                        {{ link_to_route('table.index','リスト',[$office->id]) }}
                    </li>
                    <li>
                        {{ Form::open(['route'=>['office.delete',$office->id],'method'=>'delete']) }}
                            {{ Form::submit('グループの削除',['class'=>'delete-btn']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="group-contents" v-show="!sideSwitch">
        {{-- グループ内掲示板 --}}
        <div v-if="activeTab == 'board'">
            @include('commons.bulletinboardCreate')
        </div>

        {{-- グループ内連絡事項 --}}
        <div v-else-if="activeTab == 'info'">
            @include('commons.infoCreate')
        </div>
            
        {{-- グループ内スケジュール --}}
        <div v-else-if="activeTab == 'schedule'">
            @include('commons.schedulesCreate')
        </div>

        {{-- グループ情報の編集 --}}
        <div v-else-if="activeTab == 'edit'">
            @include('commons.groupEdit')
        </div>

        {{-- tabの選択無し --}}
        <div v-else>
            <h3 class="group-greet greet">Hello!<br>
            {{ $office->name }}のグループに加入しています。</h3>
            <p class="center">ここでの内容はグループメンバーのみに公開されます。</p>

            <div class="new-discussion" v-show="activeTab === ''" >
                <h2>最新の議論</h2>
                @foreach($boards as $board)
                    @if($board->office_id == $office->id)
                        <h4 class="center">{!! link_to_route('board.show',$board->title,[$board->id]) !!}</h4>
                    @endif
                @endforeach
            </div>

            <div class="group-menu">
                <div class="group-menu-contents">
                    <div class="group-menu-list" v-show="activeTab === 'menbers'">
                        @foreach($users as $user)
                            {!!  link_to_route('user.show',$user->name,[$user->id],['class'=>'group-member']) !!}
                        @endforeach
                    </div>

                    <div class="group-menu-list" v-show="activeTab === 'discussion'">
                        @foreach($users as $user)
                            @foreach($user->boards()->where('office_id',$office->id)->orderBy('created_at','desc')->get() as $board)
                                @if($board->office_id == $office->id)
                                    <p>{!! link_to_route('board.show',$board->title,[$board->id]) !!}</p>
                                @endif
                            @endforeach
                        @endforeach
                    </div>

                    <div class="group-menu-list" v-show="activeTab === 'infomation'">
                        @foreach($users as $user)
                            @foreach($user->infomations()->where('office_id',$office->id)->get() as $info)
                                <p>{!! link_to_route('info.show',$info->title,[$info->id]) !!}</p>
                            @endforeach
                        @endforeach
                    </div>

                    <div class="group-menu-list" v-show="activeTab === 'schedules'">
                        @foreach($users as $user)
                            @foreach($user->schedules()->where('office_id',$office->id)->get() as $schedule)
                                <p>{{ $schedule->date }} | {{ $schedule->time }} | {{ $schedule->content }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- desktop-sidemenu --}}

    <div id="sidemenu-desktop">
        <div class="relative">
            <h1 class="center">Group Menu</h1>
            <div class="create-menu">
                <div class="group-menu-tabs">
                    <h2 v-on:click="activeTab = 'menbers'">group menbers</h2>
                    <h2 v-on:click="activeTab = 'discussion'">group discussion</h2>
                    <h2 v-on:click="activeTab = 'infomation'">group infomation</h2>        
                    <h2 v-on:click="activeTab = 'schedules'">group schedules</h2>    
                </div>
                <ul>
                    <li v-on:click="activeTab = ''">グループトップ</li>
                    <li v-on:click="activeTab = 'board'">議題の作成</li>
                    <li v-on:click="activeTab = 'info'">連絡事項の作成</li>
                    <li v-on:click="activeTab = 'schedule'">予定の作成</li>
                    <li>
                        {{ link_to_route('table.index','リスト',[$office->id]) }}
                    </li>
                    <li v-on:click="activeTab = 'edit'">グループ情報の編集</li>
                    <li>
                        {{ Form::open(['route'=>['office.delete',$office->id],'method'=>'delete']) }}
                            {{ Form::submit('グループの削除',['class'=>'delete-btn']) }}
                        {{ Form::close() }}
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>

</div>

@else
    <p>正しいパスワードを入力してください。</p>
@endif

@endsection