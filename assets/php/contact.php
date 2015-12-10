<?php

$emailrecipient = "contact@yourmacromeals.com";

if(isset($_POST['email'])){ //checks to see if there's an email post--see if its a form post, not just some random person
 $from = $_POST['email']; //form input email sender
 $fromname = $_POST['name']; //their name
 $subject = "Your Macro Meals Start Today form"; //subject we see when we get the email
 $message = $fromname." sent this message: <br/>"; //puts this in an email format. next line adds the message to this variable
 $message .= nl2br($_POST['message']); //convert new lines in textarea to <br/> depending on how sender wrote it, bascially just UI for email.

 $headers = 'From: '. $from . "\r\n" .
   'Reply-To: '. $from . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

 $status = mail($emailrecipient,$subject,$message,$headers); //this is the function that sends is out, which depends on server being set up correctly.

 	if($status == TRUE){
 		$res['sendstatus'] = 'done';

 		//Edit your message here
 		$res['message'] = 'Form Submission Successful';
     }
 	else{
 		$res['message'] = 'Failed to send mail. Please mail me to you@example.com';
 	}


 	echo json_encode($res);
}
?>
