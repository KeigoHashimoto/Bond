@extends('layouts.app')

@section('content')

@include('commons.schedules')

<div class="add">{!! link_to_route('schedule.create','+',[],['class'=>'add-icon']) !!}</div>
@endsection