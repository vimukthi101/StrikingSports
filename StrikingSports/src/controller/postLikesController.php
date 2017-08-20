<?php
if(!isset($_SESSION[''])){
	session_start();
}
//errors will not be shown
//error_reporting(0);
include_once('../../ssi/db.php');
if(isset($_GET['status']) && isset($_GET['pStatus']) && isset($_GET['id'])){
	$status = trim(htmlspecialchars(mysql_real_escape_string(($_GET['status']))));
	$pStatus = trim(htmlspecialchars(mysql_real_escape_string(($_GET['pStatus']))));
	$id = trim(htmlspecialchars(mysql_real_escape_string(($_GET['id']))));
	$email = $_SESSION['email'];
	if($pStatus == 0){
		if($status != $pStatus){
			$insert = "UPDATE likes SET STATUS='".$status."' WHERE blog_post_id='".$id."' AND users_email='".$email."'";
		}
	} else if($pStatus == 1){
		if($status != $pStatus){
			$insert = "UPDATE likes SET STATUS='".$status."' WHERE blog_post_id='".$id."' AND users_email='".$email."'";
		}
	} else if($pStatus == 2){
		$insert = "INSERT INTO likes (STATUS,blog_post_id,users_email) VALUES ('".$status."','".$id."','".$email."')";
	}
	mysqli_query($con, $insert);
	header('Location:../post.php?id='.$id);
} else {
	//redirect to form not submit
	header('Location:../../index.php');
}
?>