<div class="home">
    <div class="user-form">
        <h1 class="center">議題の登録</h1>
        <p class="center">
        この掲示板はグループ内でしか公開されません。</p>
        <div class="board-form">
            {{ Form::open(['route'=>'board.post']) }}
                <div class="form-group">
                    {{ Form::label('title','タイトル',['class'=>"label"]) }}
                    {{ Form::text('title','【'.$office->name.'】',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('content','内容',['class'=>"label"]) }}
                    {{ Form::textarea('content',null,['class'=>'textarea']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('office_id','グループID',['class'=>"label"]) }}
                    {{ Form::text('office_id',$office->id,['class'=>'form-control','readonly']) }}
                </div>
                <div class="submit-btn">
                    {{ Form::submit('lets la done',['class'=>'white']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>