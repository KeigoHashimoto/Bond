<div class="home">
    <div class="user-form">
        <h1 class="center">グループの編集</h1>
        <p class="center">
            グループ情報を編集してください。
        </p>
    
        <div class="edit-form">
            {{ Form::model($office,['route'=>['office.update',$office->id],'method'=>'put']) }}
                <div class="edit-wrap">
                    <div class="form-group">
                        {{ Form::label('name','グループ名',['class'=>"label"]) }}
                        {{ Form::text('name',null,['class'=>'form-control']) }}
                    </div>    
                    <div class="submit-btn">
                        {{ Form::submit('更新') }}
                    </div>
                </div>
            {{ Form::close() }}

            {{ Form::model($office,['route'=>['office.password.reset',$office->id],'method'=>'put']) }}
                <div class="edit-wrap">
                    <div class="form-group">
                        {{ Form::label('password','パスワード',['class'=>"label"]) }}
                        {{ Form::password('password',['class'=>'form-control']) }}
                    </div>
        
                    <div class="submit-btn">
                        {{ Form::submit('更新') }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    
    {!! link_to_route('home','topに戻る',[],['class'=>'center']) !!}
    {!! link_to_route('office.show','グループに戻る',[$office->id],['class'=>'center']) !!}
</div>