<?php
  // form handler
  if($_POST && isset($_POST['sendfeedback'], $_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if(!$name) {
      $errorMsg = "Please enter your Name";
    } elseif(!$email || !preg_match("/^\S+@\S+$/", $email)) {
      $errorMsg = "Please enter a valid Email address";
    } elseif(!$message) {
      $errorMsg = "Please enter your comment in the Message box";
    } else {
      // send email and redirect
      $to = "feedback@example.com";
      if(!$subject) $subject = "Contact from website";
      $headers = "From: webmaster@example.com" . "\r\n";
      mail($to, $subject, $message, $headers);
      header("Location: http://www.example.com/thankyou.html");
      exit;
    }

  }
?>
