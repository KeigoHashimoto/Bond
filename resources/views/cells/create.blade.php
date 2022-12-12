<div class="tables">
    <div class="table-form">
        <div class="close" v-on:click="cellTab = !cellTab">×</div>
        <h1 class="center">add Table</h1>
        <p class="center">表の内容を作成します。<br/>
        見出しに対応した内容を記入してください。</p>
        {{ Form::open(['route'=>['cell.store',$table->id]]) }}
            <div class="make-title">
                {{ Form::label('content1','内容１') }}
                {{ Form::text('content1',null,['class'=>'form-control','placeholder' =>$table->head1."の内容"]) }}
            </div>
            <div class="make-title">
                {{ Form::label('content2','内容２') }}
                {{ Form::text('content2',null,['class'=>'form-control','placeholder' =>$table->head2."の内容"]) }}
            </div>
            <div class="make-title">
                {{ Form::label('content3','内容３') }}
                {{ Form::text('content3',null,['class'=>'form-control','placeholder' =>$table->head3."の内容"]) }}
            </div>
            <div class="make-title">
                {{ Form::label('content4','内容４') }}
                {{ Form::text('content4',null,['class'=>'form-control','placeholder' =>$table->head4."の内容"]) }}
            </div>
            <div class="make-title">
                {{ Form::label('content5','内容５') }}
                {{ Form::text('content5',null,['class'=>'form-control','placeholder' =>$table->head5."の内容"]) }}
            </div>

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>