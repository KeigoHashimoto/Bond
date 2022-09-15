<header>
    <div class="logo">
        HinodeCommunity
    </div>

    <nav>

        <div id="nav-icon"><i class="fas fa-bars"></i></div>

        <ul id="nav-list">
            <li class="nav-item">{!! link_to_route('home','Top',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('board.index','Discussion',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('schedule.index','Schedule',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('info.create','addInfo',[]) !!}</li>
            <li class="nav-item">{!! link_to_route('logout','Logout ',[]) !!}</li>
        </ul>

    </nav>

</header>