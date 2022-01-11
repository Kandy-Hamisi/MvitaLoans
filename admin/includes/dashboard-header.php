<?php 

session_start();
if (isset($_SESSION['admin_name'])) {
    include_once "../../dbConfig/config.php"; 
}else{
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
     <script src="../../vendor/Jquery/jquery-3.4.1.slim.js"></script>
    <script src="../../sb/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="../../sb/js/sb-admin-2.min.js"></script>
    <script src="../../sb/js/sb-admin-2.js"></script>

    <!-- Datatable scripts -->
    
    <link rel="stylesheet" href="../../sb/DataTable/DataTables-1.10.25/css/jquery.dataTables.css">
  
    <script src="../../sb/DataTable/DataTables-1.10.25/js/jquery.dataTables.js"></script>

    

    <link href="../../sb/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="../../sb/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../sb/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/admin/main.css">
    <link rel="stylesheet" href="../../vendor/icofont/icofont.min.css">
    <title>My admin Panel</title>
</head>