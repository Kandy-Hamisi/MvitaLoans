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
                    <p class="mb-4">Add Loan Plans | Time Taken to Pay the Loans</p>

                    <!-- DataTables Test -->

                    <div class="view-splitter">
                        
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-primary">Add Plan</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="error-text"></div>
                                    <div class="form-group">
                                        <label for="">Enter Number of Months</label>
                                        <input type="number" class="form-control" id="months" name="months">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Interest rate</label>
                                        <input type="number" name="interest" id="interest" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Overdue Rate</label>
                                        <input type="number" name="overdue" id="overdue" class="form-control">
                                    </div>
                                    <div class="form-group button">
                                        <input type="submit" class="btn btn-primary" name="submit" id="submit">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-primary">Plans</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Number of Months</th>
                                                <th>Interest Rate</th>
                                                <th>Overdue Rate</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Number of Months</th>
                                            <th>Interest Rate</th>
                                            <th>Overdue Rate</th>
                                        </tr>
                                        </tfoot>
                                        <?php
                                            $selPlan = "SELECT * FROM loan_plans";
                                            $ret = mysqli_query($mysqli, $selPlan);

                                        ?>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_assoc($ret)): ?>
                                                <tr>
                                                    <td><?php echo $row['months']; ?></td>
                                                    <td><?php echo $row['interest_rate']. "%"; ?></td>
                                                    <td><?php echo $row['overdue_rate']. "%"; ?></td>
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
    <script src="../../JS/admin/loanPlan.js"></script>
</body>
</html>