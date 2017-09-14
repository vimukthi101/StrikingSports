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
	$get = "SELECT * FROM staff WHERE email='".$id."'";
	$result = mysqli_query($con, $get);
	if(mysqli_num_rows($con, $result)!=0){
		while($row = mysqli_fetch_array($result)){
			$nameId = $row['name_name_id'];
			$addressId = $row['address_address_id'];
		}
	}
	$update = "DELETE FROM staff WHERE email='".$id."'";
	if(mysqli_query($con, $update)){
		$deleteName = "DELETE FROM name WHERE name_id='".$nameId."'";
		$deleteAddress = "DELETE FROM address WHERE address_id='".$addressId."'";
		if(mysqli_query($deleteName) && mysqli_query($deleteAddress));
		//success sent mail
		$time = date("Y-m-d H:i:s");
		//send email
		$to = $id;
		//Set who the message is to be sent to
		$mail->addAddress($to, $to);
		//Set the subject line
		$mail->Subject = "Account Deleted";
$mail->Body = "Dear User,

Your User account has been removed by ".$email." on ".$time.". Please contact system admin if you think this has done by a mistake.

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