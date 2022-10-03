<header>
    <div class="logo">
        HinodeCommunity
    </div>

    @if(Auth::check())
        <nav>

            <div id="nav-icon"><i class="fas fa-bars"></i></div>

            <div id="nav-list">
                <ul>
                    <li class="nav-item">{!! link_to_route('home','トップ',[]) !!}</li>
                    <li class="nav-item">{!! link_to_route('board.index','オープン会議室',[]) !!}</li>
                    <li class="nav-item">{!! link_to_route('office.index','グループ一覧') !!}</li>
                    <li class="nav-item">{!! link_to_route('office.form','グループ作成') !!}</li>
                    <li class="nav-item">{!! link_to_route('logout','ログアウト ',[]) !!}</li>
                    <li class="nav-item"><a href="{{ route('user.show',Auth::id()) }}"><img src="/home/blackcat-bear/small_community/public/uploads/profile/{{ Auth::user()->profile_img }}" alt="" class="header-img"></a></li>
                </ul>
                
    
                <div class="sarch-container">
                    <div></div>
    
                    <div class='sarch-wrap'>
                        {{ Form::open(['route'=>'board.index','method'=>'get','class'=>'group-sarch']) }}
                            {{ Form::button('<i class="fas fa-search"></i>',['type'=>'submit','class'=>'sarch-btn']) }}
                            {{ Form::text('keyword',null,['class'=>'group-sarch-input','placeholder'=>'オープン会議室を検索']) }}
                        {{ Form::close() }}
                    </div>    
                </div>
            </div>
            

        </nav>
    @endif

</header>