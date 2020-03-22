<?php

$errMSG = "";
$name = $mail = $subject = $message = "";

  if (empty($_POST['name'])) {
    $errMSG .= "<li>Oops! Name is required</li>";
  } else {
    if(!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
      $errMSG .= "<li>Oops! Only letters and white space allowed</li>";
    } else {
      $name = $_POST['name'];
    }
  }

  if(empty($_POST['mail'])) {
    $errMSG .= "<li>Oops! E-mail is required</li>";
  } else if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $errMSG .= "<li>Oops! Invalid E-mail Format</li>";
  } else {
    $mailFrom = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
  }

  if(empty($_POST['subject'])) {
    $errMSG .= "<li>Oops! Subject is required</li>";
  } else {
    $subject = $_POST['subject'];
  }

  $message = $_POST['message'];

if(empty($errMSG)) {
  $mailTo = "raleighgroesbeck@gmail.com";
  $headers = "From: " . $mailFrom;
  $txt = "DIGITALDADKC has received an e-mail from " . $name . ".\n\n" . $message;
  if(mail($mailTo, $subject, $txt, $headers)) {
    echo json_encode(['code'=>200, 'msg'=>"<li>Thank you for submitting!</li>"]);
  };
} else {
  echo json_encode(['code'=>404, 'msg'=>$errMSG]);
}

?>
