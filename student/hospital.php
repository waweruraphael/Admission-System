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
                        <h1 class="h3 mb-0 text-gray-800">Student Entrance Medical Examination</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- forms -->
                        <?php
                                if (isset($_SESSION['Success'])) {
                                ?>
                                    <div class="alert alert-success" role="alert">
                                         <?php  echo $_SESSION['Success'];?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        <script>$(".alert").alert('close')</script>
                                    </div>
                                <?php
                                    unset($_SESSION['Success']);
                                }
                                ?>
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Medical Record</h6>
                                </div>
                                <!-- Card Body -->
                               
                                <div class="card-body">
                                    <form action="hospitaldetail.php" method="POST" enctype="multipart/form-data">
                                        <p>Personal Information</p>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input name="User_ID" class="form-control" value="<?php echo $_SESSION['suser']['User_ID']; ?>" type="text" disabled>
                                            </div> <!-- form-group// -->
                                        </div>
                                        <hr class="form-divider">
                                        <div class="form-group">
                                            <p>Have You ever been in an in-patient hospital or nursing home?If so when and for what complaints</p>
                                            <textarea class="form-control" aria-label="With textarea" name="Inpatient_record"></textarea>
                                        </div>

                                        <hr class="form-divider">
                                        <p>Have you suffered from or has symptom of any of the following</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="Tuberculosis" id="">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tuberculosis or other chest infection
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="Fits" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Fits, Nervous disease or fainting attacks
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="Rheumatic fever" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Heart Disease or Rheumatic fever
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="digestive-disease" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Any diseases of the digestive system
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="Urinary-disease" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Any disease of the Genital-Urinary System
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="Allergies" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Allergies to food or drugs
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="Malaria" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Malaria
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="STI" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Sexually Transmitted Disease
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="polio" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Poliomyelitis
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Suffered_symptoms[]" value="deformity" id="">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Any physical defect or deformity
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <p>If yes please give details with dates</p>
                                            <textarea class="form-control" aria-label="With textarea" name="Details"></textarea>
                                        </div>
                                        <hr class="form-divider">
                                        <div class="form-group">
                                            <p>Is there any other relevant details of your Medical History not covered by the above questions?</p>
                                            <textarea class="form-control" aria-label="With textarea" name="Medical_history"></textarea>
                                        </div>
                                        <hr class="form-divider">
                                        <div>
                                            <p>Have you been immunized against the following diseases?</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Immunization[]" value="small pox" id="">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Smaillpox
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Immunization[]" value="Tetanus" id="">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Tetanus
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="Immunization[]" value="Poliomyelitis" id="">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Poliomyelitis
                                                </label>
                                            </div>


                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Medical Report</label>
                                                <input class="form-control" type="file" id="image" name="Photo">
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class=" col-sm-2">
                                                <button type="submit" class="btn btn-primary btn-block" name="btn-health">Submit </button>
                                            </div> <!-- form-group// -->
                                            <div class=" col-sm-2">
                                                <button type="submit" id="update" class="btn btn-secondary btn-block" name="update-health">Update</button>
                                            </div> <!-- form-group// -->

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