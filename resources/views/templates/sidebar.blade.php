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
                        <a href="{{ ('Branch') }}">
                            <span class="pcoded-mtext">Cabang</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('Duration') }}">
                            <span class="pcoded-mtext">Durasi</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('Employee') }}">
                            <span class="pcoded-mtext">Pegawai</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('Role') }}">
                            <span class="pcoded-mtext">Role Pegawai</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('Item_Category') }}">
                            <span class="pcoded-mtext">Kategori Item</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('List_Item') }}">
                            <span class="pcoded-mtext">List Item</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('Spending_Category') }}">
                            <span class="pcoded-mtext">Spending Category</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ ('Unit_Item') }}">
                            <span class="pcoded-mtext">Unit Item </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ ('Spending') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Spending</span>
                </a>
            </li>
        </ul>
    </div>
</nav>