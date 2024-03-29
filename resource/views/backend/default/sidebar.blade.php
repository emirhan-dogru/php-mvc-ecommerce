<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ base_url('admin/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E.D Admin <sup>v1.00</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ base_url('admin/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ base_url('admin/kategoriler') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Products:</h6>
                <a class="collapse-item" href="{{ base_url("admin/urunler") }}">Products</a>
                     <a class="collapse-item" href="{{ base_url("admin/urun-ekle") }}">Add Product</a>
            </div>
        </div>
    </li>



    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ base_url('admin/kullanicilar') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ base_url('admin/yetkililer') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Authorities</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ base_url('admin/siparisler') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Orders</span></a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>