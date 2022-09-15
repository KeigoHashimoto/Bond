@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">all Schedules</h1>

    @include('commons.schedules')
    
    <p class="small center">{!! link_to_route('schedule.current','this month Schedules') !!}</p>    

    <a  class="add" href={{ route('schedule.create') }} ><i  class="fas fa-plus-square"></i></a>
</div>
@endsection