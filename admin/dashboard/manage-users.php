<?php

include "../includes/dashboard-header.php";

?>
<body id="page-top">
    
    <!-- Page wrapper -->
    <div id="wrapper">

        <!-- including the page sidebar -->
        <?php include_once "../../sb/partials/sidebar.php"; ?>

        <!-- Content-wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            
                <!-- including the topbar/navbar -->
                <?php include_once "../../sb/partials/navbar.php"; ?>
            

                <!-- Beginning Page Content -->
                <div class="container-fluid">
                    <!-- page heading -->
                    <h1 class="h3 mb-2 text-gray-800">Mvita Loans | Admin</h1>
                    <p class="mb-4"> View borrowers</p>

                    <!-- DataTables Test -->

                        

                    <div class="card shadow mb-4 loan_status">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">List Of Users</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User's Name</th>
                                            <th>ID Number</th>
                                            <th>Elector's Number</th>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User's Name</th>
                                            <th>ID Number</th>
                                            <th>Elector's Number</th>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                        // selecting from users
                                        
                                        
                                        // selecting from borrowers table
                                        $selPlan = "SELECT * FROM users;";
                                        $ret = mysqli_query($mysqli, $selPlan);

                                    ?>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($ret)): ?>
                                            
                                            <tr>
                                                <td><?php echo $row['Fullname']; ?></td>
                                                <td><?php echo $row['IdNumber']; ?></td>
                                                <td><?php echo $row['ElectorsNo']; ?></td>
                                                <td><?php echo $row['Email']; ?></td>
                                                <td><?php echo $row['CreatedDate']; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    

                </div>

            </div>
        </div>
    </div>
    

    <script>
        $(document).ready( function () {
    $('#dataTable').DataTable();
} );

    </script>

</body>
</html>