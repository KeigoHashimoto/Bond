@extends('layouts.adminApp')

@section('content')
@if(Auth::id() === 1)
<div class="admin">
    <div class="main">
        <div><a class="white" href="{{ route('admin.home') }}">管理者メニュー</a></div>
        {{-- 掲示板検索 --}}
        <div>
            {{ Form::open(['route'=>'admin.home','method'=>'get']) }}
                <div class="admin-board-sarch">
                    {{ Form::text('sarch',null,['class'=>'form-control']) }}
                    {{ Form::submit('検索',['class'=>'sarch-btn']) }}
                </div>
            {{ Form::close() }}
        </div>
        {{ Form::open(['route'=>'admin.logout']) }}
            {{ Form::submit('logout',['class'=>'submit-btn']) }}
        {{ Form::close() }}
        <div class="admin-space">
            <h1 class="center">UserList</h1>
            @foreach($users as $user)
                <p>{{ $user->id }}: {{ $user->name }}: {{ $user->email }}</p>
            @endforeach
        </div>
        <div class="admin-space">
            <h1 class="center">Discussion Board</h1>
            @if($boards->isEmpty())
                <p class="center empty">まだボードがありません。</p>
            @else
                @foreach ($boards as $board)
                <div class="flex">
                    <p>{{ $board->title }}</p>
                    {{ Form::open(['route'=>['admin.board.delete',$board->id],'method'=>'delete']) }}
                        {{ Form::submit('削除',['class'=>'delete']) }}
                    {{ Form::close() }}
                </div>
                @endforeach
            @endif
        </div>
        <div class="admin-space">
            <h1 class="center">Admin add Infomation</h1>
            <p class="center">連絡事項を登録してください。</p>
            <div class="schedule-form">
                {{ Form::open(['route'=>'admin.info.post']) }}
                    <div class="make-title">
                        {{ Form::label('title','タイトル') }}
                        {{ Form::text('title','【管理者より】',['class'=>'form-control']) }}
                    </div>
                    <div class="make-title">
                        {{ Form::label('info','内容') }}
                        {{ Form::textarea('info',null,['class'=>'textarea']) }}
                    </div>
                    <div class="make-title">
                        {{ Form::label('info','グループID') }}
                        {{ Form::text('office_id',null,['class'=>'form-control','readonly']) }}
                    </div>
        
                    <div class="submit-btn">
                        {{ Form::submit('regist',['class'=>'white']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="admin-space">
            <h1 class="center">Group index</h1>
            @foreach($offices as $office)
            <div class="flex">
                <p>{{ $office->name }}</p>
                {{ Form::open(['route'=>['admin.office.delete',$office->id],'method'=>'delete']) }}
                    {{ Form::submit('削除',['class'=>'delete']) }}
                {{ Form::close() }}
            </div>
            @endforeach
        </div>
    </div>
</div>


@endif

@endsection