<?php
include('../admin/functions.php');
include('../admin/addcourse.php');
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

                <!-- Topbar -->

                <?php include("includes/topnav.php"); ?>
                <!-- Topbar Navbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                       <!-- messages -->
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
                        <!---end message -->



                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Course List</h1>

                    </div>


                    <!-- Content Row -->

                    <div class="row">
                     

                        <div class="col-xl-5 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add course</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="course.php" method="POST">
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> </span>
                                            </div>
                                            <input name="course_code" class="form-control" placeholder="Course code" type="text">
                                        </div> <!-- form-group// -->
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> </span>
                                            </div>
                                            <input name="Description" class="form-control" placeholder="Course" type="text">
                                        </div> <!-- form-group// -->
                                        <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text"> </span>
                                            </div>
                                        <select class="form-select" name="Faculty" aria-label="Default select example">
                                            <option selected>Select Faculty</option>
                                            <option value="Computing and Informatics">Computing and Informatics</option>
                                            <option value="Medicine">Medicine</option>
                                            <option value="Education">Education</option>
                                            <option value="Biological and Physical Sciences">Biological and Physical Sciences</option>
                                            <option value="Public Health and Community Development.">Public Health and Community Development.</option>
                                            <option value="Environment and Earth Sciences">Environment and Earth Sciences</option>
                                            <option value="Development and Strategic Studies">Development and Strategic Studies</option>
                                            <option value=" BUSINESS AND MANAGEMENT SCIENCES"> BUSINESS AND MANAGEMENT SCIENCES</option>
                                        
                                        </select>
                                        </div> <!-- form-group// -->
                                        <div class="form-group">
                                            <button name="Submit" type="submit" class="btn btn-primary btn-block"> Add Course </button>
                                        </div> <!-- form-group// -->
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- add courses -->
                        <div class="col-xl-7 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <?php
                                            

                                            $sql = "SELECT  course_code,Description,Faculty FROM courses ORDER BY Faculty ASC ";
                                            $result = mysqli_query($conn,$sql);
                                            $arr_users = [];
                                            if ($result->num_rows > 0) {
                                                $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                                            }
                                            ?>
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Course code</th>
                                                        <th>Course</th>
                                                        <th>Faculty</th>
                                                        <th class="not-export-col">Edit</th>
                                                        <th class="not-export-col">Delete</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php if (!empty($arr_users)) { ?>
                                                        <?php foreach ($arr_users as $user) { ?>
                                                            <tr>
                                                                <td><?php echo $user['course_code']; ?></td>
                                                                <td><?php echo $user['Description']; ?></td>
                                                                <td><?php echo $user['Faculty']; ?></td>
                                                                <td><button type="button" class="text-primary edit btn btn-sucess btn-sm px-3" id="updateBtn"><i class="fas fa-pencil-alt"></i></button></td>

                                                                <td><a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" class="text-primary edit" name="contact_email" id="<?php echo $data['id']; ?>"><i class='far fa-edit'></i></a></td>

                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Update Courses</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="course.php" method="POST">
                                    <div class="modal-body mx-3">
                                        <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right">Course Code</label>

                                            <input type="text" name="course_code" id="course_code" class="form-control ">
                                            
                                        </div>
                                        <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right">Description</label>

                                            <input type="text" name="Description" id="description"  class="form-control ">
                                           
                                        </div>

                                        <div class="md-form mb-4">
                                        <label data-error="wrong" data-success="right">Faculty</label>

                                            <input type="text" name="Faculty" id="faculty" class="form-control ">
                                            
                                        </div>

                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-primary" name="Update">Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- /.end modal -->

                    <div class="row">


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
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: "<'row'<'col-md-6'B><'col-md-6'f>>" + "rt" + "<'row'<'col-md-6'i><'col-md-6'p>>",
                buttons: [{
                        text: 'csv',
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                        backgroundColor: 'LightGreen',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'print',
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                ],
                "bDestroy": true,
            })

            var table = $('#dataTable').DataTable();

            table.on('click', '#updateBtn', function() {
                $('#modalRegisterForm').modal('show');

                //Get the courses details from table row
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                //assign data
                $('#course_code').val(data[0]);
                $('#description').val(data[1]);
                $('#faculty').val(data[2]);



            })
        })
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>