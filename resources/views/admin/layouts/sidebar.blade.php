<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>
                <li>
                    <a href="#sidebarMultilevel" data-toggle="collapse">
                        <i data-feather="archive"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.product')}}">
                                    Data Products
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.brand') }}">
                                    Data Brands
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category') }}">
                                    Data Categories
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('admin.customer') }}">
                        <i data-feather="users"></i>
                        <span>Customers</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>