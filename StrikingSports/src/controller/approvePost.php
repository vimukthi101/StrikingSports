<?php
if(!isset($_SESSION[''])){
	session_start();
}
//errors will not be shown
error_reporting(0);
if(isset($_SESSION['position']) && $_SESSION['position']==2){
include_once('../../ssi/db.php');
include_once('../../ssi/smtpSettings.php');
if(isset($_GET['id'])){
	$id = trim(htmlspecialchars(mysql_real_escape_string(($_GET['id']))));
	$email = $_SESSION['email'];
	$update = "UPDATE blog_post SET STATUS='2', approved_by='".$email."' WHERE post_id='".$id."'";
	if(mysqli_query($con, $update)){
		//success sent mail
		$time = date("Y-m-d H:i:s");
		$getUsers = "SELECT * FROM staff";
		$resultGetUsers = mysqli_query($con, $getUsers) or die();
		if(mysqli_num_rows($resultGetUsers)!=0){
			while($rowUsers = mysqli_fetch_array($resultGetUsers)){
				$user = $rowUsers['email'];
				$position_id = $rowUsers['position'];
				if($position_id == 0){
					$position = "System Admin";
				} else if($position_id == 1) {
					$position = "Editor";
				} else if($position_id == 2) {
					$position = "Approver";
				}
				//send email
				$to = $user;
				//Set who the message is to be sent to
				$mail->addAddress($to, $to);
				//Set the subject line
				$mail->Subject = "Blog Post Approved";
$mail->Body = "Dear ".$position.",

Blog Post has been approved by ".$email." on ".$time.".

Blog Post : www.sports.striking.lk/src/post.php?id=".$id."

Thank You!
Striking Sports";
				$mail->send();	
			}
		}
	}
	header('Location:../approveReject.php');
} else {
	//redirect to form not submit
	header('Location:../approveReject.php');
}
} else {
	header('Location:../../404.php');	
}
?>