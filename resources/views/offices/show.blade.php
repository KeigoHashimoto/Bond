@extends('layouts.app')

@section('content')
@if(\Auth::user()->is_joined($office->id))
    <h1>group menbers</h1>
        @foreach($users as $user)
            <p>{{ $user->name }}</p>
        @endforeach

    <h1>group discussion</h1>
        @foreach($users as $user)
            @foreach($user->boards()->get() as $board)
                @if($board->office_id == $office->id)
                    {!! link_to_route('board.show',$board->title,[$board->id]) !!}
                @endif
            @endforeach
        @endforeach

        <h1 class="center">議題の登録</h1>
        <p class="center">グループ内で話し合いたいことを簡潔に記入して下さい。<br>
        この掲示板はグループ内でしか公開されません。</p>
        <div class="board-form">
            {{ Form::open(['route'=>'board.post']) }}
                <div class="make-title">
                    {{ Form::label('title','タイトル') }}
                    {{ Form::text('title',null,['class'=>'form-control']) }}
                </div>
                <div class="make-title">
                    {{ Form::label('content','内容') }}
                    {{ Form::textarea('content',null,['class'=>'textarea']) }}
                </div>
                <div class="make-title">
                    {{ Form::label('office_id','グループID') }}
                    {{ Form::text('office_id',$office->id,['class'=>'form-control']) }}
                </div>
                <div class="submit-btn">
                    {{ Form::submit('lets la done',['class'=>'white']) }}
                </div>
            {{ Form::close() }}
        </div>
@else
    <p>正しいパスワードを入力してください。</p>
@endif

@endsection