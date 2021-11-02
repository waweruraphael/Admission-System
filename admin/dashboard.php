<?php
include('functions.php');

if (!isLoggedIn()) {
    $_SESSION["msg"] = "Please Login";
    header('location:index.php?sub-cat default');
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

    <title>UAMS||Dashboard</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
                        unset($_SESSION['success']);
                    }
                    ?>


                    <!-- Content Row -->


                    <div class="row">
                        <div class="col-xl-7 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Register students</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form class="row g-3" action="import.php" method="POST">

                                        <div class="col-md-6">
                                            <label class="form-label">Surname</label>
                                            <input type="text" class="form-control" name="Surname" id="inputsurname">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Firstname</label>
                                            <input type="text" class="form-control" name="Firstname" id="inputfirstname">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="Lastname" id="inputlastname">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Male" name="Gender" id="Gender1">
                                                <label class="form-check-label" for="Gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="Female" name="Gender" id="Gender2">
                                                <label class="form-check-label" for="Gender1">
                                                    Female
                                                </label>
                                            </div>

                                        </div>

                                        <div class="col-12">

                                            <select class="control-control" id="select-course" name="course">
                                                <option selected disabled>---Select Course---</option>

                                                <?php
                                                include_once 'db/db.php';
                                                $query = "select * from courses";
                                                $results = mysqli_query($conn, $query);
                                                while ($rows = mysqli_fetch_assoc(@$results)) {
                                                ?>
                                                    <option value="<?php echo $rows['course_code']; ?>"><?php echo $rows['Description']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="btn-register" class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Register students</h6>

                                </div>
                                <div class="card-body">
                                    <div class="span6" id="form-login">
                                        <form class="form-horizontal well"  id="myForm" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">

                                            <fieldset>
                                                <div class="col-12">

                                                    <select class="control-control" id="select-course" name="course">
                                                        <option selected disabled>---Select Course---</option>

                                                        <?php
                                                        include_once 'db/db.php';
                                                        $query = "select * from courses";
                                                        $results = mysqli_query($conn, $query);
                                                        while ($rows = mysqli_fetch_assoc(@$results)) {
                                                        ?>
                                                            <option value="<?php echo $rows['course_code']; ?>"><?php echo $rows['Description']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <legend>Import CSV/Excel file</legend>
                                                <div class="control-group">
                                                    <div class="control-label">
                                                        <label>CSV/Excel File:</label>
                                                    </div>
                                                    <div class="controls">
                                                        <input type="file" name="file" id="csvFile" class="input-large">
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
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
    <script>
    const myForm = document.getElementById("myForm");
    const csvFile = document.getElementById("csvFile");

    function csvToArray(str, delimiter = ",") {

      // slice from start of text to the first \n index
      // use split to create an array from string by delimiter
      const headers = str.slice(0, str.indexOf("\n")).split(delimiter);

      // slice from \n index + 1 to the end of the text
      // use split to create an array of each csv value row
      const rows = str.slice(str.indexOf("\n") + 1).split("\n");

      

      // return the array
      return arr;
    }
    $("#myForm").click(function() {
        drawNumbers();
        console.log(csvToArray);
        var jsoncsvToArray = JSON.stringify(csvToArray);

        $.ajax({
            url: "admin/import.php",
            type: 'POST',
            data: {data:jsoncsvToArray},
            dataType: "json",
            async: false,
            cache: false,
        });
    });

    myForm.addEventListener("Import", function (e) {
      e.preventDefault();
      const input = csvFile.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        const text = e.target.result;
        const data = csvToArray(text);
        document.write(JSON.stringify(data));
      };
      
      reader.readAsText(input);
    });
  </script>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>