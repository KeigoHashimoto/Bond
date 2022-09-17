<div class="mine">
    @if(!$myBoards->isEmpty())
        @foreach ($myBoards as $board)
            <div class="board-title-card">
                <div class="small-content">
                    <p class="small">{{ $board->user->name}}</p>
                    <p class="small">{{ $board->created_at }}</p>
                </div>
                <div>
                    {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                </div>

                @if(\Auth::id() === 1)
                    {{ Form::open(['route'=>['board.delete',$board->id],'method'=>'delete']) }}
                        {{ Form::submit('削除',['class'=>'delete']) }}
                    {{ Form::close() }}
                @endif
            </div>
        @endforeach
    @else
        <p class="center">{{ \Auth::user()->name }}さんはまだ議論を投稿していません</p>
    @endif
</div>