<div class="container-fluid">
    <div class="nk-header-wrap">
        <div class="nk-menu-trigger d-xl-none ml-n1">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-header-brand d-xl-none">
            <a href="/" class="logo-link">
                <img class="logo-light logo-img" src="{{ siteSetting()->favicon }}" srcset="{{ siteSetting()->favicon }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ siteSetting()->favicon }}" srcset="{{ siteSetting()->favicon }}" alt="logo-dark">
            </a>
        </div><!-- .nk-header-brand -->

        <div class="nk-header-tools">
            <ul class="nk-quick-nav">
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="user-toggle">
                            <div class="user-avatar sm">
                                <em class="icon ni ni-user-alt"></em>
                            </div>
                            <div class="user-info d-none d-md-block">
                                <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <span>AD</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">{{ Auth::user()->name }}</span>
                                    <span class="sub-text">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em>
                                        <span>Sign out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li><!-- .dropdown -->
            </ul><!-- .nk-quick-nav -->
        </div><!-- .nk-header-tools -->
    </div><!-- .nk-header-wrap -->
</div><!-- .container-fliud -->
