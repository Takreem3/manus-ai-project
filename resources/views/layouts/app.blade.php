<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - MLM Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar a.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .main-content {
            padding: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .user-dropdown {
            margin-left: auto;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">MLM Platform</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('commission-plans') }}">Commission Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('calculator') }}">Calculator</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                        @if (Route::has('admin.login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->hasRole('admin'))
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('member.dashboard') }}">My Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('member.profile') }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @auth
                @if(Request::is('admin*'))
                    <div class="col-md-2 sidebar">
                        <div class="pt-3">
                            <h5 class="px-3">Admin Panel</h5>
                            <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="{{ Request::is('admin/users*') ? 'active' : '' }}">
                                <i class="fas fa-users me-2"></i> User Management
                            </a>
                            <a href="{{ route('admin.commission.index') }}" class="{{ Request::is('admin/commission*') ? 'active' : '' }}">
                                <i class="fas fa-percentage me-2"></i> Commission Settings
                            </a>
                            <a href="{{ route('admin.payouts.index') }}" class="{{ Request::is('admin/payouts*') ? 'active' : '' }}">
                                <i class="fas fa-money-bill-wave me-2"></i> Payout Processing
                            </a>
                            <a href="{{ route('admin.reports.index') }}" class="{{ Request::is('admin/reports*') ? 'active' : '' }}">
                                <i class="fas fa-chart-bar me-2"></i> Reports
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 main-content">
                        @yield('content')
                    </div>
                @elseif(Request::is('member*'))
                    <div class="col-md-2 sidebar">
                        <div class="pt-3">
                            <h5 class="px-3">Member Panel</h5>
                            <a href="{{ route('member.dashboard') }}" class="{{ Request::is('member/dashboard') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                            <a href="{{ route('member.genealogy') }}" class="{{ Request::is('member/genealogy*') ? 'active' : '' }}">
                                <i class="fas fa-sitemap me-2"></i> Genealogy
                            </a>
                            <a href="{{ route('member.commissions') }}" class="{{ Request::is('member/commissions') ? 'active' : '' }}">
                                <i class="fas fa-percentage me-2"></i> Commissions
                            </a>
                            <a href="{{ route('member.commissions.calculator') }}" class="{{ Request::is('member/commissions/calculator') ? 'active' : '' }}">
                                <i class="fas fa-calculator me-2"></i> Calculator
                            </a>
                            <a href="{{ route('member.referrals') }}" class="{{ Request::is('member/referrals') ? 'active' : '' }}">
                                <i class="fas fa-user-plus me-2"></i> Referrals
                            </a>
                            <a href="{{ route('member.shop') }}" class="{{ Request::is('member/shop*') ? 'active' : '' }}">
                                <i class="fas fa-shopping-cart me-2"></i> Shop
                            </a>
                            <a href="{{ route('member.wallet.withdraw') }}" class="{{ Request::is('member/wallet*') ? 'active' : '' }}">
                                <i class="fas fa-wallet me-2"></i> Wallet
                            </a>
                            <a href="{{ route('member.profile') }}" class="{{ Request::is('member/profile*') ? 'active' : '' }}">
                                <i class="fas fa-user-circle me-2"></i> Profile
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 main-content">
                        @yield('content')
                    </div>
                @else
                    <div class="col-12 main-content">
                        @yield('content')
                    </div>
                @endif
            @else
                <div class="col-12 main-content">
                    @yield('content')
                </div>
            @endauth
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>MLM Platform</h5>
                    <p>Your complete solution for multi-level marketing business.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-white">About</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                        <li><a href="{{ route('products') }}" class="text-white">Products</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <address>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 MLM Street, Business City</p>
                        <p><i class="fas fa-phone me-2"></i> +1 (123) 456-7890</p>
                        <p><i class="fas fa-envelope me-2"></i> info@mlmplatform.com</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; {{ date('Y') }} MLM Platform. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scripts')
</body>
</html>
