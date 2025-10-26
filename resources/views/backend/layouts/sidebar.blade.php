@php
    $settings = App\Models\SiteSetting::first();
@endphp
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('backend.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ $settings && $settings->site_logo ? asset( $settings->site_logo) : asset('backend/assets/images/logo-sm.png') }}" 
                     alt="Logo" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $settings && $settings->site_logo ? asset( $settings->site_logo) : asset('backend/assets/images/logo-sm.png') }}" 
                     alt="Logo" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('backend.dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ $settings && $settings->site_logo ? asset( $settings->site_logo) : asset('backend/assets/images/logo-sm.png') }}" 
                     alt="Logo" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $settings && $settings->site_logo ? asset( $settings->site_logo) : asset('backend/assets/images/logo-sm.png') }}" 
                     alt="Logo" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('pe-secure-admin/dashboard') ? 'active' : '' }}" href="{{ route('backend.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('pe-secure-admin/enquiries*') ? 'active' : '' }}" 
                    href="{{ route('backend.enquiries.index') }}">
                        <i class="ri-message-2-line"></i>
                        <span data-key="t-dashboards">Enquiries</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
