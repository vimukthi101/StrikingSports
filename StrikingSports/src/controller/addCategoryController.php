<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	//error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['category'])){
			$category = trim(mysqli_real_escape_string($con,$_POST['category']));
			if(preg_match('/[A-Za-z\s]+/',$category)){
				$get = "SELECT * FROM category WHERE category='".$category."'";
				$resultGet = mysqli_query($con, $get) or die();
				if(mysqli_num_rows($resultGet)==0){
					$insert = "INSERT INTO category (category) VALUES	('".$category."')";
					if(mysqli_query($con, $insert)){
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
								$mail->Subject = "New Category Was Added";
$mail->Body = "Dear ".$position.",

New category has been added by ".$email." on ".$time.". You can use it from your next blog post.

Thank You!
Striking Sports";
								$mail->send();
							}
						}
						//success
						header('Location:../addCategory.php?error=su');
					} else {
						//failed, please try again later
						header('Location:../addCategory.php?error=pt');
					}
				} else {
					//existing category
					header('Location:../addCategory.php?error=ec');
				}
			} else {
				//wrong category format	
				header('Location:../addCategory.php?error=wc');
			}
		} else {
			//redirect to form empty fields
			header('Location:../addCategory.php?error=ef');
		}
	} else {
		//redirect to form not submit
		header('Location:../addCategory.php?error=ns');
	}
?>