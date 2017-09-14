<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	//errors will not be shown
	//error_reporting(0);
	include_once('../../ssi/db.php');
	include_once('../../ssi/smtpSettings.php');
	if(isset($_POST['submit'])){
		if(!empty($_POST['email']) && !empty($_POST['position']) && !empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['aNo']) && !empty($_POST['lane']) && !empty($_POST['city'])){
			$em = trim($_POST['email']);
			$fn = trim($_POST['fName']);
			$mn = trim($_POST['sName']);
			$ln = trim($_POST['lName']);
			$no = trim($_POST['aNo']);
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
											$employeeEmail = htmlspecialchars(mysqli_real_escape_string($con, $em));
											$firstName = htmlspecialchars(mysqli_real_escape_string($con, $fn));
											$middleName = htmlspecialchars(mysqli_real_escape_string($con, $mn));
											$lastName = htmlspecialchars(mysqli_real_escape_string($con, $ln));
											$addressNo = htmlspecialchars(mysqli_real_escape_string($con, $no));
											$addressLane = htmlspecialchars(mysqli_real_escape_string($con, $lane));
											$addressCity = htmlspecialchars(mysqli_real_escape_string($con, $city));
											$contactNo = htmlspecialchars(mysqli_real_escape_string($con, $phone));
											//check whether the email exists
											$getUsersEmail = "SELECT * FROM staff WHERE email='".$employeeEmail."'";
											$resultGetUsersEmail = mysqli_query($con, $getUsersEmail);
											if(mysqli_num_rows($resultGetUsersEmail) != 0){
												while($getInfo = mysqli_fetch_array($resultGetUsersEmail)){
													$nameId = $getInfo['name_name_id'];
													$addressId = $getInfo['address_address_id'];
												}
												//update name
												$addEmployeeName = "UPDATE name SET first_name='".$firstName."', second_name='".$middleName."', last_name='".$lastName."' WHERE name_id='".$nameId."'";
												//update address
												$addEmployeeAddress = "UPDATE address SET address_no='".$addressNo."', address_lane='".$addressLane."', address_city='".$addressCity."' WHERE address_id='".$addressId."'";
												//update contact no
												$addUserEmployee = "UPDATE staff SET contact_no='".$contactNo."' WHERE email='".$employeeEmail."'";
												if(mysqli_query($con, $addEmployeeName) && mysqli_query($con, $addEmployeeAddress) && mysqli_query($con, $addUserEmployee)){
													//send email to new user
													$to = $employeeEmail;
													//Set who the message is to be sent to
													$mail->addAddress($to, $to);
													//Set the subject line
													$mail->Subject = "User Account Updated";
$mail->Body ="Dear ".$firstName.",

Your user account has been updated with below information by ".$_SESSION['email'].". Please check them and inform to system admin or change them by your self by going to edit profile if there are any mismatches.

Full Name : ".$firstName.' '.$middleName.' '.$lastName."
Address : ".$addressNo.' ,'.$addressLane.' ,'.$addressCity."
Contact Number : ".$contactNo."

p.s. : Please do not reply to this email.

Thank You!
Strking Sports";
													if (!$mail->send()) {
														header('Location:../editStaff.php?id='.$employeeEmail.'&error=as');
													}
													//user updated successfully
													header('Location:../editStaff.php?id='.$employeeEmail.'&error=as');
												} else {
													//couldn't update
													header('Location:../editStaff.php?id='.$employeeEmail.'&error=fq');
												}
											} else {
												//user email does not exists
												header('Location:../editStaff.php?id='.$employeeEmail.'&error=ee');
											}
										} else {
											//wrong contact no format	
											header('Location:../editStaff.php?id='.$employeeEmail.'&error=wp');
										}
									} else {
										//wrong city format	
										header('Location:../editStaff.php?id='.$employeeEmail.'&error=wc');
									}
								} else {
									//wrong lane format	
									header('Location:../editStaff.php?id='.$employeeEmail.'&error=wa');
								}
							} else {
								//wrong address no format	
								header('Location:../editStaff.php?id='.$employeeEmail.'&error=wn');
							}
						} else {
							//wrong last name format	
							header('Location:../editStaff.php?id='.$employeeEmail.'&error=wl');
						}
					} else {
						//wrong middle name format	
						header('Location:../editStaff.php?id='.$employeeEmail.'&error=wm');
					}
				} else {
					//wrong first name format	
					header('Location:../editStaff.php?id='.$employeeEmail.'&error=wf');
				}
			} else {
				//wrong email format	
				header('Location:../editStaff.php?id='.$employeeEmail.'&error=we');
			}
		} else {
			//redirect to form empty fields
			header('Location:../editStaff.php?id='.$employeeEmail.'&error=ef');
		}
	} else {
		//redirect to form not submit
		header('Location:../editStaff.php?id='.$employeeEmail.'&error=ns');
	}
?>