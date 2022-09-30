@extends('layouts.app')

@section('content')

<div class="main">
    <h1>profile</h1>

    <img class="profile-show-image" src="/uploads/{{ $user->profile_img }}" alt="">
    
    <p>{{ $user->name }}</p>
    
    <p>{!! nl2br(e($user->profile)) !!}</p>
    {{ link_to_route('user.create','プロフィール登録',[$user->id]) }}
</div>

@endsection