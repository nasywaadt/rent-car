 <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-car me-2"></i>RENT CARS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('assets/img/profile.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{auth()->user()->name }}</h6>
                        <span>{{auth()->user()->role}}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::is('home') ? 'active' : '' }}">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a href="{{ route('users') }}" class="nav-item nav-link {{ Request::is('users') ? 'active' : '' }}">
                        <i class="fa fa-users me-2"></i>Users
                    </a>
                    <a href="{{ route('mobil') }}" class="nav-item nav-link {{ Request::is('mobils') ? 'active' : '' }}">
                        <i class="fa fa-car me-2"></i>Cars
                    </a>
                    <a href="{{ route('transaksi') }}" class="nav-item nav-link {{ Request::is('transaksi') ? 'active' : '' }}">
                        <i class="fa fa-money-check-alt me-2"></i>Transaction
                    </a>
                    <a href="{{ route('laporan') }}" class="nav-item nav-link {{ Request::is('laporan') ? 'active' : '' }}">
                        <i class="fa fa-file-archive me-2"></i>Report
                    </a>
                </div>
                
            </nav>
        </div>
        <!-- Sidebar End -->