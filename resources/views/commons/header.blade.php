<div class="header">
    <div class="logo">
        <a href="{{ route('home') }}" class="header-logo"><img src={{ asset('images/bond_logo.png') }} alt=""></a>
    </div>

    @if(Auth::check())
        <nav>
            {{-- モバイル用メニュー --}}
            <div class="nav-icon" v-on:click="menuSwitch = !menuSwitch"><i class="fas fa-bars"></i></div>

            <div class="nav-list" v-show="menuSwitch" v-on:click.self="menuSwitch = !menuSwitch">
                <ul>
                    <li class="nav-item">{!! link_to_route('home','トップ',[]) !!}</li>
                    <li class="nav-item">{!! link_to_route('board.index','オープン会議室',[]) !!}</li>
                    <li class="nav-item">{!! link_to_route('office.index','グループ一覧') !!}</li>
                    <li class="nav-item">{!! link_to_route('office.form','グループ作成') !!}</li>
                    <li class="nav-item">{!! link_to_route('logout','ログアウト ',[]) !!}</li>
                    <li class="nav-item"><a href="{{ route('user.show',Auth::id()) }}"><img src="{{ asset('uploads/'. Auth::user()->profile_img ) }}" alt="" class="header-img"></a></li>
                </ul>
                
                <div class='sarch-container'>
                    {{ Form::open(['route'=>'board.index','method'=>'get','class'=>'group-sarch']) }}
                        {{ Form::button('<i class="fas fa-search"></i>',['type'=>'submit','class'=>'sarch-btn']) }}
                        {{ Form::text('keyword',null,['class'=>'group-sarch-input','placeholder'=>'オープン会議室を検索']) }}
                    {{ Form::close() }}
                </div>    

            </div>

            {{-- デスクトップ用メニュー --}}
            <div class="nav-list-desktop">
                <ul>
                    <li class="nav-item">{!! link_to_route('home','トップ',[]) !!}</li>
                    <li class="nav-item">{!! link_to_route('board.index','オープン会議室',[]) !!}</li>
                    <li class="nav-item">{!! link_to_route('office.index','グループ一覧') !!}</li>
                    <li class="nav-item">{!! link_to_route('office.form','グループ作成') !!}</li>
                    <li class="nav-item">{!! link_to_route('logout','ログアウト ',[]) !!}</li>
                    <li><a href="{{ route('user.show',Auth::id()) }}"><img src="{{ asset('uploads/'. Auth::user()->profile_img ) }}" alt="" class="header-img"></a></li>
                </ul>
                
    
                <div class="sarch-container">
                    {{ Form::open(['route'=>'board.index','method'=>'get','class'=>'group-sarch']) }}
                        {{ Form::button('<i class="fas fa-search"></i>',['type'=>'submit','class'=>'sarch-btn']) }}
                        {{ Form::text('keyword',null,['class'=>'group-sarch-input','placeholder'=>'オープン会議室を検索']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </nav>
    @endif

</div>