<?php

include "../../dbConfig/config.php";

// getting form input
$months = mysqli_real_escape_string($mysqli, $_POST['months']);
$interest = mysqli_real_escape_string($mysqli, $_POST['interest']);
$overdue = mysqli_real_escape_string($mysqli, $_POST['overdue']);

if (!empty($months) && !empty($interest) && !empty($overdue)) {
    
    // insert the details
    $insert = "INSERT INTO loan_plans(months, interest_rate, overdue_rate)
                VALUES($months, $interest, $overdue)";
    $run = mysqli_query($mysqli, $insert);

    if ($run) {
        echo "Success";
    }else {
        echo "Something Went Wrong!!";
    }
}else{
    echo "All fields are required";
}


?>