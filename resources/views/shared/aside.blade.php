<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Personal</span>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route ('home') }}" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @can('ver-ventas')
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="hide-menu">Ventas </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route ('ventas-nueva') }}" class="sidebar-link">
                                        <i class="mdi mdi-view-quilt"></i>
                                        <span class="hide-menu"> Vender Producto </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('detalle-venta') }}" class="sidebar-link">
                                        <i class="mdi mdi-view-parallel"></i>
                                        <span class="hide-menu"> Consultar Ventas </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        @endcan

                        @can('ver-admin')
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('categorias') }}" aria-expanded="false">
                                <i class=" fas fa-list-ol"></i>
                                <span class="hide-menu">Categorias</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="fas fa-boxes"></i>
                                <span class="hide-menu">Productos </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('productos') }}" class="sidebar-link">
                                        <i class="mdi mdi-view-quilt"></i>
                                        <span class="hide-menu"> Administrar producto</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route ('reportes_productos') }}" class="sidebar-link">
                                        <i class="mdi mdi-view-parallel"></i>
                                        <span class="hide-menu"> Reporte de productos </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                          <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('compras') }}" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="hide-menu">Compras</span>
                            </a>
                        </li>
                         
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('proveedores') }}" aria-expanded="false">
                                <i class=" fas fa-truck-moving"></i>
                                <span class="hide-menu">Proveedores</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('usuarios') }}" aria-expanded="false">
                                <i class="fas fa-users"></i>
                                <span class="hide-menu">Usuarios</span>
                            </a>
                        </li>
                         @endcan
                     
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>