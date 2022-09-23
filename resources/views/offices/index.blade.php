@extends('layouts.app')

@section('content')
    @foreach($offices as $office)
        @if(\Auth::user()->is_joined($office->id))
            {!! link_to_route('office.show',$office->name,[$office->id]) !!}
        @else
            <div class="form-group">
                {{ Form::open(['route'=>['office.show',$office->id],'method'=>'get']) }}
                    {{ Form::label($office->name.':') }}
                    {{ Form::text('password',null,['class'=>'form-control']) }}
                    {{ Form::submit('join',['class'=>'submit-btn']) }}
                {{ Form::close() }}
            </div>
        @endif

    @endforeach
@endsection