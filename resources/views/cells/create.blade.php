<div class="tables">
    <div class="tables-form">
        <div class="close" v-on:click="cellTab = !cellTab">×</div>
        <h1 class="center">Add Cell</h1>
        <p class="center">表の内容を作成します。<br/>
        見出しに対応した内容を記入してください。</p>
        {{ Form::open(['route'=>['cell.store',$table->id]]) }}
        @if(!empty($table->head1))
            <div class="form-group">
                {{ Form::label('content1','内容１',['class' => 'label']) }}
                {{ Form::textarea('content1',null,['class'=>'form-control','placeholder' =>$table->head1."の内容"]) }}
            </div>
        @endif
        
        @if(!empty($table->head2))
            <div class="form-group">
                {{ Form::label('content2','内容２',['class' => 'label']) }}
                {{ Form::textarea('content2',null,['class'=>'form-control','placeholder' =>$table->head2."の内容"]) }}
            </div>
        @endif

        @if(!empty($table->head3))
            <div class="form-group">
                {{ Form::label('content3','内容３',['class' => 'label']) }}
                {{ Form::textarea('content3',null,['class'=>'form-control','placeholder' =>$table->head3."の内容"]) }}
            </div>
        @endif
        
        @if(!empty($table->head4))
            <div class="form-group">
                {{ Form::label('content4','内容４',['class' => 'label']) }}
                {{ Form::textarea('content4',null,['class'=>'form-control','placeholder' =>$table->head4."の内容"]) }}
            </div>
        @endif

        @if(!empty($table->head5))
            <div class="form-group">
                {{ Form::label('content5','内容５',['class' => 'label']) }}
                {{ Form::textarea('content5',null,['class'=>'form-control','placeholder' =>$table->head5."の内容"]) }}
            </div>
        @endif

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
</div>