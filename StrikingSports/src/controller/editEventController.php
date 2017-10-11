<?php
if(!isset($_SESSION[''])){
	session_start();
}
//errors will not be shown
error_reporting(0);
if(isset($_SESSION['position']) && ($_SESSION['position']==0 || $_SESSION['position']==1 || $_SESSION['position']==2)){
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['title']) && !empty($_POST['id']) && !empty($_POST['content']) && !empty($_POST['category']) && is_uploaded_file($_FILES['image']['tmp_name'])){
			$id = trim(mysqli_real_escape_string($con,$_POST['id']));
			$title = trim(mysqli_real_escape_string($con,$_POST['title']));
			$content = trim(mysqli_real_escape_string($con,$_POST['content']));
			$place = trim(mysqli_real_escape_string($con,$_POST['place']));
			$date = trim(mysqli_real_escape_string($con,$_POST['date']));
			$category = trim(mysqli_real_escape_string($con,$_POST['category']));
			$imageMimeTypes = array('png','gif','jpeg','jpg');
			$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
			if(preg_match('/\S.+/',$title)){
				if(preg_match('/\S.+/',$place)){
					if (in_array($file_ext, $imageMimeTypes)) {
						$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
						$email = $_SESSION['email'];
						$time = date("Y-m-d H:i:s");
						if($_POST['submit']=="Save as Draft"){
							$status = 0;
						} else if($_POST['submit']=="Send for Approval"){
							$status = 1;
						}
						$insert = "UPDATE events SET event_name='".$title."', place='".$place."', information='".$content."', event_image='".$image."', event_date='".$date."', event_category='".$category."', status='".$status."' WHERE event_id='".$id."'";
						if(mysqli_query($con, $insert)){
							$postId = mysqli_insert_id($con);
							if($_POST['submit']=="Send for Approval"){
								$getUsers = "SELECT * FROM staff WHERE position='0' OR position='2'";
								$resultGetUsers = mysqli_query($con, $getUsers) or die();
								if(mysqli_num_rows($resultGetUsers)!=0){
									while($rowUsers = mysqli_fetch_array($resultGetUsers)){
										$user = $rowUsers['email'];
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
										$mail->Subject = "Edited Event For Approval";
$mail->Body = "Dear ".$position.",

Event has been edited by ".$email." for Approval on ".$time.". Please check the content and Approve it.

Blog Post : www.sports.striking.lk/src/eventDynamic.php?id=".$postId."

Thank You!
Striking Sports";
										$mail->send();
									}
								}
								//success, send for approval
								header('Location:../addEvents.php?error=su');
							} else {
								//success, save as draft
								header('Location:../addEvents.php?error=sd');
							}
						} else {
							//failed, please try again later
							header('Location:../addEvents.php?error=pt');
						}	
					} else {
						//invalid image type
						header('Location:../addEvents.php?error=ii');	
					}
				} else {
					//wrong description format	
					header('Location:../addEvents.php?error=wf');
				}
			} else {
				//wrong title format	
				header('Location:../addEvents.php?error=we');
			}
		} else {
			//redirect to form empty fields
			header('Location:../addEvents.php?error=ef');
		}
	} else {
		//redirect to form not submit
		header('Location:../addEvents.php?error=ns');
	}
} else {
	// 404 no operation
	header('Location:../../404.php');	
}
?>