<?php
if(!isset($_SESSION[''])){
	session_start();
}
//errors will not be shown
//error_reporting(0);
include_once('../../ssi/db.php');
include_once('../../ssi/smtpSettings.php');
if(isset($_GET['id'])){
	$id = trim(htmlspecialchars(mysql_real_escape_string(($_GET['id']))));
	$email = $_SESSION['email'];
	$update = "UPDATE staff SET status='0' WHERE email='".$id."'";
	if(mysqli_query($con, $update)){
		//success sent mail
		$time = date("Y-m-d H:i:s");
		//send email
		$to = $id;
		//Set who the message is to be sent to
		$mail->addAddress($to, $to);
		//Set the subject line
		$mail->Subject = "Account De-Activated";
$mail->Body = "Dear User,

Your User account has been de-activated by ".$email." on ".$time.". Please contact system admin for reactivate the account.

Thank You!
Striking Sports";
				$mail->send();	
	}
	header('Location:../viewUsers.php');
} else {
	//redirect to form not submit
	header('Location:../viewUsers.php');
}
?>