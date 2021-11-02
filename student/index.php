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

                <!-- Topbar -->

                <?php include("includes/topnav.php"); ?>
                <!-- Topbar Navbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table no-margin">
                                        <tbody>
                                            <tr>
                                                <td>Admission No:<?php echo $_SESSION['suser']['User_ID']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ID/ Passport:<?php echo $_SESSION['suser']['IdNo']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fullname:<?php echo $_SESSION['suser']['Surname'] . ' ' . $_SESSION['suser']['Firstname'] . ' '  . $_SESSION['suser']['Lastname']; ?></td>
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
                                                
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-5 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Information</h6>
                                    
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <?php
                                $sql = "SELECT Photo FROM personal_details where User_ID = '".$_SESSION ['suser']['User_ID']."'";
                                $records = mysqli_query($conn,$sql);
                                while($data = mysqli_fetch_array($records))
                                    {
                                       
                                            echo "      
                              <i  class=' far fa-book-alt'></i> " . $data['Photo'] . "
                              
                          ";
                                    }
                                    

                                    echo $_SESSION['suser']['Photo'];
                                    
                                ?>
                                 <hr class="sidebar-divider">
                                 <?php
                                    $sql = "SELECT personal_details.User_ID,courses.Description FROM personal_details 
                                    INNER JOIN courses ON personal_details.course_code = courses.course_code AND User_ID = '".$_SESSION ['suser']['User_ID']."'";
                                    $records=  mysqli_query($conn,$sql);
                                    while($data = mysqli_fetch_array($records))
                                    {
                                       
                                        
                                            echo "
                            
                              
                              <h4><i  class=' far fa-book-alt'></i> " . $data['Description'] . "</h4>
                              
                            
                          ";

                          
                                    }
                                    


                                ?>
                                    
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- /.container-fluid -->

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



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

   

</body>

</html>