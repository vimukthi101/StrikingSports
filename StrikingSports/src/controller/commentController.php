<?php
if(!isset($_SESSION[''])){
	session_start();
}
//errors will not be shown
error_reporting(0);
include_once('../../ssi/db.php');
if(isset($_SESSION['email'])){
	if(isset($_POST['submit'])){
		if(!empty($_POST['comment']) || !empty($_POST['post'])){
			$comment = trim(htmlspecialchars(mysql_real_escape_string(($_POST['comment']))));
			$post = trim(htmlspecialchars(mysql_real_escape_string(($_POST['post']))));
			$time = date("Y-m-d H:i:s");
			$email = $_SESSION['email'];
			$insert = "INSERT INTO comments (comments, comment_date_time, blog_post_post_id, users_email) VALUES ('".$comment."','".$time."','".$post."','".$email."')";
			mysqli_query($con, $insert);
			header('Location:../view.php?id='.$post);
		} else {
			//redirect to form empty fields
			header('Location:../../404.php');
		}
	} else {
		//redirect to form not submit
		header('Location:../../404.php');
	}
} else {
	//redirect to form not submit
	header('Location:../../404.php');
}
?>