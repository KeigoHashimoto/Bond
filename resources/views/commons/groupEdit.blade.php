<div class="welcome">
    <h1 class="center">グループの編集</h1>
    <p class="center">
        グループ情報を編集してください。
    </p>

    <div class="edit-form">
        {{ Form::model($office,['route'=>['office.update',$office->id],'method'=>'put']) }}
            <div class="make-title">
                {{ Form::label('name','グループ名') }}
                {{ Form::text('name',null,['class'=>'form-control']) }}
            </div>
            <div class="make-title">
                {{ Form::label('password','パスワードの設定') }}
                {{ Form::password('password',['class'=>'form-control']) }}
            </div>

            <div class="submit-btn">
                {{ Form::submit('make group',['class'=>'white']) }}
            </div>
        {{ Form::close() }}
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
    {!! link_to_route('office.show','グループに戻る',[$office->id],['class'=>'center']) !!}
</div>