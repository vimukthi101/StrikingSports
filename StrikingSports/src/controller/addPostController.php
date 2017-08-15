<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	//error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content']) && !empty($_POST['category'])){
			$title = trim($_POST['title']);
			$description = trim($_POST['description']);
			$content = trim($_POST['content']);
			$tags = trim($_POST['tags']);
			$category = trim($_POST['category']);
			if(preg_match('/[a-zA-Z]+/',$title)){
				if(preg_match('/[a-zA-Z]+/',$description)){
					if(preg_match('/[a-zA-Z,]+/',$tags)){
						$email = $_SESSION['email'];
						$time = date("Y-m-d H:i:s");
						if($_POST['submit']=="Save as Draft"){
							$status = 0;
						} else if($_POST['submit']=="Send for Approval"){
							$status = 1;
						}
						$insert = "INSERT INTO blog_post(created_date_time, title, description, post, status, staff_email, tag, category_id) VALUES ('".$time."','".$title."','".$description."','".$content."','".$status."','".$email."','".$tags."','".$category."')";
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
										$mail->Subject = "Blog Post For Approval";
$mail->Body = "Dear ".$position.",

New Blog Post has been submitted by ".$email." for Approval on ".$time.". Please check the content and Approve it.

Blog Post ID : ".$postId."

Thank You!
Striking Sports";
										$mail->send();
									}
								}
								//success, send for approval
								header('Location:../addPost.php?error=su');
							} else {
								//success, save as draft
								header('Location:../addPost.php?error=sd');
							}
						} else {
							//failed, please try again later
							header('Location:../addPost.php?error=pt');
						}
					} else {
						//wrong tag format
						header('Location:../addPost.php?error=wm');
					}
				} else {
					//wrong description format	
					header('Location:../addPost.php?error=wf');
				}
			} else {
				//wrong title format	
				header('Location:../addPost.php?error=we');
			}
		} else {
			//redirect to form empty fields
			header('Location:../addPost.php?error=ef');
		}
	} else {
		//redirect to form not submit
		header('Location:../addPost.php?error=ns');
	}
?>