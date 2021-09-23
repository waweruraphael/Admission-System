<?php
include('functions.php');
if (!isLoggedIn()) {
    $_SESSION["msg"] = "Please Login";
    header('location:login.php?sub-cat default');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("includes/navbar.php"); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <?php include("includes/topnav.php"); ?>
                <!-- Topbar Navbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Student Dashboard</h1>
                    </div>
                    <!-- Content Row -->

                    <div class="row">
                        <!--Profile-->


                        <!-- personal information -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table no-margin">
                                                <tbody>
                                                    <tr>
                                                        <td>Admission No:<?php echo $_SESSION['suser']['User_ID']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>ID/ Passport:<?php echo $_SESSION['suser']['IdNo']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Surname:<?php echo $_SESSION['suser']['Surname']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Firstname:<?php echo $_SESSION['suser']['Firstname']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lastname:<?php echo $_SESSION['suser']['Lastname']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender:<?php echo $_SESSION['suser']['Gender']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth:<?php echo $_SESSION['suser']['DOB']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number:<?php echo $_SESSION['suser']['Telephone']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email Address:<?php echo $_SESSION['suser']['Email']; ?></td>
                                                        <td>
                                                            <div>
                                                                <span id="Main1_lblEmail"></span>
                                                            </div>
                                                        </td>
                                                    </tr>



                                                </tbody>
                                            </table>
                                            <div class="col-xs-12">
                                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4>
                                                        <span id="Main1_lblError"></span>
                                                    </h4>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.box-body --

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
               

                                </div>
                                <!-- End of Main Content -->

                                <!-- Footer -->
                                <? include("include/footer.php"); ?>
                                <!-- End of Footer -->

                            </div>
                            <!-- End of Content Wrapper -->

                        </div>
                        <!-- End of Page Wrapper -->

                        <!-- Scroll to Top Button-->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>

                        <!-- Logout Modal-->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="login.html">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap core JavaScript-->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                        <!-- Core plugin JavaScript-->
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                        <!-- Custom scripts for all pages-->
                        <script src="js/sb-admin-2.min.js"></script>

                        <!-- Page level custom scripts -->
                        <script src="js/demo/chart-area-demo.js"></script>
                        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>