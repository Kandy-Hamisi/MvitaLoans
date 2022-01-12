<?php


// Importing PHpMailer classes into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// load composer's autoloader
require "../../vendor/autoload.php";


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
        $checkQuery = "SELECT Email FROM users WHERE Email = '$email'";
        $run = mysqli_query($mysqli, $checkQuery);

        // if the email exists
        if (mysqli_num_rows($run) > 0) {
            echo "$email - already exists";
        }else {

            if ($pwd1 === $pwd2) {
                $fullname = $fname. " ". $lname;
                // inserting the details into the mysql database
                $insert = "INSERT INTO users(Fullname, IdNumber, ElectorsNo, Email, PassCode)
                            VALUES('$fullname', $idno, '$elno', '$email', '$pwd1')";
                $runQuery = mysqli_query($mysqli, $insert);

                if ($runQuery) {
                    // echo "Success";
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'your email';                     //SMTP username
                        $mail->Password   = 'your email password';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                        //Recipients
                        $mail->setFrom('your email', 'Mvita Loans');
                        $mail->addAddress($email, $fname);     //Add a recipient
                        $mail->addAddress($email);               //Name is optional
                        $mail->addReplyTo('your email password', 'Information');
                        
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Welcome Message';
                        $mail->Body    = $fname." ". $lname. ' Thank you for registering in our system. Stay updated for similar emails during loan applications';
                        $mail->AltBody = 'Do not reply to this emails';
                        
                        
                        if ($mail->send()) {
                            echo "Success";
                        }
                        
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
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