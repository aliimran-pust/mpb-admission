<nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">User ID: {{ Auth::user()->name ?? '' }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link" role="button"><i class="fas fa-sign-out-alt"> Sign
                    Out</i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/backend/img/logo.png') }}" alt="Logo"
            class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> <b>M</b>PB <b>A</b>dmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- new 15.01.2026 -->
                <li class="nav-item {{ request()->routeIs('semesters.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('semesters.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Semester
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('semesters.index') }}"
                               class="nav-link {{ request()->routeIs('semesters.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Semester List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('semesters.create') }}"
                               class="nav-link {{ request()->routeIs('semesters.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Semester</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('courses.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Courses
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('courses.index') }}" class="nav-link {{ request()->routeIs('courses.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Course List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('courses.create') }}" class="nav-link {{ request()->routeIs('courses.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Course</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('teachers.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Teachers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teachers.index') }}" class="nav-link {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teacher List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teachers.create') }}" class="nav-link {{ request()->routeIs('teachers.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Teacher</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- new 15.01.2026 -->
                <!-- new 16.01.2026 -->
                <li class="nav-item {{ request()->routeIs('batches.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('batches.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Batches
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('batches.index') }}" class="nav-link {{ request()->routeIs('batches.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('batches.create') }}" class="nav-link {{ request()->routeIs('batches.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Batch</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('fee-categories.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('fee-categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Fee Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fee-categories.index') }}" class="nav-link {{ request()->routeIs('fee-categories.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fee Category List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fee-categories.create') }}" class="nav-link {{ request()->routeIs('fee-categories.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Fee Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('fee-structures.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('fee-structures.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Fee Structures
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fee-structures.index') }}" class="nav-link {{ request()->routeIs('fee-structures.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fee Structure List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fee-structures.create') }}" class="nav-link {{ request()->routeIs('fee-structures.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Fee Structure</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('course-offers.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('course-offers.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Course Offers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('course-offers.index') }}" class="nav-link {{ request()->routeIs('course-offers.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Course Offer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course-offers.create') }}" class="nav-link {{ request()->routeIs('course-offers.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Course Offer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- new 16.01.2026 -->

                @can('applicant-manage')

                    <li class="nav-item">
                        <a href="{{route('candidate.profile')}}" class="nav-link {{ request()->routeIs('candidate.profile') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p class="text">My Profile</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('c.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('plots.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Transcript <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href=""
                                   class="nav-link {{ request()->routeIs('plots.index') ? 'active' : '' }}">
                                    <i class="fas fa-university nav-icon"></i>
                                    <p>Link 1</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('user-manage')
                    <li class="nav-item has-treeview {{ request()->routeIs('auth.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('auth.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-wrench text-danger"></i>
                            <p>
                                Settings <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('auth.roles.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.roles.*') ? 'active' : '' }}">
                                    <i class="fas fa-user-tag nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.permissions.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.permissions.*') ? 'active' : '' }}">
                                    <i class="fab fa-accessible-icon nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.rp.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.rp.*') ? 'active' : '' }}">
                                    <i class="fas fa-user-tag nav-icon"></i>
                                    <p>Role-Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.users.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.users.*') ? 'active' : '' }}">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p class="text">Sign out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
