<header>
    <div class="logo">
        HinodeCommunity
    </div>

    <nav>

        <div id="nav-icon"><i class="fas fa-bars"></i></div>

        <ul id="nav-list">
            <li class="nav-item">{!! link_to_route('home','トップ',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('board.index','会議室',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('schedule.current','予定',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('info.create','連絡事項',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('logout','ログアウト ',[]) !!}</li>
        </ul>

    </nav>

</header>