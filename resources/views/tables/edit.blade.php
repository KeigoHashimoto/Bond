@extends('layouts.app')

@section('content')
<div class="tables">
    <div class="user-form">
        <div class="close" v-on:click="tableEdit = false">×</div>
        <h1 class="center">Add Table</h1>
        <p class="center">表の見出しを編集します。</p>
        {{ Form::model($table,['route'=>['table.update',$table->id],'method'=>'put']) }}
            <div class="form-group">
                {{ Form::label('title','表のタイトル',['class' =>'label']) }}
                {{ Form::text('title',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('discription','表の説明(任意)',['class' =>'label']) }}
                {{ Form::text('discription',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('head1','見出し１',['class' =>'label']) }}
                {{ Form::text('head1',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('head2','見出し２',['class' =>'label']) }}
                {{ Form::text('head2',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('head3','見出し３',['class' =>'label']) }}
                {{ Form::text('head3',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('head4','見出し４',['class' =>'label']) }}
                {{ Form::text('head4',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('head5','見出し５',['class' =>'label']) }}
                {{ Form::text('head5',null,['class'=>'form-control']) }}
            </div>

            <div class="submit-btn">
                {{ Form::submit('edit',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    {!! link_to_route('table.index','表に戻る',[$table->office->id],['class'=>'center']) !!}
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>
@endsection
