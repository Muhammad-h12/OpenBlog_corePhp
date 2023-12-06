<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>" target="_blank" role="button">
                <i class="fa fa-globe" aria-hidden="true"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>

            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">


        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="image user-panel">
                    <img src="" class="img-circle elevation-2" alt="User Image">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>


                <div class="dropdown-divider"></div>
                <div class="px-4 dropdown-item">
                    <div class="font-medium text-base text-gray-800"> <i class="fas fa-user mr-2"></i>User Name -  User Role</div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="mt-3 dropdown-item space-y-1">
                        Profile
                </div>
                <div class="dropdown-item">
                    Email
                </div>
                <div class="dropdown-item">
                    <!-- Authentication -->
                    <form method="POST" action="">
                        logout
                    </form>
                </div>

            </div>
        </li>





        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">-->
<!--                <i class="fas fa-th-large"></i>-->
<!--            </a>-->
<!--        </li>-->

    </ul>
</nav>
