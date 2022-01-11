<?php

include "../../dbConfig/config.php";

// getting form input
$loantype = mysqli_real_escape_string($mysqli, $_POST['loantype']);
$desc = mysqli_real_escape_string($mysqli, $_POST['desc']);

if (!empty($loantype) && !empty($desc)) {
    
    // insert the details
    $insert = "INSERT INTO loan_types(loan_type, description)
                VALUES('$loantype', '$desc')";
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