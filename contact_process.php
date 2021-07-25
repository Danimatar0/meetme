<?php
putenv('emailPass=IAmTheBestInTown@#$%');
use PHPMailer\PHPMailer\PHPMailer;


if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer();
    //smtp settings
    $mail->isSMTP();
    $mail->Host = "ssl://smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "matardani2@gmail.com";
    $mail->Password = getenv("emailPass");
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->setFrom('matardani2@gmail.com','No Reply');

    //email settings
    $mail->isHTML();
    $mail->setFrom($email, $name);
    $mail->addAddress("matardani2@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
        header('location: index.html');
    }
    else
    {
        $status = "failed";
        $response = "OOPS! Something went wrong: <br>" . $mail->ErrorInfo;
        header('location: contact.html');

    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>