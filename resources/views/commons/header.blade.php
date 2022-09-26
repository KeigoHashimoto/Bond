<header>
    <div class="logo">
        HinodeCommunity
    </div>

    @if(Auth::check())
        <nav>

            <div id="nav-icon"><i class="fas fa-bars"></i></div>

            <ul id="nav-list">
                <li class="nav-item">{!! link_to_route('home','トップ',[]) !!}</li>
                <li class="nav-item">{!! link_to_route('board.index','オープン会議室',[]) !!}</li>
                <li class="nav-item">{!! link_to_route('office.index','グループ一覧') !!}</li>
                <li class="nav-item">{!! link_to_route('office.create','グループの作成') !!}</li>
                <li class="nav-item">{!! link_to_route('logout','ログアウト ',[]) !!}</li>
            </ul>

        </nav>
    @endif

</header>