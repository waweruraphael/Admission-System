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
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                                    <form class="row g-3" action="referee.php" method="POST">
                                    <div class="col-md-4">
                                            <label for="validationDefault01" class="form-label">RegNo</label>
                                            <input type="text" class="form-control" id="validationDefault01" value="<?php echo $_SESSION['suser']['User_ID']; ?>" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault01" class="form-label">First name</label>
                                            <input type="text" name="Firstname" class="form-control" id="validationDefault01"  required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault02" class="form-label">Last name</label>
                                            <input type="text" name="Lastname" class="form-control" id="validationDefault02"  required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationDefault02" class="form-label">Relationship</label>
                                            <input type="text" name="Relationship" class="form-control" id="validationDefault02"  required>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="validationDefault03" class="form-label">Telephone</label>
                                            <input type="text" name="Telephone" class="form-control" id="validationDefault03" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationDefault05" class="form-label">Address</label>
                                            <input type="text" name="Address" class="form-control" id="validationDefault05" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary"  name="btn-referee" type="submit">Submit</button>
                                        </div>
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