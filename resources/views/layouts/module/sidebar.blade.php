<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="POS" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">POS</span>
    </a>
​
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>
​
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-server"></i>
                        <p>
                            Manajemen Produk
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Manajemen Users
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.roles_permission') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Role Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.roles_permission') }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Role Permission</p>
                    </a>
                </li>
                @role('kasir|admin')
                <li class="nav-item">
                    <a href="{{ route('order.transaksi') }}" class="nav-link">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <form action="/auth/logout" method="POST">
                        @csrf()
                        <a href="#" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <button type="submit" class="bnt btn-primary" style="border: none; background-color: transparent; padding: 0;">Logout</button>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>