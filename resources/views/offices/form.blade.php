@extends('layouts.app')

@section('content')
<div class="welcome">
    <h1 class="center">グループの登録</h1>
    <p class="center">グループを作成してください。<br>
    グループに所属することでグループ内だけのやり取りをすることができます。</p>
    <div class="board-form">
        {{ Form::open(['route'=>'office.post']) }}
            <div class="make-title">
                {{ Form::label('name','グループ名') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('password','パスワードの設定') }}
                {{ Form::password('password',['class'=>'form-control']) }}
            </div>

            <div class="submit-btn">
                {{ Form::submit('make group',['class'=>'white']) }}
            </div>

        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>

@endsection