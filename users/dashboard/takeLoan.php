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
                    <p class="mb-4">Apply for a Loan</p>

                    <!-- DataTables Test -->

                    <div class="view-splitter">
                        
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-primary">Add Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" class="form-splitter">
                                    <div class="guaranter-details">
                                        <div class="error-text"></div>
                                        <div class="form-group">
                                            <label for="">select Ward</label>
                                            <select name="ward" class="form-control" id="ward">
                                                <option value="">Select County Assembly Ward</option>
                                                <?php
                                                    $selWard = "SELECT * FROM wards";
                                                    $res = mysqli_query($mysqli, $selWard);
                                                ?>
                                                <?php while($myRow = mysqli_fetch_assoc($res)): ?>
                                                    <option value="<?php echo $myRow['id']; ?>"><?php echo $myRow['ward_name']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Enter Your residence</label>
                                            <input type="text" name="residence" id="residence" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Enter Guaranter's Name</label>
                                            <input type="text" class="form-control" id="gname" name="gname">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Guaranter National ID</label>
                                            <input type="text" name="gid" id="gid" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Guaranter Relationship</label>
                                            <input type="text" name="grel" id="grel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="loan-details">
                                        <div class="form-group">
                                            <label for="">select Loan Type</label>
                                            <select name="loantype" class="form-control" id="loantype">
                                                <option value="">Select Loan Type</option>
                                                <?php
                                                    $selType = "SELECT * FROM loan_types";
                                                    $run = mysqli_query($mysqli, $selType);
                                                ?>
                                                <?php while($r = mysqli_fetch_assoc($run)): ?>
                                                    <option value="<?php echo $r['loan_type']; ?>"><?php echo $r['loan_type']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Enter Loan Amount</label>
                                            <input type="number" name="amount" id="amount" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">select Loan Plan</label>
                                            <select name="loanplan" class="form-control" id="loanplan">
                                                <option value="">Select Loan Plan</option>
                                                <?php
                                                    $selPlan = "SELECT * FROM loan_plans";
                                                    $ret = mysqli_query($mysqli, $selPlan);
                                                ?>
                                                <?php while($row = mysqli_fetch_assoc($ret)): ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['months']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group button">
                                            <input type="submit" class="btn btn-primary" name="submit" data-toggle="modal" data-target="#exampleModal" id="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold text-primary">Applied Loan Details</h3>
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
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Guaranter Name</th>
                                            <th>Guaranter ID</th>
                                            <th>Loan Amount</th>
                                            <th>Total to be paid</th>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View The Interest, Overdue and final payments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="body-splitter" style="display:flex; justify-content: space-between; align-items: center;">
                        <div class="guaranter-details">
                            <ul>
                                <li class="first">Guaranter's Name: <span></span></li>
                                <li class="second">Guaranter's ID: <span></span></li>
                                <li class="third">Ward: <span></span></li>
                                <li class="fourth">Residence: <span></span></li>
                            </ul>
                        </div>
                        <div class="loan-details">
                            <ul>
                                <li class="uno">Loan Amount: <span></span></li>
                                <li class="dos">Interest Rate: <span></span></li>
                                <li class="tres">Overdue Rate: <span></span></li>
                                <li class="quatro">Payment: <span></span></li>
                                <li class="quince">Payment per Month: <span></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
    $('#dataTable').DataTable();
} );
    
    </script>
    <script src="../../JS//users/calculations.js"></script>
    <script src="../../JS//users/takeLoan.js"></script>
</body>
</html>