<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Email recipient
  $to = "your_email@example.com"; 

  // Email subject
  $subject = "New Message from " . $firstName . " " . $lastName; 

  // Email body
  $messageBody = "Name: " . $firstName . " " . $lastName . "\n";
  $messageBody .= "Email: " . $email . "\n";
  $messageBody .= "Phone: " . $phone . "\n";
  $messageBody .= "Subject: " . $subject . "\n\n";
  $messageBody .= "Message:\n" . $message;

  // Email headers
  $headers = "From: " . $firstName . " " . $lastName . " <" . $email . ">\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";

  // Send email
 /* if (mail($to, $subject, $messageBody, $headers)) {
    // Email sent successfully
    echo "Thank you for your message! We will be in touch soon.";
  } else {
    // Email sending failed
    echo "Oops! Something went wrong. Please try again later.";
  }
*/
    // Email sent successfully
    echo "<script>alert('Thank you for your message! Form Submitted Successfully.'); window.location.href = 'contact.html';</script>";
    
} else {
  // Form not submitted
  echo "Invalid request.";
}

?>