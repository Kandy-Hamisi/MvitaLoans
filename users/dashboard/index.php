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
                    <h1 class="h3 mb-2 text-gray-800">Sega Hospital Doctors</h1>
                    <p class="mb-4">Have a look at the list of doctors and their Specializations.</p>

                    <!-- DataTables Test -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Doctors</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-repsonsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Specialization</th>
                                            <th>Doctor's Name</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Specialization</th>
                                            <th>Doctor's Name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            // selecting doctors
                                            $sql = "SELECT * FROM doctors";
                                            $result = mysqli_query($mysqli, $sql);
                                            
                                        ?>
                                        <?php while($myRow = mysqli_fetch_assoc($result)): ?>
                                            <!-- selectig specialization -->
                                            <?php
                                                $spec = "SELECT specialization FROM specialization WHERE id={$myRow['specialization_id']}";
                                                $return = mysqli_query($mysqli, $spec);
                                                $specRow = mysqli_fetch_assoc($return);
                                                $specialization = $specRow['specialization'];
                                            ?>
                                            <tr>
                                                <td><?php echo $specialization; ?></td>
                                                <td><?php echo $myRow['DocName']; ?></td>
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