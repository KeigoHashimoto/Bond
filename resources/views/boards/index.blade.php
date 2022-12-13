@extends('layouts.app')

@section('content')
<div class="board">
    <div class="contents-width">
        <h1 class="title">Discussion Board</h1>
        
        @if($boards->isEmpty())
            <p class="center empty">まだボードがありません。</p>
            <p class="center">ユーザー全員に公開される掲示板です。<br>
            右下のアイコンからボードを作成してください。</p>
        @else
            @foreach ($boards as $board)
                @if(empty($board->office_id))
                    <div class="board-title-card">
                        <div class="small-content">
                            <p class="small">{{ $board->user->name}}</p>
                            <p class="small">{{ $board->created_at }}</p>
                        </div>
                        <div>
                            {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    
        {!! link_to_route('home','topへ',[],['class'=>'block center small']) !!}
    
        <a  class="add" href={{ route('board.form') }} ><i  class="fas fa-plus-square"></i></a>
    
    </div>
</div>


@endsection