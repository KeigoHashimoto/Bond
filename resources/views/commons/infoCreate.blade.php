<div class="welcome">
    <h1 class="center">add Infomation</h1>
    <p class="center">連絡事項を登録してください。<br>
    これはグループメンバーに表示されます。</p>
    <div class="schedule-form">
        {{ Form::open(['route'=>'info.post']) }}
            <div class="make-title">
                {{ Form::label('title','タイトル') }}
                {{ Form::text('title','【'.$office->name.'】',['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('info','内容') }}
                {{ Form::textarea('info',null,['class'=>'textarea']) }}
            </div>
            <div class="make-title">
                {{ Form::label('info','グループID') }}
                {{ Form::text('office_id',$office->id,['class'=>'form-control','readonly']) }}
            </div>

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
