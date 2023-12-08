    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                <i class="fas fa-warehouse"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Shidqia</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item my-0 {{ $active === 'homepage' ? 'active' : ''  }}">
            <a class="nav-link" href="/home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item my-0 {{ $active === 'input' ? 'active' : ''  }}">
            <a class="nav-link" href="/input-data">
                <i class="far fa-fw fa-edit" aria-hidden="true"></i>
                <span>Input Bahan Baku</span></a>
        </li>

        <li class="nav-item my-0 {{ $active === 'data' ? 'active' : ''  }}">
            <a class="nav-link" href="/data">
                <i class="fas fa-fw fa-table" aria-hidden="true"></i>
                <span>Data Hasil Perhitungan</span></a>
        </li>

        <li class="nav-item my-0 {{ $active === 'user' ? 'active' : ''  }}">
            <a class="nav-link" href="/user-list">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span></a>
        </li>

    </ul>
    <!-- End of Sidebar -->
