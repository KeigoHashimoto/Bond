<div class="tables">
    <div class="tables-form">
        <div class="close" v-on:click="tableTab = !tableTab">×</div>
        <h1 class="center">add Table</h1>
        <p class="center">表の見出しを作成します。<br/>
        最大5個の見出しを作れます。</p>
        {{ Form::open(['route'=>['table.store',$office->id]]) }}
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
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>