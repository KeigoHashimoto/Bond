<div class="mine">
    @if(!$myBoards->isEmpty())
        @foreach ($myBoards as $board)
            @if(!empty($board->office_id))
                <div class="board-title-card">
                    <div class="small-content">
                        <p class="small">{{ $board->user->name}}</p>
                        <p class="small">{{ $board->office->name }}</p>
                    </div>
                    <div>
                        {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                    </div>
                    <p class="small">{{ $board->created_at }}</p>


                    @if(\Auth::id() === 1)
                        <div id="admin">admin btns</div>

                        <div id="admin-btns">
                            {{ Form::open(['route'=>['board.delete',$board->id],'method'=>'delete']) }}
                                {{ Form::submit('削除',['class'=>'delete']) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="board-title-card">
                    <div class="small-content">
                        <p class="small">{{ $board->user->name}}</p>
                    </div>
                    <div>
                        {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                    </div>
                    <p class="small">{{ $board->created_at }}</p>


                    @if(\Auth::id() === 1)
                        <div id="admin">admin btns</div>

                        <div id="admin-btns">
                            {{ Form::open(['route'=>['board.delete',$board->id],'method'=>'delete']) }}
                                {{ Form::submit('削除',['class'=>'delete']) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
            @endif
        @endforeach
    @else
        <p class="center">{{ $user->name }}さんはまだ議論を投稿していません</p>
    @endif
</div>