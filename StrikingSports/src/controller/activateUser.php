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
	$update = "UPDATE staff SET status='1', login_attempt='0' WHERE email='".$id."'";
	if(mysqli_query($con, $update)){
		//success sent mail
		$time = date("Y-m-d H:i:s");
		//send email
		$to = $id;
		//Set who the message is to be sent to
		$mail->addAddress($to, $to);
		//Set the subject line
		$mail->Subject = "Account Activated";
$mail->Body = "Dear User,

Your User account has been reactivated by ".$email." on ".$time.". Please login and check your profile.

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