@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="contents-width">
        {{-- プロフィールヘッダー部分 --}}
        <div class="profile-header">
            <img class="profile-header-img" src="{{ asset('uploads/'. $user->profile_header ) }}" alt="">
        
            <img class="profile-show-image" src="{{ asset('uploads/'. $user->profile_img ) }}" alt="">
        
        </div>
        
        {{-- プロフィール内容 --}}
        <div class="profile-contents-width">
            <div class="profile">
                <div class="profile-contents">
                    <h2 class="profile-name">{{ $user->name }}</h2>
                
                    <p class="profile-content">{!! nl2br(e($user->profile)) !!}</p>
                </div>
            
                <div class="profile-edit">
                    @if(Auth::id() === $user->id)
                        <a href="{{ route('user.create',$user->id) }}"><i class="far fa-edit"></i></a>
                    @endif
                </div>

                {{-- タブのメニュー --}}
                <ul class="tabs-menu">
                    <li
                    v-on:click="activeProfileTab = 'discussion'"
                    v-bind:class="{profileActive:activeProfileTab === 'discussion'}">Discussion</li>
            
                    <li
                    v-on:click="activeProfileTab = 'group'"
                    v-bind:class="{profileActive:activeProfileTab === 'group'}">Groupe</li>
                </ul>
            </div>

            {{-- タブの内容 --}}
            <div class="tab-contents">
                <div class="tab-content"
                v-show="activeProfileTab === 'discussion'">
                    @include('commons.myBoard')
                </div>
        
                <div class="tab-content tab-content-group"
                v-show="activeProfileTab === 'group'">
                    @if($user->affiliations()->get()->isEmpty())
                        <p class="center">まだグループに所属していません</p>
                    @else
                        @foreach($user->affiliations()->get() as $myOffice)
                            @if(Auth::user()->is_joined($myOffice->id))
                                <div class="group-label">
                                    {!! link_to_route('office.show',$myOffice->name,[$myOffice->id]) !!}
                                </div>
                            @else
                                {{ Form::open(['route'=>['office.show',$myOffice->id],'method'=>'get']) }}
                                    <div class="group-gate-yet">
                                        <p class="group-label-yet">{{ $myOffice->name }} :</p>
                                        <div class="group-affiliation-form">
                                            {{ Form::text('password',null,['class'=>'group-input','placeholder'=>'パスワードを入力']) }}
                                            {{ Form::submit('join',['class'=>'group-btn']) }}
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            @endif
                        @endforeach
                    @endif
                </div>
        
                <div class="tab-content"
                v-show="activeProfileTab === 'default'">
                    <p class="center">タブを選択してください</p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection