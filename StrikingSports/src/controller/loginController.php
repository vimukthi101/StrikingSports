<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	error_reporting(0);
	include_once('../../ssi/db.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['userNIC']) && !empty($_POST['password'])){
			//get user name and password
			$un = trim($_POST['userNIC']);
			$up = trim($_POST['password']);
			if(preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/',$un)){
				if(preg_match('/\S+/',$up)){
					$userName = htmlspecialchars(mysql_real_escape_string($un));
					$userPassword = md5(htmlspecialchars(mysql_real_escape_string($up)));
					$getLockout = "SELECT lockout_remove_time FROM user_lockout WHERE email='".$userName."'";
					$resultLockout = mysqli_query($con, $getLockout);
					if(mysqli_num_rows($resultLockout)!=0){
						//user is locked
						while($rowLockout = mysqli_fetch_array($resultLockout)){
							$lockout_remove_time = $rowLockout['lockout_remove_time'];
							$currentTime = date("Y-m-d H:i:s");
							if($currentTime > $lockout_remove_time){
								//lockout expired
								$removeLock = "DELETE FROM user_lockout WHERE email='".$userName."'";
								if(mysqli_query($con, $removeLock));
								$updateLogin = "UPDATE users SET login_attempt='0', status='1' WHERE email='".$userName."'";
								if(mysqli_query($con, $updateLogin));
								$canLogin = "1";
							} else {
								//still locked
								$canLogin = "0";
								header('Location:../login.php?error=da');
							}
						}
					} else {
						$canLogin = "1";
					}
					if($canLogin == "1"){
						//continue
						//mysql query to get user
						$query = "SELECT * FROM users WHERE email='".$userName."' AND password='".$userPassword."'";
						$result = mysqli_query($con, $query) or die();
						if(mysqli_num_rows($result)==0){
							//if password is wrong redirect to login page
							$getStatus = "SELECT * FROM users WHERE email='".$userName."'";
							$statusResult = mysqli_query($con, $getStatus) or die();
							if(mysqli_num_rows($statusResult)!=0){
								while($statusRow = mysqli_fetch_array($statusResult)){
									//update login attempt by one
									$loginAttempt = $statusRow['login_attempt'];
									$newLoginAttempt = $loginAttempt + 1;
									$updateLoginAttempt = "UPDATE users SET login_attempt='".$newLoginAttempt."' WHERE email='".$userName."'";
									if(mysqli_query($con, $updateLoginAttempt)){
										if($newLoginAttempt >= "3"){
											//block the user if attempts are >= 3
											$updateLoginAttempt = "UPDATE users SET status='0' WHERE email='".$userName."'";
											if(mysqli_query($con, $updateLoginAttempt)){
												$time = date("Y-m-d H:i:s", strtotime("+30 minutes"));
												$lockout = "INSERT INTO user_lockout (email, lockout_remove_time) VALUES('".$userName."','".$time."')";
												if(mysqli_query($con, $lockout));
												header('Location:../login.php?error=da');
											} else {
												//wrong password error message
												header('Location:../login.php?error=wu');	
											}
										} else {
											//wrong password error message
											header('Location:../login.php?error=wu');	
										}
									} else {
										//wrong password error message
										header('Location:../login.php?error=wu');
									}
								}
							} else {
								//wrong nic error message
								header('Location:../login.php?error=wu');			
							}
						} else {
							while($row = mysqli_fetch_array($result)){
								$userNIC = $row['email'];
								$userContact = $row['contact_no'];
								$userNameId = $row['name_name_id'];
								$userAddressID = $row['address_address_id'];
								$userPassword = $row['password'];
								$userStatus = $row['status'];
								$userPreviousPassword = $row['previous_password'];
								//sessions
								$_SESSION['name_id'] = $userNameId;
								$_SESSION['email'] = $userNIC;
								$_SESSION['address_id'] = $userAddressID;
								$getName = "SELECT * FROM NAME WHERE name_id='".$userNameId."'";
								$resultGetName = mysqli_query($con, $getName) or die();
								if(mysqli_num_rows($resultGetName)!=0){
									while($getNameRow = mysqli_fetch_array($resultGetName)){
										$userFname = $getNameRow['first_name'];
										$_SESSION['first_name'] = $userFname;
									}
								} else {
									$userFname = $userNIC;
									$_SESSION['first_name'] = $userFname;
								}
								if($userStatus == "1"){
									if($userPreviousPassword == ""){
										//if successfull and if it is the first login then redirect to cahnge password
										header('Location:../changePassword.php');	
									} else {
										//if successfull then redirect to home based on the position
										header('Location:../../index.php');	
									}	
								} else{
									//if user is not active redirect to login page, meet admin error message
									session_unset();
									header('Location:../login.php?error=na');	
								}
							}
						}	
					} else {
						header('Location:../login.php?error=da');
					}
				} else {
					//invalid password
					header('Location:../login.php?error=ip');
				}
			} else {
				//invalid NIC
				header('Location:../login.php?error=in');	
			}
		} else {
			//if username or password is empty redirect to login page
			header('Location:../login.php?error=ep');	
		}
	} else {
		//if submit button is not clicked, then redirect to login page
		header('Location:../login.php');	
	}
?>