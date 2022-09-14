@extends('layouts.app')

@section('content')
<div class="main">
    <h1 class="center">{{ $info->title }}</h1>
    <div class="info-show">
        <p class="info-content">{!! nl2br(e($info->info)) !!}</p>
        <p class="small">報告者：{{ $info->user->name }}</p>    
    </div>

    <div class="readed">
        <div id="readed-icon">Readed ></div>
        <div id="readed-users">
            @foreach($all_users as $all_user)
                @if($all_user->is_already($info->id))
                    <p>{{ $all_user->name }}<i class="fas fa-check"></i></p>
                @else
                    <p>{{ $all_user->name }}</p>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection