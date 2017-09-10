<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	//error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(!empty($_GET['id']) && !empty($_GET['category'])){
		$categoryId = trim(mysqli_real_escape_string($con,$_GET['id']));
		$category = trim(mysqli_real_escape_string($con,$_GET['category']));
		$get = "SELECT * FROM blog_post WHERE category_id='".$categoryId."'";
		$result = mysqli_query($con, $get);
		if(mysqli_num_rows($result)==0){
			$remove = "DELETE FROM category WHERE category_id='".$categoryId."' and category='".$category."'";
			if(mysqli_query($con, $remove)){
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
						$time = date("Y-m-d H:i:s");
						$email = $_SESSION['email'];
						//send email
						$to = $user;
						//Set who the message is to be sent to
						$mail->addAddress($to, $to);
						//Set the subject line
						$mail->Subject = "Category Was Removed";
	$mail->Body = "Dear ".$position.",
	
	Category - \"".$category."\" has been removed by ".$email." on ".$time.". You cannot use it from your next blog post.
	
	Thank You!
	Striking Sports";
						$mail->send();
					}
				}
				//success
				header('Location:../removeCategory.php?error=su');
			} else {
				//failed, please try again later
				header('Location:../removeCategory.php?error=pt');
			}
		} else {
			//used in blogpost cannot delete
			header('Location:../removeCategory.php?error=de');
		}
	} else {
		//redirect to form empty fields
		header('Location:../removeCategory.php');
	}
?>