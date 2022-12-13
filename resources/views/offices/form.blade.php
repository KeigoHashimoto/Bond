@extends('layouts.app')

@section('content')
<div class="home">
    <div class="user-form">
        <h2 class="center">グループの登録</h2>
        <p class="center">グループを作成してください。<br>
        グループに所属することでグループ内だけのやり取りをすることができます。</p>
        <div class="board-form">
            {{ Form::open(['route'=>'office.post']) }}
                <div class="form-group">
                    {{ Form::label('name','グループ名') }}
                    {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'グループ名を決めてください']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password','パスワード') }}
                    {{ Form::password('password',['class'=>'form-control','placeholder'=>'パスワードを設定してください']) }}
                </div>
    
                <div class="submit-btn">
                    {{ Form::submit('make group',['class'=>'white']) }}
                </div>
    
            {{ Form::close() }}
        </div>
        
        {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
    </div>
</div>

@endsection