<div class="schedules">
    <h2 class="center">Schedules</h2>
    @if($schedules->isEmpty())
        <p class="center empty">予定を登録してください。</p>
    @else
        @foreach ($schedules as $schedule)
            @if($schedule->exists('office_id'))
                @if($schedule->office_id == $board->office_id)
                    <div class="schedules-wrap">
                        <div class="schedule">
                            <p class="days">{{ $schedule->date }}</p>
                            <p class="schedules-text"><i class="fas fa-clock"></i>{{ $schedule->time}}</p>
                            <p class="schedules-text">{{ $schedule->content }}</p>
                        </div>
                        
                        <div class="schedules-edit-icons">
                            {{ Form::open(['route'=>['schedule.delete',$schedule->id],'method'=>'delete']) }}  
                                {{ Form::submit('削除',['class'=>'delete']) }}
                            {{ Form::close() }}

                            {{ Form::open(['route'=>['schedule.edit',$schedule->id],'method'=>'get']) }}  
                                {{ Form::submit('編集',['class'=>'edit']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                @endif
            @else
                <div class="schedule-wrap">
                    <div class="schedule container">
                        <p class="days">{{ $schedule->date }}</p>
                        <p class="schedules-text"><i class="fas fa-clock"></i>{{ $schedule->time}}</p>
                        <p class="schedules-text">{{ $schedule->content }}</p>
                    </div>
                    
                    <div class="schedules-edit-icons">
                        {{ Form::open(['route'=>['schedule.delete',$schedule->id],'method'=>'delete']) }}  
                            {{ Form::submit('削除',['class'=>'delete']) }}
                        {{ Form::close() }}

                        {{ Form::open(['route'=>['schedule.edit',$schedule->id],'method'=>'get']) }}  
                            {{ Form::submit('編集',['class'=>'edit']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    <div class="schedules-add">
        {!! link_to_route('schedule.form','+add Schedules',[$board->id]) !!}
    </div>
</div>