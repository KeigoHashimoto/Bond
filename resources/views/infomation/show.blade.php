@extends('layouts.app')

@section('content')
<div class="home">
    <div class="contents-width">
        <h1 class="center">{{ $info->title }}</h1>
        <div class="info-show">
            <p class="info-content">{!! nl2br(e($info->info)) !!}</p>
            <p class="small">報告者：{{ $info->user->name }}</p>    
        </div>
    
        <div class="readed">

            {{-- この連絡にoffice_idがある場合 --}}
            @if(!empty($info->office_id))
                <div class="readed-btn" v-on:click="readActive = !readActive" v-if="!readActive">Readed Member ▽</div>
                <div class="readed-btn" v-on:click="readActive = !readActive" v-if="readActive">Readed Member △</div>
                <div class="readed-member" v-show="readActive">
                    @foreach($all_users as $user)
                        {{-- 連絡事項のoffice_idのグループにユーザーが入っているかどうか --}}
                        @if($user->is_joined($info->office_id))
                            {{-- すでに読んだかどうか --}}
                            @if($user->is_Already($info->id))
                                <p>{{ $user->name }}<i class="fas fa-check"></i></p>
                            @else
                                <p>{{ $user->name }}</p>
                            @endif
                        @endif
                    @endforeach
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection