<?php
if(!isset($_SESSION[''])){
	session_start();
}
//errors will not be shown
error_reporting(0);
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	include_once('../../ssi/db.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['pass']) && !empty($_POST['nPass']) && !empty($_POST['cnPass'])){
			$op = trim($_POST['pass']);
			$np = trim($_POST['nPass']);
			$cp = trim($_POST['cnPass']);
			$oldPassword = md5(htmlspecialchars(mysqli_real_escape_string($con, $op)));
			$newPassword = md5(htmlspecialchars(mysqli_real_escape_string($con, $np)));
			$confirmPassword = md5(htmlspecialchars(mysqli_real_escape_string($con, $cp)));
			if($newPassword == $confirmPassword){
				$getPassword = "SELECT password, previous_password FROM users WHERE email='".$email."'";
				$resultGetPassword = mysqli_query($con, $getPassword);
				if(mysqli_num_rows($resultGetPassword)!= 0){
					while($rowPassword = mysqli_fetch_array($resultGetPassword)){
						$dbPassword = $rowPassword['password'];
						$dbPreviousPassword = $rowPassword['previous_password'];
						if($dbPassword == $oldPassword){
							$updatePasswordQuery = "UPDATE users SET password='".$newPassword."', previous_password='".$dbPassword."', login_attempt='0', STATUS='1' WHERE email='".$email."'";
							if(mysqli_query($con, $updatePasswordQuery)){
								//password changed, login to continue
								header('Location:../login.php?error=cp');
							} else {
								//try again later
								header('Location:../changePassword.php?error=tl');
							}
						} else {
							//existing password does not match
							header('Location:../changePassword.php?error=wp');
						}
					}
				} else {
					//no result	redirect to login
					session_unset();
					header('Location:../login.php');
				}
			} else {
				//if new password does not match confirm password
				header('Location:../changePassword.php?error=dm');	
			}
		} else {
			//if empty
			header('Location:../changePassword.php?error=pe');	
		}
	} else {
		//if not submitted
		header('Location:../../404.php');
	}
} else {
	header('Location:../../404.php');
}
?>