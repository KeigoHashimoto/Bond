@extends('layouts.app')

@section('content')

<div class="tables">
    <div class="user-form">
        <h1 class="center">Edit Cell</h1>
        <p class="center">表の内容を編集します。。</p>
        {{ Form::model($cell,['route'=>['cell.update',$cell->id],'method'=>'put']) }}
            @if(!empty($cell->content1))
                <div class="form-group">
                    {{ Form::label('content1','内容１',['class' => 'label']) }}
                    {{ Form::text('content1',null,['class'=>'form-control','placeholder' =>$cell->table->head1."の内容"]) }}
                </div>
            @endif

            @if(!empty($cell->content2))
                <div class="form-group">
                    {{ Form::label('content2','内容２',['class' => 'label']) }}
                    {{ Form::text('content2',null,['class'=>'form-control','placeholder' =>$cell->table->head2."の内容"]) }}
                </div>
            @endif

            @if(!empty($cell->content3))
                <div class="form-group">
                    {{ Form::label('content3','内容３',['class' => 'label']) }}
                    {{ Form::text('content3',null,['class'=>'form-control','placeholder' =>$cell->table->head3."の内容"]) }}
                </div>
            @endif

            @if(!empty($cell->content4))
                <div class="form-group">
                    {{ Form::label('content4','内容４',['class' => 'label']) }}
                    {{ Form::text('content4',null,['class'=>'form-control','placeholder' =>$cell->table->head4."の内容"]) }}
                </div>
            @endif

            @if(!empty($cell->content5))
                <div class="form-group">
                    {{ Form::label('content5','内容５',['class' => 'label']) }}
                    {{ Form::text('content5',null,['class'=>'form-control','placeholder' =>$cell->table->head5."の内容"]) }}
                </div>
            @endif

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('table.show','一覧に戻る',[$cell->table->id],['class'=>'center']) !!}
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>

@endsection