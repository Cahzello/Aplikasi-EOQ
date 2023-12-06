    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-cog"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Sistem EOQ</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item my-0 {{ $active === 'homepage' ? 'active' : ''  }}">
            <a class="nav-link" href="/home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item {{ $active === 'eoq' ? 'active' : ''  }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
                aria-expanded="true" aria-controls="collapseData">
                <i class="fas fa-fw fa-table"></i>
                <span>Data</span>
            </a>
            <div id="collapseData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/eoq">Economic Order Quantity</a>
                    <a class="collapse-item" href="#">Safety Stock</a>
                    <a class="collapse-item" href="#">Reorder Point</a>
                </div>
            </div>
        </li>

        <li class="nav-item my-0 {{ $active === 'user' ? 'active' : ''  }}">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span></a>
        </li>

    </ul>
    <!-- End of Sidebar -->
