@extends('layouts.app')

@section('content')
<div class="group-index">
    <div class="contents-width">
        <h2 class="center title">Groups</h2>
    
        <div class="group-sarch-wrap">
            {{ Form::open(['route'=>'office.index','method'=>'get','class'=>'sarch']) }}
                {{ Form::button('<i class="fas fa-search"></i>',['type'=>'submit','class'=>'sarch-btn']) }}
                {{ Form::text('office_keyword',null,['placeholder'=>'グループを検索','class'=>'sarch-input']) }}
            {{ Form::close() }}
    
        </div>
    
        @if($offices->isEmpty())
            <p class="center empty">まだグループがありません。</p>
        @else
            @foreach($offices as $office)
                @if(\Auth::user()->is_joined($office->id))
                    <div class="group-gate">
                        {{-- {{ $office->user->name }} --}}
                        {!! link_to_route('office.show',$office->name,[$office->id],['class'=>'joined-group']) !!}
                    </div>
                @else
                    
                    {{ Form::open(['route'=>['office.show',$office->id],'method'=>'get']) }}
                        <div class="group-gate-yet">
                            <p class="group-label">{{ $office->name }} :</p>
                            <div class="group-affiliation-form">
                                {{ Form::password('password',['class'=>'group-input','placeholder'=>'パスワードを入力']) }}
                                {{ Form::submit('join',['class'=>'group-btn']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                    
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection

