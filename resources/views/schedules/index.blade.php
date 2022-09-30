@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">this month Schedules</h1>

    @include('commons.schedules')
    
    <p class="small center">{!! link_to_route('schedules.all','show all Schedules') !!}</p>    

    <a  class="add" href={{ route('schedule.form') }} ><i  class="fas fa-plus-square"></i></a>
</div>

@endsection