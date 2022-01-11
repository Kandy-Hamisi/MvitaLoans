<?php 

session_start();
if (isset($_SESSION['admin_name'])) {
    include_once "../controller/config.php";
}else {
    header("Location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sb-admin-2.js"></script>

    <!-- Datatable scripts -->
    <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" href="vendor/DataTable/DataTables-1.10.25/css/jquery.dataTables.css">
  
<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> -->
<script src="vendor/DataTable/DataTables-1.10.25/js/jquery.dataTables.js"></script>

    <!-- dataTables css link -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <title>Sega | Admin module</title>
    <style>
        .split-managements{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }
        .my-card{
            padding: 30px 20px;
            text-align: center;
            border: 1px solid #333;
            border-radius: 3px;
        }
    </style>
</head>
<body id="page-top">
    
    <!-- Page wrapper -->
    <div id="wrapper">

        <!-- including the page sidebar -->
        <?php include_once "partials/sidebar.php"; ?>

        <!-- Content-wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            
                <!-- including the topbar/navbar -->
                <?php include_once "partials/navbar.php"; ?>
            

                <!-- Beginning Page Content -->
                <div class="container-fluid">
                    <!-- page heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <section class="myDivisions">
                        <div class="split-managements">
                            <?php
                                // select users and number them
                                $selUser = "SELECT * FROM users";
                                $ret = mysqli_query($mysqli, $selUser);
                                $cntUser = mysqli_num_rows($ret)

                            ?>
                            <div class="my-card">
                                <h4>Manage users</h4>
                                <h6><?php echo $cntUser; ?></h6>
                            </div>
                            <?php
                                $selDoc = "SELECT * FROM doctors";
                                $return = mysqli_query($mysqli, $selDoc);
                                $cntDoc = mysqli_num_rows($return);
                            ?>
                            <div class="my-card">
                                <h4>Manage Doctors</h4>
                                <h6><?php echo $cntDoc; ?></h6>
                            </div>
                            <?php
                                $selPat = "SELECT * FROM patients";
                                $res = mysqli_query($mysqli, $selPat);
                                $cntPat = mysqli_num_rows($res);
                            ?>
                            <div class="my-card">
                                <h4>Manage Patients</h4>
                                <h6><?php echo $cntPat; ?></h6>
                            </div>
                            <?php
                                // select number of appointments
                                $selApp = "SELECT * FROM appointments";
                                $result = mysqli_query($mysqli, $selApp);
                                $cntApp = mysqli_num_rows($result);
                            ?>
                            <div class="my-card">
                                <h4>Manage Appointments</h4>
                                <h6><?php echo $cntApp; ?></h6>
                            </div>
                        </div>
                    </section>

                </div>

            </div>
        </div>
    </div>

    <script>
//         $(document).ready( function () {
//     $('#dataTable').DataTable();
// } );
    
    </script>
</body>
</html>