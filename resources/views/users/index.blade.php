@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <p>{{ $user->id }}:{{ $user->name }}:{{ $user->email }}</p>
    @endforeach    
@endsection