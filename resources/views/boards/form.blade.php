@extends('layouts.app')

@section('content')
<div class="home">
    <div class="user-form">
        <h1 class="center">議題の登録</h1>
        <p class="center">話し合いたいことを簡潔に記入して下さい。<br>
        掲示板を作成し、意見交換を行いましょう。</p>
        <div class="board-form">
            {{ Form::open(['route'=>'board.post']) }}
                <div class="form-group">
                    {{ Form::label('title','タイトル',['class' => 'label']) }}
                    {{ Form::text('title',null,['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('content','内容',['class' => 'label']) }}
                    {{ Form::textarea('content',null,['class'=>'form-control']) }}
                </div>
    
                <div class="submit-btn">
                    {{ Form::submit('lets la done',['class'=>'white']) }}
                </div>
    
            {{ Form::close() }}
        </div>
        
        {!! link_to_route('home','topに戻る',[],['class'=>'center small']) !!}
    </div>
</div>
@endsection