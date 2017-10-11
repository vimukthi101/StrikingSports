<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	include_once('../ssi/header.php');
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
    <div class="lp">
        <div class="inn-title text-center">
            <font face="Verdana, Geneva, sans-serif" size="+1">
                <u>Change Password</u>
            </font>
        </div>
        <div class="p-mf">
			<form role="form" class="form-horizontal" action="controller/changePasswordController.php" method="post">
            	<div class="form-group">
                    <label for="pass" class="control-label col-md-3">Existing Password <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control" type="password" name="pass" id="pass" pattern="\S*" title="Password Cannot Be Empty" required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="nPass" class="control-label col-md-3">New Password <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control" type="password" name="nPass" id="nPass" pattern="\S*" title="Password Cannot Be Empty" required="required"/>
                	</div>
                </div>
				<div class="form-group">
                    <label for="cnPass" class="control-label col-md-3">Confirm New Password <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control" type="password" name="cnPass" id="cnPass" pattern="\S*" title="Password Cannot Be Empty" required="required"/>
                	</div>
                </div>
               	<div class="form-group" style="text-align:center;">
                    <label style="text-align:center;" class="control-label col-md-11"><span style="color:rgb(255,0,0);">*</span> Mandatory Fields</label> 
                </div>
                <?php
					if(isset($_GET['error'])){
						$error = $_GET['error'];
						if($error == "ns"){
							echo '<div class="form-group col-md-10 text-center" style="padding:10px;margin-left:100px;">
								<label class="form-control col-md-3">Please Submit The Form To Continue</label>
							</div>';
						} else if($error == "pe"){
							echo '<div class="form-group col-md-10 text-center" style="padding:10px;margin-left:100px;">
								<label class="form-control col-md-3">Above FIelds Cannot Be Empty.</label>
							</div>';
						} else if($error == "dm"){
							echo '<div class="form-group col-md-10 text-center" style="padding:10px;margin-left:100px;">
								<label class="form-control col-md-3">New Password And Confirm Password Does Not Match.</label>
							</div>';
						} else if($error == "tl"){
							echo '<div class="form-group col-md-10 text-center" style="padding:10px;margin-left:100px;">
								<label class="form-control col-md-3">Could Not Change Your Password. Please Try Again Later.</label>
							</div>';
						} else if($error == "wp"){
							echo '<div class="form-group col-md-10 text-center" style="padding:10px;margin-left:100px;">
								<label class="form-control col-md-3">Your Existing Password Does Not Match With What You Enter.</label>
							</div>';
						}
					}
				?>
                <div class="form-group col-md-11 text-center">
                    <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success" />
                    <input type="reset" value="Clear" class="btn btn-danger" />
                </div>
            </form>
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
<?php
} else {
	header('Location:../404.php');
}
?>