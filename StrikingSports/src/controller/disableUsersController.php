<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	//error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_SESSION['email'])){
			if(isset($_POST['submit'])){
				if(!empty($_POST['email'])){
					$email = $_POST['email'];
					$fName = $_POST['fname'];
					$deactivateUser = "DELETE FROM users WHERE email='".$email."'";
					$addressId = $_SESSION['address_id'];
					$nameId = $_SESSION['name_id'];
					$deleteName = "DELETE FROM name WHERE name_id='".$nameId."'";
					$deleteAddress = "DELETE FROM address WHERE address_id='".$addressId."'";
					if(mysqli_query($con, $deactivateUser)){
						if(mysqli_query($con, $deleteName));
						if(mysqli_query($con, $deleteAddress));
						//send email
						$to = $email;
						//Set who the message is to be sent to
						$mail->addAddress($to, $to);
						//Set the subject line
						$mail->Subject = "Account Deleted";
$mail->Body = "Dear ".$fName.",

Your account has been deleted successfully upon your request. You will not be able to login to the system from here on. If you want to get in touch, please create another account. Thank you for being with us. Hope to see you soon!

p.s. : Please do not reply to this email.

Thank You!
Striking Sports";
						$mail->send();
						//sucessfully deactivated
						session_destroy();
						header('Location:../login.php?error=bl');
					} else {
						//query failed
						header('Location:../disableUsers.php?error=qf');
					}
				} else {
					//error page 404
					header('Location:../../404.php');	
				}
			} else {
				//error page 404
				header('Location:../../404.php');
			}
	} else {
		//error page 404
		header('Location:../../404.php');
	}	
?>