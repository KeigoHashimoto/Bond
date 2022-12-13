<div class="home">
    <div class="user-form">
        <h2 class="center">予定を登録</h2>

        <p class="small center">決まっている予定を登録してください。<br>間違いがないように確認してから登録してください。</p>
    
        {{ Form::open(['route'=>['schedule.post']]) }}
            <div class="form-group">
                {{ Form::label('date','日時',['class'=>'label']) }}
                {{ Form::date('date',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('time','時間',['class'=>'label']) }}
                {{ Form::text('time',null,['class'=>'form-control','placeholder'=>'ex) 14:00 ']) }}
            </div>
            <div class="form-group">
                {{ Form::label('content','内容',['class'=>'label']) }}
                {{ Form::text('content',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('office_id','グループID',['class'=>'label']) }}
                @if(!empty($office->id))
                    {{ Form::text('office_id',$office->id,['class'=>'form-control','readonly']) }}
                @else
                    {{ Form::text('office_id',null,['class'=>'form-control','readonly']) }}
                @endif
            </div>

            <div class="submit-btn">
                {{ Form::submit('regist',['class'=>'white']) }}
            </div>
        {{ Form::close() }}

    </div>
</div>