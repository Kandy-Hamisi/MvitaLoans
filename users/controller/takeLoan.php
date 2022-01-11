<?php

session_start();

include "../../dbConfig/config.php";


// getting form details

$ward  = mysqli_real_escape_string($mysqli, $_POST['ward']);
$residence  = mysqli_real_escape_string($mysqli, $_POST['residence']);
$gname  = mysqli_real_escape_string($mysqli, $_POST['gname']);
$gid  = mysqli_real_escape_string($mysqli, $_POST['gid']);
$loantype  = mysqli_real_escape_string($mysqli, $_POST['loantype']);
$amount  = mysqli_real_escape_string($mysqli, $_POST['amount']);
$loanplan  = mysqli_real_escape_string($mysqli, $_POST['loanplan']);





if (!empty($ward) && !empty($residence) && !empty($gname) && !empty($gid) && !empty($loantype) && !empty($amount) && !empty($loanplan)) {
    
    // selecting fron the users table
    $selUser = "SELECT id FROM users WHERE Fullname = '{$_SESSION["user_name"]}'";
    $run = mysqli_query($mysqli, $selUser);
    $pickRow = mysqli_fetch_assoc($run);
    $userId = $pickRow['id'];

    


    // check if user has a pending loan
    $checkPending = "SELECT approval_status FROM borrowers WHERE approval_status = 'Pending' AND user_id = $userId";
    $check = mysqli_query($mysqli, $checkPending);

    if (mysqli_num_rows($check) > 0) {
        echo "You have a pending loan. Pay it first!!";
    }else{
        // checking the loan plans
        if ($loanplan  == 1) {
            $interest = 0.04;
            $totalPay = $amount + ($amount * $interest);
        }
        // insert into the borrowers table

        $borrowInsert = "INSERT INTO borrowers(user_id, ward_id, residence, guaranter_fullname, guaranter_id, loan_type, amount, loanPlan_id, totalPay, approval_status)
            VALUES($userId, $ward, '$residence', '$gname', $gid, '$loantype', $amount, $loanplan, $totalPay, 'Pending')";
        $return = mysqli_query($mysqli, $borrowInsert);

        if ($return) {
            echo "Success";
        }else {
            printf("Error: %s\n", mysqli_error($mysqli));
        }
    }

}else{
    echo "All fields are required";
}

?>