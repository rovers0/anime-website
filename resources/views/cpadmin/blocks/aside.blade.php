<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <img src="{{ asset('cpadmin/dist/img/AdminLTELogo.png') }}"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Anime SQL</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('cpadmin/dist/img/123.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Group 7</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-plus"></i>
                        <p>
                            ADD MORE
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.flim.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Flim </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.chapter.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Chapter </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.register') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.comment.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comment</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('admin.flim.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                           FLIM
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{ route('admin.chapter.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                             Chapter
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             Category
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                         User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.comment.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                         Comment
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>