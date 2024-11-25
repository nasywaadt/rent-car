 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-car me-2"></i>RENT CARS</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/pp2.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{auth()->user()->name }}</h6>
                <span>{{auth()->user()->role}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('home-owner') }}" class="nav-item nav-link {{ Request::is('home-owner') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="{{ route('mobil-owner') }}" class="nav-item nav-link {{ Request::is('mobil-owner') ? 'active' : '' }}">
                <i class="fa fa-car me-2"></i>Cars
            </a>
            <a href="{{ route('transaksi-owner') }}" class="nav-item nav-link {{ Request::is('transaksi-owner') ? 'active' : '' }}">
                <i class="fa fa-money-check-alt me-2"></i>Transaction
            </a>
            <a href="{{ route('laporan-owner') }}" class="nav-item nav-link {{ Request::is('laporan-owner') ? 'active' : '' }}">
                <i class="fa fa-file-archive me-2"></i>Report
            </a>
        </div>
        
    </nav>
</div>
<!-- Sidebar End -->