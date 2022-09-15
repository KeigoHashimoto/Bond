@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">Discussion Board</h1>
    
    @if($boards->isEmpty())
        <p class="center empty">まだボードがありません。</p>
    @else
        @foreach ($boards as $board)
            <div class="board-title-card">
                <div class="small-content">
                    <p class="small">{{ $board->user->name}}</p>
                    <p class="small">{{ $board->created_at }}</p>
                </div>
                <div>
                    {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                </div>
            </div>
        @endforeach
    @endif

    {!! link_to_route('home','topへ',[],['class'=>'block center']) !!}
</div>


<div class="add">{!! link_to_route('board.create','+',[],['class'=>'add-icon']) !!}</div>
@endsection