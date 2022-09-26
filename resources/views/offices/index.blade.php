@extends('layouts.app')

@section('content')
<div class="group">
    <h1 class="center">グループ一覧</h1>

    @if($offices->isEmpty())
        <p class="center empty">まだグループがありません。</p>
    @else
        @foreach($offices as $office)
            @if(\Auth::user()->is_joined($office->id))
                <div class="group-gate">
                    {!! link_to_route('office.show',$office->name,[$office->id],['class'=>'joined-group']) !!}
                </div>
            @else
                
                {{ Form::open(['route'=>['office.show',$office->id],'method'=>'get']) }}
                    <div class="group-gate">
                        <p class="group-label">{{ $office->name }} :</p>
                        {{ Form::text('password',null,['class'=>'group-input','placeholder'=>'パスワードを入力']) }}
                        {{ Form::submit('join',['class'=>'group-btn']) }}
                    </div>
                {{ Form::close() }}
                
            @endif
        @endforeach
    @endif
</div>
@endsection

