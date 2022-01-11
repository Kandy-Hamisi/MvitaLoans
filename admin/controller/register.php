<?php

include "../../dbConfig/config.php";

// getting form input

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
$elno = mysqli_real_escape_string($mysqli, $_POST['elno']);
$idno = mysqli_real_escape_string($mysqli, $_POST['idno']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$pwd1 = mysqli_real_escape_string($mysqli, $_POST['pwd1']);
$pwd2 = mysqli_real_escape_string($mysqli, $_POST['pwd2']);


if (!empty($fname) && !empty($lname) && !empty($elno) && !empty($idno) && !empty($email) && !empty($pwd1) && !empty($pwd2)) {
    // checking if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // checking if the email already exists
        $checkQuery = "SELECT Email FROM admins WHERE Email = '$email'";
        $run = mysqli_query($mysqli, $checkQuery);

        // if the email exists
        if (mysqli_num_rows($run) > 0) {
            echo "$email - already exists";
        }else {

            if ($pwd1 === $pwd2) {
                $fullname = $fname. " ". $lname;
                // inserting the details into the mysql database
                $insert = "INSERT INTO admins(Fullname, IdNumber, ElectorsNo, Email, PassCode)
                            VALUES('$fullname', $idno, '$elno', '$email', '$pwd1')";
                $runQuery = mysqli_query($mysqli, $insert);

                if ($runQuery) {
                    echo "Success";
                }else {
                    echo "Something Went Wrong";
                    printf("Error: \n%s ", mysqli_error($mysqli));
                }

            }else {
                echo "The Two Passwords don't match";
            }
        }
    }else{
        echo "$email - is not a valid email";
    }
}else{
    echo "All Fields are Required!!";
}


?>