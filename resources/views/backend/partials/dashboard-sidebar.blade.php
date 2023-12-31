<div class="app-sidebar">
    <div class="logo">
        <a href="{{ route('dashboard') }}" class="logo-icon">
            <span class="logo-text">Neptune</span>
            {{-- <img width="50" class="logo-text" src="https://robohash.org/YOUR-TEXT.jpg" alt=""> --}}
        </a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img src="https://robohash.org/YOUR-TEXT.jpg">
                <span class="activity-indicator"></span>
                <span class="user-info-text">{{ $user->name }}<br><span class="user-state-info">{{ Str::limit($user->email, 10) }}</span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Your Panel
            </li>

            

            <li class="{{  Route::is('dashboard') ? 'active-page' : ''  }}" >
                <a href="{{ route('dashboard') }}"><i class="material-icons-two-tone">dashboard</i>My Panel</a>
            </li>

            <li class="sidebar-title">
                Landing Page Sections
            </li>

            <li>
                <a href="#"><i class="material-icons-two-tone">help</i>About us</a>
            </li>


            <li class="{{ Route::is(['services.create','services.index']) ? 'active-page' : ''  }}">
                <a href="#"><i class="material-icons-two-tone">star_rate</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a class="{{  Route::is('services.create') ? 'active' : ''  }}" href="{{ route('services.create') }}">Add Service</a>
                    </li>
                    <li>
                        <a class="{{  Route::is('services.index') ? 'active' : ''  }}" href="{{ route('services.index') }}">All Services</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Route::is(['portfolios.index','portfolios.create','portfolio-categories.index']) ? 'active-page' : ''  }}">
                <a href="#" />
                    <i class="material-icons-two-tone">slideshow</i>Portfolio
                    <i class="material-icons has-sub-menu">keyboard_arrow_right</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="{{  Route::is('portfolios.create') ? 'active' : ''  }}" href="{{ route('portfolios.create') }}">
                            Create Item
                        </a>
                    </li>
                    <li>
                        <a class="{{  Route::is('portfolios.index') ? 'active' : ''  }}" href="{{ route('portfolios.index') }}">
                            All Portfolio Items
                        </a>
                    </li>
                    <li>
                        <a class="{{  Route::is('portfolio-categories.index') ? 'active' : ''  }}" href="{{ route('portfolio-categories.index') }}">
                            Categories
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Route::is('features.index') ? 'active-page' : '' }}">
                <a href="{{ route('features.index') }}"><i class="material-icons-two-tone">featured_play_list</i>Features</a>
            </li>

            <li class="{{ Route::is('testimonials.index') ? 'active-page' : '' }}">
                <a href="{{ route('testimonials.index') }}">
                    <i class="material-icons-two-tone">reviews</i>Testimonial
                </a>
            </li>

            <li class="{{ Route::is('brands.index') ? 'active-page' : '' }}">
                <a href="{{ route('brands.index') }}">
                    <i class="material-icons-two-tone">thumb_up_off_alt</i>Brands You Work With
                </a>
            </li>

            <li class="{{ Route::is('settings.page') ? 'active-page' : '' }}">
                <a href="{{ route('settings.page') }}">
                    <i class="material-icons-two-tone">web</i>Page Settings
                </a>
            </li>

            <li class="sidebar-title">
                Other
            </li>
            {{-- global settings --}}
            <li class="{{ Route::is('settings.site') ? 'active-page' : '' }}">
                <a href="{{ route('settings.site') }}"><i class="material-icons-two-tone">settings</i>Site Settings</a>
            </li>
            {{-- visit site --}}
            <li>
                <a href="{{ url('/') }}" target="_blank"><i class="material-icons-two-tone">home</i>Visit Site</a>
            </li>
            {{-- logout --}}
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons-two-tone">logout</i>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>