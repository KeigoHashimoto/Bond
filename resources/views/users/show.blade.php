@extends('layouts.app')

@section('content')
<div class="profile-wrap">
    <div class="profile-header">
        <img class="profile-header-img" src="{{ asset(uploads/header/{{ $user->profile_header }},true)  }}" alt="">
    
        <img class="profile-show-image" src="{{ asset(uploads/profile/{{ $user->profile_img }},true) }}" alt="">
    
    </div>
    
    <div class="profile">
        <div class="profile-contents">
            <h2 class="profile-name">{{ $user->name }}</h2>
        
            <p class="profile-content">{!! nl2br(e($user->profile)) !!}</p>
        </div>
    
        <div class="profile-edit">
            {{ link_to_route('user.create','Edit',[$user->id],['class'=>'white']) }}
        </div>

    </div>


    <ul class="tabs-menu">
        <li
        v-on:click="activeProfileTab = 'discussion'"
        v-bind:class="{profileActive:activeProfileTab === 'discussion'}">Discussion</li>

        <li
        v-on:click="activeProfileTab = 'group'"
        v-bind:class="{profileActive:activeProfileTab === 'group'}">Groupe</li>
    </ul>

    <div class="tab-contents">
        <div class="tab-content"
        v-show="activeProfileTab === 'discussion'">
            @include('commons.myBoard')
        </div>

        <div class="tab-content"
        v-show="activeProfileTab === 'group'">
            @if($user->affiliations()->get()->isEmpty())
                <p class="center">まだグループに所属していません</p>
            @else
                @foreach($user->affiliations()->get() as $myOffice)
                    <div class="group-label">
                        {!! link_to_route('office.show',$myOffice->name,[$myOffice->id]) !!}
                    </div>
                @endforeach
            @endif
        </div>

        <div class="tab-content"
        v-show="activeProfileTab === 'default'">
            <p class="center">タブを選択してください</p>
        </div>
    </div>
    
</div>



@endsection