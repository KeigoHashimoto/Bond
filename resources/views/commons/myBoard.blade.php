<div class="my-board">
    {{-- 自分の投稿した議論があるかどうか --}}
    @if(!$myBoards->isEmpty())
        @foreach ($myBoards as $board)

            {{-- グループで投稿された議論かどうか --}}
            @if(!empty($board->office_id))

                {{-- 議論のグループに自分が所属しているか --}}
                @if(Auth::user()->is_joined($board->office_id))
                    <div class="board-title-card">
                        <div class="small-contents">
                            <p class="small">作成者：{{ $board->user->name}}</p>
                            <p class="small">発信元：{{ $board->office->name }}</p>
                        </div>
                        
                        {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                        
                        <p class="small">{{ $board->created_at }}</p>
                    </div>
                @else
                    <div class="board-title-card">
                        <p class="board-title">加入していないグループの投稿</p>
                    </div>
                @endif
            @else
                <div class="board-title-card">
                    <div class="small-content">
                        <p class="small">作成者：{{ $board->user->name}}</p>
                    </div>
                    <div>
                        {!! link_to_route('board.show',$board->title,[$board->id],['class'=>'board-title']) !!}
                    </div>
                    <p class="small">{{ $board->created_at }}</p>
                </div>
            @endif
        @endforeach
    @else
        <p class="center">{{ $user->name }}さんはまだ議論を投稿していません</p>
    @endif
</div>