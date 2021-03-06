<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['email']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['addresNo']) && !empty($_POST['lane']) && !empty($_POST['city']) && !empty($_POST['password']) && !empty($_POST['cPassword'])){
			$pass = trim($_POST['password']);
			$cPass = trim($_POST['cPassword']);
			$em = trim($_POST['email']);
			$fn = trim($_POST['fname']);
			$mn = trim($_POST['mname']);
			$ln = trim($_POST['lname']);
			$no = trim($_POST['addresNo']);
			$lane = trim($_POST['lane']);
			$city = trim($_POST['city']);
			$phone = trim($_POST['contact']);
			if(preg_match('/^[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z_+])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9}$/',$em)){
				if(preg_match('/^[a-zA-Z]+$/',$fn)){
					if(preg_match('/^[a-zA-Z]*$|^$/',$mn)){
						if(preg_match('/^[a-zA-Z]+$/',$ln)){
							if(preg_match('/^([0-9].*[\\/][a-zA-Z0-9]*)|([0-9].*)$/',$no)){
								if(preg_match('/[a-zA-Z]+/',$lane)){
									if(preg_match('/[a-zA-Z]+/',$city)){
										if(preg_match('/^\d{10}$|^$/',$phone)){
											$password = md5(htmlspecialchars(mysqli_real_escape_string($con, $pass)));
											$confirmPassword = md5(htmlspecialchars(mysqli_real_escape_string($con, $cPass)));
											$employeeEmail = htmlspecialchars(mysqli_real_escape_string($con, $em));
											$firstName = htmlspecialchars(mysqli_real_escape_string($con, $fn));
											$middleName = htmlspecialchars(mysqli_real_escape_string($con, $mn));
											$lastName = htmlspecialchars(mysqli_real_escape_string($con, $ln));
											$addressNo = htmlspecialchars(mysqli_real_escape_string($con, $no));
											$addressLane = htmlspecialchars(mysqli_real_escape_string($con, $lane));
											$addressCity = htmlspecialchars(mysqli_real_escape_string($con, $city));
											$contactNo = htmlspecialchars(mysqli_real_escape_string($con, $phone));
											if($password == $confirmPassword){
												//check whether the email already exists
												$getUsersEmail = "SELECT * FROM users WHERE email='".$employeeEmail."'";
												$resultGetUsersEmail = mysqli_query($con, $getUsersEmail);
												if(mysqli_num_rows($resultGetUsersEmail) == 0){
													//add name
													$addEmployeeName = "INSERT INTO name VALUES ('','".$firstName."','".$middleName."','".$lastName."')";
													if(mysqli_query($con, $addEmployeeName)){
														//get name_id
														$nameId = mysqli_insert_id($con);
														//add address
														$addEmployeeAddress = "INSERT INTO address VALUES ('','".$addressNo."','".$addressLane."','".$addressCity."')";
														if(mysqli_query($con, $addEmployeeAddress)){
															//get address_id
															$addressId = mysqli_insert_id($con);
															$regDateTime = date("Y-m-d H:i:s");
															$addUserEmployee = "INSERT INTO users VALUES ('".$employeeEmail."', '".$contactNo."', '".$regDateTime."', '1', '".$addressId."', '".$nameId."', '".$password."', '', '0')";
															if(mysqli_query($con, $addUserEmployee)){
																//send email to new user
																$to = $employeeEmail;
																//Set who the message is to be sent to
																$mail->addAddress($to, $to);
																//Set the subject line
																$mail->Subject = "User Account Created";
$mail->Body ="Dear ".$firstName.",

A new user account has been created for you at Striking Sports with below credentials. Please use following user name and password for your first time login. Please change your password as you first login to the system.

User Name : ".$employeeEmail."
Password : ".$pass."

p.s. : Please do not reply to this email.

Thank You!
Strking Sports";
																if (!$mail->send()) {
																	header('Location:../register.php?error=as');
																}
																//user added successfully
																header('Location:../register.php?error=as');
															} else {
																//couldn't add
																header('Location:../register.php?error=fq');
															}
														}
													}
												} else {
													//user email exists
													header('Location:../register.php?error=ee');
												}
											} else {
												//redirect to login page, password and confirm passwrod does not match
												header('Location:../register.php?error=dm');
											}
										} else {
											//wrong contact no format	
											header('Location:../register.php?error=wp');
										}
									} else {
										//wrong city format	
										header('Location:../register.php?error=wc');
									}
								} else {
									//wrong lane format	
									header('Location:../register.php?error=wa');
								}
							} else {
								//wrong address no format	
								header('Location:../register.php?error=wn');
							}
						} else {
							//wrong last name format	
							header('Location:../register.php?error=wl');
						}
					} else {
						//wrong middle name format	
						header('Location:../register.php?error=wm');
					}
				} else {
					//wrong first name format	
					header('Location:../register.php?error=wf');
				}
			} else {
				//wrong email format	
				header('Location:../register.php?error=we');
			}
		} else {
			//redirect to form empty fields
			header('Location:../register.php?error=ef');
		}
	} else {
		//redirect to form not submit
		header('Location:../register.php?error=ns');
	}
?>