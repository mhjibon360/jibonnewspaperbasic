<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('backend') }}/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                @if (Auth::user()->can('dashboard'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                @endif

                <li class="menu-title mt-2">Apps</li>


                @if (Auth::user()->can('category'))

                    <li>
                        <a href="#category" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="category">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('category add'))
                                    <li>
                                        <a href="{{ route('category.create') }}">Add Category</a>
                                    </li>
                                @endif

                                @if (Auth::user()->can('category all'))
                                    <li>
                                        <a href="{{ route('category.index') }}">All Category</a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </li>
                @endif


                @if (Auth::user()->can('subcategory'))
                    <li>
                        <a href="#subcategory" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> subCategory </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="subcategory">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('subcategory add'))
                                    <li>
                                        <a href="{{ route('subcategory.create') }}">Add subCategory</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('subcategory all'))
                                    <li>
                                        <a href="{{ route('subcategory.index') }}">All subCategory</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('newspost'))

                    <li>
                        <a href="#news" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> News Post </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="news">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add newspost'))
                                    <li>
                                        <a href="{{ route('news.create') }}">Add News</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all newspost'))
                                    <li>
                                        <a href="{{ route('news.index') }}">All News</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('photogallery'))

                    <li>
                        <a href="#photogallery" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Photo Gallery </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="photogallery">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add photogallery'))
                                    <li>
                                        <a href="{{ route('photogallery.create') }}">Add Photogallery</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all photogallery'))
                                    <li>
                                        <a href="{{ route('photogallery.index') }}">All Photogallery</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('videogallery'))
                    <li>
                        <a href="#videogallery" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Video Gallery </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="videogallery">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add videogallery'))
                                    <li>
                                        <a href="{{ route('videogallery.create') }}">Add Videogallery</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all videogallery'))
                                    <li>
                                        <a href="{{ route('videogallery.index') }}">All Videogallery</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('livetv'))
                    <li>
                        <a href="#livtv" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Live Tv </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="livtv">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('manage livetv'))
                                    <li>
                                        <a href="{{ route('mange.live.tv') }}">Manage Live Tv</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('skipcategory'))
                    <li>
                        <a href="#skipcategory" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Skip Category </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="skipcategory">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('manage skipcategory'))
                                    <li>
                                        <a href="{{ route('all.news.category') }}">News category</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('advertisement'))
                    <li>
                        <a href="#ads" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Manage Ads </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="ads">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('manage advertisement'))
                                    <li>
                                        <a href="{{ route('manage.ads') }}">All Advertisement</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('adminaccount'))
                    <li>
                        <a href="#adminaccounts" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Admin Account </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="adminaccounts">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add admin adminaccount'))
                                    <li>
                                        <a href="{{ route('create.admin.account') }}">Add Admin Account</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all admin adminaccount'))
                                    <li>
                                        <a href="{{ route('show.all.admin.account') }}">All Admin Account</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


                @if (Auth::user()->can('role'))
                    <li>
                        <a href="#role" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Manage Role </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="role">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add role'))
                                    <li>
                                        <a href="{{ route('role.create') }}">Add Role</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all role'))
                                    <li>
                                        <a href="{{ route('role.index') }}">All Role</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('permissions'))

                    <li>
                        <a href="#permission" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Manage Permissions </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="permission">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add permissions'))
                                    <li>
                                        <a href="{{ route('permission.create') }}">Add Permissions</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all permissions'))
                                    <li>
                                        <a href="{{ route('permission.index') }}">All Permissions</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->can('rolepermissions'))
                    <li>
                        <a href="#role_permission" data-bs-toggle="collapse">
                            <i class="mdi mdi-cart-outline"></i>
                            <span> Role Permissions </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="role_permission">
                            <ul class="nav-second-level">
                                @if (Auth::user()->can('add rolepermissions'))
                                    <li>
                                        <a href="{{ route('role-has-permission.create') }}">Add Role Permissions</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('all rolepermissions'))
                                    <li>
                                        <a href="{{ route('permission.index') }}">All Role Permissions</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>
                @endif


            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
