       <!-- ========== App Menu ========== -->
       <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= PATH_FOLDER ?>/public/theme/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= PATH_FOLDER ?>/public/theme/assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= PATH_FOLDER ?>/public/theme/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= PATH_FOLDER ?>/public/theme/assets/images/logo-light.png" alt="" height="17">
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
                        <li class="menu-title"><span data-key="t-menu">Quản lí</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="?url=trangchu">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Trang chủ</span>
                            </a>
                            
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Quản lí sản phẩm</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="?url=danh-sach-san-pham" class="nav-link" data-key="t-chat"> Danh sách sản phẩm </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?url=them-san-pham" class="nav-link" data-key="t-chat"> Thêm mới sản phẩm </a>
                                </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Quản lý khác</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Quản lý danh mục</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAuth">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="?url=danh-sach-danh-muc" class="nav-link"> Danh sách danh mục
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?url=them-danh-muc" class="nav-link">Thêm danh mục
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                                <i class="ri-pages-line"></i> <span data-key="t-pages">Quản lý tài khoản</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarPages">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="?url=danh-sach-tai-khoan" class="nav-link" data-key="t-term-conditions">Danh sách tài khoản </a>
                                    </li>
                                </ul>   
                            </div>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarOder" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                                <i class="ri-pages-line"></i> <span data-key="t-pages">Quản lý đơn hàng</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarOder">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="?url=danh-sach-don-hang" class="nav-link" data-key="t-term-conditions">Danh sách đơn hàng</a>
                                    </li>
                            </div>    
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>