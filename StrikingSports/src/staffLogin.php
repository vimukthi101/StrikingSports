<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
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
                        <h2>Login to staff <span>Account Now!</span> </h2>
                    </div>
                    <div class="spe-title-1 spe-title-wid">
                    	<?php
						if(isset($_GET['error'])){
							$error = $_GET['error'];
							if($error == 'ep'){
								echo '<div style="padding:3px;">
										<label class="form-control">User Name Or Password Cannot Be Empty.</label>
									</div>';
							} else if($error == 'in'){
								echo '<div style="padding:3px;">
										<label class="form-control" style="height:35px;">Please Enter A Valid E-mail Address.</label>
									</div>';
							} else if($error == 'ip'){
								echo '<div style="padding:3px;">
										<label class="form-control" style="height:35px;">Password Does Not Match The Input Criteria.</label>
									</div>';
							} else if($error == 'na'){
								echo '<div style="padding:3px;">
										<label class="form-control">Your Account Is Deactivated. Please Contact Us.</label>
									</div>';
							} else if($error == 'np'){
								echo '<div style="padding:3px;">
										<label class="form-control">Please Login To Continue.</label>
									</div>';
							} else if($error == 'wu'){
								echo '<div style="padding:3px;">
										<label class="form-control">Entered User Name Or Password Is Invalid.</label>
									</div>';
							} else if($error == 'da'){
								echo '<div style="padding:1px;">
										<label class="form-control" style="height:55px;">Your Account Is Deactivated Due To Three Unsuccessfull Login Attempts. Please Contact Us.</label>
									</div>';
							} else if($error == 'bl'){
								echo '<div style="padding:3px;">
										<label class="form-control" style="height:55px;">You Have Successfully Deleted Your Account.</label>
									</div>';
							} else if($error == 'lo'){
								echo '<div style="padding:3px;">
										<label class="form-control">Logout Successfully. Please Login To Continue.</label>
									</div>';
							} else if($error == 'cp'){
								echo '<div style="padding:1px;">
										<label class="form-control" style="height:55px;">Password Changed Successfully. Please Login To Continue.</label>
									</div>';
							}
						}
						?>
                    </div>
                    <div class="book-form">
                        <form role="form" class="form-group" action="controller/staffLoginController.php" method="post">
                            <div style="padding:10px;">
                             <input type="email" title="Should be a valid e-mail address" class="form-control" id="userNIC" name="userNIC" placeholder="Enter User E-mail Address" required>
                            </div>
                            <div style="padding:10px;">
                             <input type="password" class="form-control" pattern="\S+" title="Password should not be empty" id="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="spe-title-1">
                                <a href="forgotPassword.php"><p>Forgot Password?</p></a>
                            </div>
                            <div class="row" style="padding:10px;">
                                <div class="center-block">
                                     <input type="submit" class="btn btn-default" id="submit" name="submit" value="Log In" />
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