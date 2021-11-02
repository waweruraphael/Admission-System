<?php
include('functions.php');
include('report.php');
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

    <title> Admissions</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
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
                <?php include("includes/topnav.php"); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>


                    <form action="tables.php" method="post">
                        <fieldset class="form-group">
                            <select class="form-select" id="select-course" name="course">
                                <option selected disabled>Select Course</option>
                                <?php
                                include_once 'db/db.php';

                                $query = "select * from courses";
                                $results = mysqli_query($conn, $query);
                                while ($rows = mysqli_fetch_assoc(@$results)) {
                                ?>
                                    <option value="<?php echo $rows['course_code'] ?>"><?php echo $rows['Description']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </fieldset>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">

                            <button name="show-student" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Show </button>

                        </div>
                    </form>



                    <!-- admission list -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admission List</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>RegNo</th>
                                            <th>Surname</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Gender</th>
                                            <th>Admission_year</th>
                                            <th>Image</th>
                                            <th class="not-export-col">Edit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($arr_users)) { ?>
                                            <?php foreach ($arr_users as $user) { ?>
                                                <tr>
                                                    <td><?php echo $user['User_ID']; ?></td>
                                                    <td><?php echo $user['Surname']; ?></td>
                                                    <td><?php echo $user['Firstname']; ?></td>
                                                    <td><?php echo $user['Lastname']; ?></td>
                                                    <td><?php echo $user['Gender']; ?></td>
                                                    <td><?php echo $user['Admission_year']; ?></td>
                                                    <td><?php echo "<img style='width: 50px; length: 50px;' src='images/" . $user['Photo'] . "' >"; ?></td>
                                                    <td><button type="button" class="text-primary edit btn btn-sucess btn-sm px-3" id="updateBtn"><i class="fas fa-pencil-alt"></i></button></td>


                                                </tr>
                                            <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Modal -->
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Update Student Details</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#" method="POST">
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right">RegNo</label>

                                        <input type="text" name="User_ID" id="User_ID" class="form-control ">

                                    </div>
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right">Surname</label>

                                        <input type="text" name="Surname" id="Surname" class="form-control ">

                                    </div>

                                    <div class="md-form mb-4">
                                        <label data-error="wrong" data-success="right">Firstname</label>

                                        <input type="text" name="Firstname" id="Firstname" class="form-control ">

                                    </div>
                                    <div class="md-form mb-4">
                                        <label data-error="wrong" data-success="right">Lastname</label>

                                        <input type="text" name="Lastname" id="Lastname" class="form-control ">

                                    </div>
                                    <label data-error="wrong" data-success="right">Lastname</label>

                                    <input type="text" name="Gender" id="Gender" class="form-control ">

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
                buttons: [

                    {
                        text: 'csv',
                        className: 'btn-primary',
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'excel',
                        className: 'btn-primary',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                        className: 'btn-primary',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'print',
                        extend: 'print',
                        className: 'btn-primary',
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
                $('#User_ID').val(data[0]);
                $('#Surname').val(data[1]);
                $('#Firstname').val(data[2]);
                $('#Lastname').val(data[3]);
                $('#Gender').val(data[4]);



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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>