<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$phone = $_POST['phone1'];
$company = $_POST['company1'];
$message = $_POST['message1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
// if (!preg_match("/^[0-9]{10}$/", $phone)) {
// echo "<span>* Please Fill Valid Contact No. *</span>";
// } else {
$subject = $name;
// To send HTML mail, the Content-type header must be set.
$headers = 'MIME-Version: 1.0' . "rn";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "rn";
$headers .= 'From:' . $email. "rn"; // Sender's Email
// $headers .= 'Cc:' . $email. "rn"; //! Carbon copy to Sender
$template = 'You have Mail!<br/><br/>'
. 'Name: ' . $name . '<br/>'
. 'Email: ' . $email . '<br/>'
. 'Contact No: ' . $phone . '<br/>'
. 'Company: ' . $company . '<br/>'
. 'Message: ' . $message . '<br/>';
$sendmessage = "<div style='background-color:#7E7E7E; color:white;'>" . $template . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 70);
// Send mail by PHP Mail Function.
mail("contact@joshlatour.com", $subject, $sendmessage, $headers);
echo "Your Query has been received, We will contact you soon.";
// }
} else {
echo "<span>* invalid email *</span>";
}
?>