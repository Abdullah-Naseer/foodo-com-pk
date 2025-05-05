<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
                <img src="{{ asset('public/assets/images/footer/logo.webp') }}"
                    alt="logo" width="130" height="40" class="align-middle">
        </a>

        <ul class="sidebar-nav">

            <li class="sidebar-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @can('pages')
                <li class="sidebar-item {{ Route::is('admin.pages.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.pages.index') }}">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Pages</span>
                    </a>
                </li>
            @endcan

            @can('menu types')
                <li class="sidebar-item {{ Route::is('admin.menu-types.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.menu-types.index') }}">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Menu Types</span>
                    </a>
                </li>
            @endcan

            @can('menus')
                <li class="sidebar-item {{ Route::is('admin.menus.*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.menus.index') }}">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">Menus</span>
                    </a>
                </li>
            @endcan

            @can('access')
                <li
                    class="sidebar-item {{ Route::is('admin.roles.*') || Route::is('admin.permissions.*') ? 'active' : '' }}">
                    <a href="#access" data-bs-toggle="collapse"
                        class="sidebar-link {{ Route::is('admin.roles.*') || Route::is('admin.permissions.*') ? '' : 'collapsed' }}"
                        aria-expanded="{{ Route::is('admin.roles.*') || Route::is('admin.permissions.*') ? 'true' : 'false' }}">
                        <i class="align-middle me-2" data-feather="lock"></i>
                        <span class="align-middle">Access</span>
                    </a>
                    <ul id="access"
                        class="sidebar-dropdown list-unstyled collapse {{ Route::is('admin.roles.*') || Route::is('admin.permissions.*') ? 'show' : '' }}"
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ Route::is('admin.roles.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.roles.index') }}">
                                Roles
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('admin.permissions.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.permissions.index') }}">
                                Permissions
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            <li
                class="sidebar-item {{ Route::is('admin.users.*') || Route::is('admin.customers.*') ? 'active' : '' }}">
                <a href="#users" data-bs-toggle="collapse"
                    class="sidebar-link {{ Route::is('admin.users.*') || Route::is('admin.customers.*') ? '' : 'collapsed' }}"
                    aria-expanded="{{ Route::is('admin.users.*') || Route::is('admin.customers.*') ? 'true' : 'false' }}">
                    <i class="align-middle me-2" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
                <ul id="users"
                    class="sidebar-dropdown list-unstyled collapse {{ Route::is('admin.users.*') || Route::is('admin.customers.*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar">
                    @can('admins')
                        <li class="sidebar-item {{ Route::is('admin.users.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                                Admins
                            </a>
                        </li>
                    @endcan
                    @can('customers')
                        <li class="sidebar-item {{ Route::is('admin.customers.*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.customers.index') }}">
                                Customers
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            @can('orders')
                <li class="sidebar-item {{ Route::is('admin.orders') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.orders') }}">
                        <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Orders</span>
                    </a>
                </li>
            @endcan

              @can('Categories')
                <li class="sidebar-item {{ Route::is('admin.categories.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.categories.index') }}">
                        <i data-feather="tag"></i> <span
                            class="align-middle">Categories</span>
                    </a>
                </li>
            @endcan

            @can('blogs')
            <li class="sidebar-item {{ Route::is('admin.blogs.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.blogs.index') }}">
                     <i data-feather="book-open"></i> <span
                        class="align-middle">Blogs</span>
                </a>
            </li>
        @endcan

         @can('UrlRedirect')
                <li class="sidebar-item {{ Route::is('admin.url-redirects.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.url-redirects.index') }}">
                          <i data-feather="link"></i> <span
                            class="align-middle">Url Redirects</span>
                    </a>
                </li>
            @endcan

            @can('sitemap')
            <li class="sidebar-item {{ Route::is('admin.sitemap') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.sitemap') }}">
                    <i data-feather="map"></i> <span class="align-middle">Sitemap</span>
                </a>
            </li>
            @endcan

            @can('activity')
                <li class="sidebar-item {{ Route::is('admin.history') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.history') }}">
                        <i class="align-middle me-2" data-feather="clock"></i> <span class="align-middle">Activity</span>
                    </a>
                </li>
            @endcan

        </ul>

    </div>
</nav>
