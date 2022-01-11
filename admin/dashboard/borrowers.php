<?php

include "../includes/dashboard-header.php";


if (isset($_GET['update'])) {
    
    $id = $_GET['update'];
    $status = "Disbursed";

    // update query || approving the loan
    $disburse = "UPDATE borrowers SET approval_status = '$status' WHERE id = $id";
    $result = mysqli_query($mysqli, $disburse);
    if ($result) {
        header("Location: borrowers.php");
    }else{
        echo "<script>window.alert('Something went wrong');</script>";
    }
}

// if cancel icon is clicked

if (isset($_GET['cancel'])) {
    
    $id = $_GET['cancel'];
    $status = "Denied";

    // update query || approving the loan
    $disburse = "UPDATE borrowers SET approval_status = '$status' WHERE id = $id";
    $result = mysqli_query($mysqli, $disburse);
    if ($result) {
        header("Location: borrowers.php");
    }else{
        echo "<script>window.alert('Something went wrong');</script>";
    }
}

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

                        
                    <button class="printer-btn">Print contents</button>
                    <div class="card shadow mb-4" id="loan_status">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">List of Borrowers</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Loaner's Name</th>
                                            <th>Guaranter Name</th>
                                            <th>Guaranter ID</th>
                                            <th>Loan Amount</th>
                                            <th>Loan Purpose</th>
                                            <th>Total to be paid</th>
                                            <th>Loan Status</th>
                                            <th>Loan Approval</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Loaner's Name</th>
                                        <th>Guaranter Name</th>
                                        <th>Guaranter ID</th>
                                        <th>Loan Purpose</th>
                                        <th>Loan Amount</th>
                                        <th>Total to be paid</th>
                                        <th>Loan Status</th>
                                        <th>Loan Approval</th>
                                    </tr>
                                    </tfoot>
                                    <?php
                                        // selecting from users
                                        
                                        
                                        // selecting from borrowers table
                                        $selPlan = "SELECT * FROM borrowers;";
                                        $ret = mysqli_query($mysqli, $selPlan);

                                    ?>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($ret)): ?>
                                            <?php
                                                $selUser = "SELECT Fullname from users WHERE id = {$row['user_id']}";
                                                $run = mysqli_query($mysqli, $selUser);
                                                $justRow = mysqli_fetch_assoc($run);
                                                $user_name = $justRow['Fullname'];
                                            ?>
                                            <tr>
                                                <td><?php echo $user_name; ?></td>
                                                <td><?php echo $row['guaranter_fullname']; ?></td>
                                                <td><?php echo $row['guaranter_id']; ?></td>
                                                <td><?php echo $row['loan_type']; ?></td>
                                                <td><?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['totalPay']; ?></td>
                                                <td><?php echo $row['approval_status']; ?></td>
                                                <td class="approval-icons">
                                                    <a href="borrowers.php?update=<?php echo $row['id']; ?>" tooltip="disburse loan"><i class="icofont-tick-mark"></i></a>
                                                    <a href="borrowers.php?cancel=<?php echo $row['id']; ?>" tooltip="disapprove loan"><i class="icofont-ui-close"></i></a>
                                                </td>
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

    <script>
        const printBtn = document.querySelector(".printer-btn");
        const printPageAreA = (areaID) => {
            let printContent = document.querySelector(areaID);
            let WinPrint = window.open('', '', 'width=900, height=650');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close()
            WinPrint.focus();loan_status
            WinPrint.print();
            WinPrint.close();
        }

        printBtn.onclick = () => {
            printPageAreA("#loan_status");
            alert("clicked");
        }
    </script>

</body>
</html>