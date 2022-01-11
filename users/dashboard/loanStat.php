<?php

include "../includes/dashboard-header.php";

?>
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
                    <h1 class="h3 mb-2 text-gray-800">Mvita Loans | User</h1>
                    <p class="mb-4"> View Loan Status</p>

                    <!-- DataTables Test -->

                    <div class="view-splitter">
                        

                        <div class="card shadow mb-4 loan_status">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-primary">Applied Loan Status</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Guaranter Name</th>
                                                <th>Guaranter ID</th>
                                                <th>Loan Amount</th>
                                                <th>Total to be paid</th>
                                                <th>Loan Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Guaranter Name</th>
                                            <th>Guaranter ID</th>
                                            <th>Loan Amount</th>
                                            <th>Total to be paid</th>
                                            <th>Loan Status</th>
                                        </tr>
                                        </tfoot>
                                        <?php
                                            // selecting from users
                                            $selUser = "SELECT id from users WHERE Fullname = '{$_SESSION['user_name']}'";
                                            $run = mysqli_query($mysqli, $selUser);
                                            $justRow = mysqli_fetch_assoc($run);
                                            $user_id = $justRow['id'];
                                            
                                            // selecting from borrowers table
                                            $selPlan = "SELECT * FROM borrowers WHERE user_id = $user_id";
                                            $ret = mysqli_query($mysqli, $selPlan);

                                        ?>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_assoc($ret)): ?>
                                                <tr>
                                                    <td><?php echo $row['guaranter_fullname']; ?></td>
                                                    <td><?php echo $row['guaranter_id']; ?></td>
                                                    <td><?php echo $row['amount']; ?></td>
                                                    <td><?php echo $row['totalPay']; ?></td>
                                                    <td><?php echo $row['approval_status']; ?></td>
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
    </div>
    

    <script>
        $(document).ready( function () {
    $('#dataTable').DataTable();
} );

    </script>

</body>
</html>