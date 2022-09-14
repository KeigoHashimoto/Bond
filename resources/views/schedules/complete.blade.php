@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">スケジュールを登録しました</h1>

    <p class="center">{{ $schedule->date.'：'.$schedule->content}}</p>
</div>
@endsection