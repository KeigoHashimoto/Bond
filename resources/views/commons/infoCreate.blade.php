<div class="home">
    <div class="user-form">
        <h1 class="center">add Infomation</h1>
        <p class="center">連絡事項を登録してください。<br>
        これはグループメンバーに表示されます。</p>
        <div class="schedule-form">
            {{ Form::open(['route'=>'info.post']) }}
                <div class="form-group">
                    {{ Form::label('title','タイトル',['class'=>"label"]) }}
                    {{ Form::text('title','【'.$office->name.'】',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('info','内容',['class'=>"label"]) }}
                    {{ Form::textarea('info',null,['class'=>'textarea']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('info','グループID',['class'=>"label"]) }}
                    {{ Form::text('office_id',$office->id,['class'=>'form-control','readonly']) }}
                </div>
    
                <div class="submit-btn">
                    {{ Form::submit('regist',['class'=>'white']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
