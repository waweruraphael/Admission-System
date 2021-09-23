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
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("includes/navbar.php"); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar Navbar -->
                <?php include("includes/topnav.php"); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Application Form</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- forms -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Application Form</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form>
                                        <p>Referees</p>
                                        <hr class="form-divider">
                                        <p>Referee 1</p>
                                        <div class="row ">
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="First Name" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Second Name" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Relationship" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Phone Number" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Address" type="text">
                                            </div> <!-- form-group// -->  
                                        </div> 
                                        
                                        <hr class="form-divider">   
                                        <p>Referee 2</p>
                                        <div class="row ">
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="First Name" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Second Name" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Relationship" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Phone Number" type="text">
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <input name="" class="form-control" placeholder="Address" type="text">
                                            </div> <!-- form-group// -->  
                                        </div>                                 
                                        <hr class="form-divider">
                                        <div class=" col-sm-2">
                                            <button type="submit" class="btn btn-primary btn-block">Submit </button>
                                        </div> <!-- form-group// -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include("includes/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>