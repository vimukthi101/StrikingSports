<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
include_once('../ssi/smtpSettings.php');
//errors will not be shown
error_reporting(0);
?>

<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenu.php');
		include_once('../ssi/topMenu.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp" style="background-image:url(../images/bg-s.jpg);background-repeat:no-repeat;background-size:cover;">
            <div class="booking-bg-1">
                <div class="bg-book">
                    <div class="spe-title-1 spe-title-wid">
                        <h2>Recover your <span>Password Now!</span> </h2>
                    </div>
                    <div class="spe-title-1 spe-title-wid">
                    	<?php
						if(isset($_POST['submit'])){
							if(isset($_POST['email'])){
								$email = $_POST['email'];
								$getUser = "SELECT * FROM users WHERE email='".$email."'";
								$resultGetUser = mysqli_query($con, $getUser);
								if(mysqli_num_rows($resultGetUser)!=0){
									$newPass = rand(0000000,9999999);
									$newPassword = md5($newPass);
									$updatePassword = "UPDATE users SET PASSWORD='".$newPassword."', previous_password='' WHERE email='".$email."'";
									if(mysqli_query($con, $updatePassword)){
										//send email
										$to = $email;
										//Set who the message is to be sent to
										$mail->addAddress($to, $to);
										//Set the subject line
										$mail->Subject = "Password Recovery";
$mail->Body = "Dear User,

Your password has been recovered successfully. Please use the below credentials to login to the system. Please change the password after login.

Password : ".$newPass."

p.s. : Please do not reply to this email.

Thank You!
Striking Sports";
										$mail->send();
										echo '<div style="padding:3px;">
												<label class="form-control">Please Check Your Email For Recovery Password.</label>
											</div>';
									} else {
										echo '<div style="padding:3px;">
												<label class="form-control">Please Try Again Later.</label>
											</div>';
									}
								} else {
									echo '<div style="padding:3px;">
										<label class="form-control">Enter A Valid Email Address.</label>
									</div>';
								}
							} else {
								echo '<div style="padding:3px;">
										<label class="form-control">Enter A Valid Email Address.</label>
									</div>';
							}
						}
						?>
                    </div>
                    <div class="book-form">
                        <form role="form" class="form-group" method="post">
                            <div style="padding:10px;">
                             <input type="email" title="Should be a valid e-mail address" class="form-control" id="email" name="email" placeholder="Enter Your E-mail Address" required>
                            </div>
                            <div class="row" style="padding:10px;">
                                <div class="center-block">
                                     <input type="submit" class="btn btn-default" id="submit" name="submit" value="Send Recovery Password" />
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
		include_once('../ssi/latestPost.php');
		include_once('../ssi/footer.php');
		include_once('../ssi/copyRights.php');
	?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			"use strict";
			
			//LEFT MOBILE MENU OPEN
			$(".mob-menu").on('click', function() {
				$(".menu").css('left', '0px');
				$(".mob-menu").fadeOut("fast");
				$(".mob-close").fadeIn("20000");
			});
			
			//LEFT MOBILE MENU CLOSE
			$(".mob-close").on('click', function() {
				$(".mob-close").hide("fast");
				$(".menu").css('left', '-92px');
				$(".mob-menu").show("slow");
			});
			
			//mega menu
			$(".tr-menu").hover(function() {
				$(".cat-menu").fadeIn(50);
			});
			$(".i-head-top").mouseleave(function() {
				$(".cat-menu").fadeOut("slow");
			});
		
			//PRE LOADING
			$('#status').fadeOut();
			$('#preloader').delay(350).fadeOut('slow');
			$('body').delay(350).css({
				'overflow': 'visible'
			});
		});
	</script>
</body>
</html>