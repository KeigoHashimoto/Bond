<div class="infomation">
    @if($infos->isEmpty())
        <p class="center empty">まだ連絡事項がありません</p>
    @else
        @foreach ($infos as $info)
            <div class="info-wrap">
                <p class="small">{{ $info->created_at }}</p>
                @if(Auth::user()->is_already($info->id))
                    {!! link_to_route('info.show',$info->title,[$info->id]) !!}
                @else
                    {!! link_to_route('info.show',$info->title,[$info->id],['class'=>'yet']) !!}
                @endif
            </div>
        @endforeach
    @endif

    {{ $infos->links() }}
</div>