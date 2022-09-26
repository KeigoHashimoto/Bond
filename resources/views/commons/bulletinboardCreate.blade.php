<div class="welcome">
    <h1 class="center">議題の登録</h1>
    <p class="center">
    この掲示板はグループ内でしか公開されません。</p>
    <div class="board-form">
        {{ Form::open(['route'=>'board.post']) }}
            <div class="make-title">
                {{ Form::label('title','タイトル') }}
                {{ Form::text('title','【'.$office->name.'】',['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('content','内容') }}
                {{ Form::textarea('content',null,['class'=>'textarea']) }}
            </div>
            <div class="make-title">
                {{ Form::label('office_id','グループID') }}
                {{ Form::text('office_id',$office->id,['class'=>'form-control','readonly']) }}
            </div>
            <div class="submit-btn">
                {{ Form::submit('lets la done',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>