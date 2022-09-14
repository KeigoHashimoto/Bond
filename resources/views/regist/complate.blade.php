@extends('layouts.app')

@section('content')
<div class="main">
    <p class="center">{{ $user->name }}さんを登録しました</p>

    {{ link_to_route('login','topへ',[],['class'=>'center']) }}
</div>
@endsection