<?php

session_start();

include_once "../../dbConfig/config.php";

$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['pwd1']);

if (!empty($email) && !empty($password)) {
    
    // Checking if email and password match
    $sqlcheck = "SELECT * FROM users WHERE Email='{$email}' AND PassCode='{$password}'";
    $rescheck = mysqli_query($mysqli, $sqlcheck);

    if (mysqli_num_rows($rescheck) > 0) { //if user creddentials match
        
        $row = mysqli_fetch_assoc($rescheck);

        $_SESSION['user_name'] = $row['Fullname'];
        $_SESSION['user_id'] = $row['id'];
        echo "Success";

    }else{
        echo "Email or Password is incorrect";
    }
}else{
    echo "All input Fields are required!";
}


?>