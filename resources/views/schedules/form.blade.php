@extends('layouts.app')

@section('content')

@include('commons.schedulesCreate')

{!! link_to_route('board.show','会議室に戻る',[$board->id],['class'=>"small center"]) !!}


@endsection