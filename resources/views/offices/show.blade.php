@extends('layouts.app')

@section('content')

{{-- グループに加入しているか --}}
@if(\Auth::user()->is_joined($office->id))

    <div class="group-show">
        <div class="contents-width">
            <div class="group-name-wrap">
                <h2 class="group-name title">
                    {{ $office->name }}
                </h2>
                <div class='downmenu-icon' v-on:click="sideSwitch = !sideSwitch"><i class="fas fa-caret-down"></i></div>
            </div>
        
            <div id="group" v-on:click="sideSwitch = false">
                {{-- desktop-sidemenu --}}
                <div id="sidemenu-desktop">
                    <div class="group-menu-tabs">
                        <h3 v-on:click="activeTab = ''">TOP</h3> 
                        <h3 v-on:click="activeTab = 'menbers'">Menbers</h3>
                        <h3 v-on:click="activeTab = 'discussion'">Discussion</h3>
                        <h3 v-on:click="activeTab = 'infomation'">Infomation</h3>        
                        <h3 v-on:click="activeTab = 'schedules'">Schedules</h3>
                        <h3>
                            {{ link_to_route('table.index','Table',[$office->id],['class'=>'table-link']) }}
                        </h3>  
                         
                    </div>
                    <ul>
                        
                        <li v-on:click="activeTab = 'board'">議題の作成</li>
                        <li v-on:click="activeTab = 'info'">連絡事項の作成</li>
                        <li v-on:click="activeTab = 'schedule'">予定の作成</li>
                        
                        <li v-on:click="activeTab = 'edit'">グループ情報の編集</li>
                        <li>
                            {{ Form::open(['route'=>['office.delete',$office->id],'method'=>'delete']) }}
                                {{ Form::submit('グループの削除',['class'=>'delete']) }}
                            {{ Form::close() }}
                        </li>
                        
                    </ul>
                </div>
        
                {{-- mobile sidemenu --}}
                <div id="side-menu" v-show="sideSwitch">
                    <div class="relative">
                        <h1 class="center">Group Menu</h1>
                        <div class="create-menu">
                            <div class="group-menu-tabs">
                                <h2 v-on:click="activeTab = 'menbers',sideSwitch = !sideSwitch">Menbers</h2>
                                <h2 v-on:click="activeTab = 'discussion',sideSwitch = !sideSwitch">Discussion</h2>
                                <h2 v-on:click="activeTab = 'infomation',sideSwitch = !sideSwitch">Infomation</h2>        
                                <h2 v-on:click="activeTab = 'schedules',sideSwitch = !sideSwitch">Schedules</h2>    
                            </div>
                            <ul>
                                <li v-on:click="activeTab = '',sideSwitch = !sideSwitch">グループトップ</li>
                                <li v-on:click="activeTab = 'board',sideSwitch = !sideSwitch">議題の作成</li>
                                <li v-on:click="activeTab = 'info',sideSwitch = !sideSwitch">連絡事項の作成</li>
                                <li v-on:click="activeTab = 'schedule',sideSwitch = !sideSwitch">予定の作成</li>
                                <li v-on:click="activeTab = 'edit',sideSwitch = !sideSwitch">グループ情報の編集</li>
                                <li>
                                    {{ link_to_route('table.index','リスト',[$office->id],['class'=>'white']) }}
                                </li>
                                <li>
                                    {{ Form::open(['route'=>['office.delete',$office->id],'method'=>'delete']) }}
                                        {{ Form::submit('グループの削除',['class'=>'delete']) }}
                                    {{ Form::close() }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        
                <div id="group-contents" v-show="!sideSwitch">
                    {{-- tabの選択無し --}}
                    <div v-else>
                        <h3 class="greet">Hello!<br>
                            {{ $office->name }}のグループに加入しています。
                        </h3>
                        <p class="center">ここでの内容はグループメンバーのみに公開されます。</p>
        
                        <div class="new-discussion" v-show="activeTab === ''" >
                            <h2 class="sub-title">最新の議論</h2>
                            @if($boards->isEmpty())
                                <p>まだ議論がありません。</p>
                            @else
                                @foreach($boards as $board)
                                    @if($board->office_id == $office->id)
                                        {!! link_to_route('board.show',$board->title,[$board->id],['class' => 'group-content']) !!}
                                    @endif
                                @endforeach
                            @endif
                        </div>
        
                        <div class="group-menu">
                            <div class="group-menu-contents">
                                {{-- メンバー --}}
                                <div class="group-menu-list" v-show="activeTab === 'menbers'">
                                    <h2 class="sub-title">グループメンバー</h2>
                                    @foreach($users as $user)
                                        <div class="member">
                                            <p>{{ $user->name }}</p>
                                            {!!  link_to_route('user.show','プロフィール',[$user->id],['class'=>'group-member']) !!}
                                        </div>
                                    @endforeach
                                </div>
        
                                {{-- グループ内の議論 --}}
                                <div class="group-menu-list" v-show="activeTab === 'discussion'">
                                    <h2 class="sub-title">グループ内の議論</h2>
                                    
                                    @foreach($users as $user)
                                        @foreach($user->boards()->where('office_id',$office->id)->orderBy('created_at','desc')->get() as $board)
                                            @if($board->office_id == $office->id)
                                                @foreach($boards as $board)
                                                    @if($board->office_id == $office->id)
                                                        <h4>{!! link_to_route('board.show',$board->title,[$board->id],['class' => 'group-content']) !!}</h4>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
        
                                {{-- グループ内のインフォメーション --}}
                                <div class="group-menu-list" v-show="activeTab === 'infomation'">
                                    <h2 class="sub-title">グループ内の連絡事項</h2>
                                    @foreach($users as $user)
                                        @foreach($user->infomations()->where('office_id',$office->id)->get() as $info)
                                            <p>{!! link_to_route('info.show',$info->title,[$info->id],['class'=>'group-content']) !!}</p>
                                        @endforeach
                                    @endforeach
                                </div>
        
                                {{-- グループ内のスケジュール --}}
                                <div class="group-menu-list" v-show="activeTab === 'schedules'">
                                    <h2 class="sub-title">グループ内のスケジュール</h2>
                                    @foreach($users as $user)
                                        @foreach($user->schedules()->where('office_id',$office->id)->get() as $schedule)
                                            <p class="group-content">{{ $schedule->date }} | {{ $schedule->time }} | {{ $schedule->content }}</p>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
        
                    
                </div>
            </div>
        </div>
    </div>

@else
    <p>正しいパスワードを入力してください。</p>
@endif

@endsection