<div class=" main schedule">
    <h1 class="center">this month Schedules</h1>

    @if($schedules->isEmpty())
        <p class="center empty">予定を登録してください。</p>
    @else
        @foreach ($schedules as $schedule)
            <div class="schedule-wrap">
                <div class="schedule container">
                    <p class="small">{{ $schedule->date }}</p>
                    <p class="schedules-text">{{ $schedule->time.'|'.$schedule->content }}</p>
                </div>
                
                <div class="schedules-edit-icons">
                    {{ Form::open(['route'=>['schedule.delete',$schedule->id],'method'=>'delete']) }}  
                        {{ Form::submit('削除',['class'=>'delete']) }}
                    {{ Form::close() }}

                    {!! link_to_route('schedule.edit','編集',[$schedule->id],['class'=>'edit']) !!}
                </div>
            </div>
        @endforeach
    @endif
</div>