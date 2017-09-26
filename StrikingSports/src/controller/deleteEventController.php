<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	//error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['id'])){
			$id = trim(mysqli_real_escape_string($con,$_POST['id']));
			$getPost = "SELECT * FROM events WHERE event_id='".$id."'";
			$resultGetPost = mysqli_query($con, $getPost) or die();
			if(mysqli_num_rows($resultGetPost)!=0){
				while($rowPost = mysqli_fetch_array($resultGetPost)){
					$title = $rowPost['event_name'];
					$place = $rowPost['place'];
					$date = $rowPost['event_date'];
					$description = $rowPost['information'];
				}
			}
			$delete = "DELETE FROM events WHERE event_id='".$id."'";
			$email = $_SESSION['email'];
			if(mysqli_query($con, $delete)){
				$getUsers = "SELECT * FROM staff WHERE position='0' OR position='2'";
				$resultGetUsers = mysqli_query($con, $getUsers) or die();
				if(mysqli_num_rows($resultGetUsers)!=0){
					while($rowUsers = mysqli_fetch_array($resultGetUsers)){
						$user = $rowUsers['email'];
						$time = date("Y-m-d H:i:s");
						$position_id = $rowUsers['position'];
						if($position_id == 0){
							$position = "System Admin";
						} else {
							$position = "Approver";
						}
						//send email
						$to = $user;
						//Set who the message is to be sent to
						$mail->addAddress($to, $to);
						//Set the subject line
						$mail->Subject = "Event Deleted";
$mail->Body = "Dear ".$position.",

Event has been deleted by ".$email." on ".$time.".

Blog PostEventTitle : ".$title."
Title : ".$title."
Place : ".$place."
Date : ".$date."
description : ".$description."

Thank You!
Striking Sports";
						$mail->send();
					}
				}
				//success, send for approval
				header('Location:../viewEvents.php?id='.$id.'&error=su');
			} else {
				//failed, please try again later
				header('Location:../deleteEvent.php?id='.$id.'&error=pt');
			}	
		} else {
			//redirect to form empty fields
			header('Location:../viewEvents.php');
		}
	} else {
		//redirect to form not submit
		header('Location:../../404.php');
	}
?>