  <?php
if(isset($_POST['email'])) {
	
	// EDIT THE 2 LINES BELOW AS REQUIRED
	
	$email_subject = "Your email subject line";
	
	
	function died($error) {
		// your error code can go here
		echo "We are very sorry, but there were error(s) found with the form your submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.  <a href=\"tipafriend.php\">Go back</a><br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['friend_email']) ||
		!isset($_POST['message'])) {
		died('We are sorry, but there appears to be a problem with the form your submitted.');		
	}
	
	$first_name = $_POST['first_name']; // required
	$email_from = $_POST['email']; // required
	$friend_email_form = $_POST['friend_email']; // not required
	$message = $_POST['message']; // required
	
	$error_message = "";
	$email_exp = "^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$";
  if(!eregi($email_exp,$email_from)) {
  	$error_message .= 'The Your Email Address you entered does not appear to be valid.<br />';
  }
  if(!eregi($email_exp,$friend_email_form)) {
  	$error_message .= 'The Friend Email Address you entered does not appear to be valid.<br />';
  }
	$string_exp = "^[a-z .'-]+$";
  if(!eregi($string_exp,$first_name)) {
  	$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
  	$error_message .= 'The message you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "First Name: ".clean_string($first_name)."\n";
	$email_message .= "Your Email: ".clean_string($email_from)."\n";
	$email_message .= "Friend Email: ".clean_string($friend_email)."\n";
	$email_message .= "Message: ".clean_string($message)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($friend_email_form, $email_subject, $email_message, $headers);  
?>



Message is send to your friend.

<?php
}else{
?>>
