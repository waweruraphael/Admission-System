                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <?php if ($_SESSION['suser']) { ?>
                                <a class="py-4 ps-5 d-none d-md-inline-block" class="btn btn-sm btn-outline-secondary" href="../student/logout.php?logout">Logout</a>
                            <?php } else { ?>
                                <a class="py-4 px-3 d-none d-md-inline-block" class="btn btn-sm btn-outline-secondary" href="../student/login.php">Login</a>
                            <?php } ?>
                        </li>

                    </ul>

                </nav>

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>