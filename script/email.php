<?php
//if "email" variable is filled out, send email
  if (isset($_POST['email']))  {
  
  //Email information
  $admin_email = $_POST['email'];
  $email = 'matthaerle@gmail.com';
  $subject = $_POST['phone'];
  $comment = $_POST['message'];
  
  //send email
  mail($email, $subject, $comment);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
  }
?>
