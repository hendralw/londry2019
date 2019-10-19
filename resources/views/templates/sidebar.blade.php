<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Conzept Laundry</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ url('/') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Home</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                    <span class="pcoded-mtext">Data Master</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{ url('/Branch') }}">
                            <span class="pcoded-mtext">Cabang</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
