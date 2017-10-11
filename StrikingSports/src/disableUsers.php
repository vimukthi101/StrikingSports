<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
//errors will not be shown
error_reporting(0);
?>

<body style="overflow: visible;">
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
            	<u>Delete Profile</u>
            </font>
        </div>
        <div class="p-mf">
        <?php
			$email = $_SESSION['email'];
			//get user info
			$getUser = "SELECT * FROM users WHERE email='".$email."'";
			$resultGetUser = mysqli_query($con, $getUser) or die();
			if(mysqli_num_rows($resultGetUser) != 0){
				while($rowGetUser = mysqli_fetch_array($resultGetUser)){
					$eContact = $rowGetUser['contact_no'];
					$eNameId = $rowGetUser['name_name_id'];
					$eAddressId = $rowGetUser['address_address_id'];
					$regDateTime = $rowGetUser['registered_date_time'];
					//get user name
					$getName = "SELECT * FROM NAME WHERE name_id='".$eNameId."'";
					$resultGetName = mysqli_query($con, $getName) or die();
					if(mysqli_num_rows($resultGetName) != 0){
						while($rowGetName = mysqli_fetch_array($resultGetName)){
							$eFName = $rowGetName['first_name'];
							$eSName = $rowGetName['second_name'];
							$eLName = $rowGetName['last_name'];
						}
					} else {
						//redirect to login
						session_unset();
						header('login.php?error=np');
					}
					//get address
					$getAddress = "SELECT * FROM address WHERE address_id='".$eAddressId."'";
					$resultGetAddress = mysqli_query($con, $getAddress) or die();
					if(mysqli_num_rows($resultGetAddress) != 0){
						while($rowGetAddress = mysqli_fetch_array($resultGetAddress)){
							$eAno = $rowGetAddress['address_no'];
							$eALane = $rowGetAddress['address_lane'];
							$eACity = $rowGetAddress['address_city'];
						}
					} else {
						//redirect to login
						session_unset();
						header('login.php?error=np');
					}
				}
			} else {
				//redirect to login
				session_unset();
				header('login.php?error=np');
			}
		?>
        <?php
			if(isset($_GET['error'])){
				if(!empty($_GET['error'])){
					$error = $_GET['error'];
					if($error == "qf"){
						echo '<div class="form-group text-center">
								<label class="form-control">Please Try Again Later.</label>
							</div>';
					}
				}
			}
		?>
        <div style="padding:10px;"> 
			<form role="form" class="form-horizontal" method="post" action="controller/disableUsersController.php">
                <div class="form-group">
                    <label for="employeelNIC" class="control-label col-md-3">E-Mail</label>
                    <div class="col-md-8">
                    	<input class="form-control" type="text" name="email" id="email" readonly value="<?php echo $email; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeefName" class="control-label col-md-3">First Name</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="fname" id="fname" readonly value="<?php echo $eFName; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeemName" class="control-label col-md-3">Middle Name</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="mname" id="mname" readonly value="<?php echo $eSName; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeelName" class="control-label col-md-3">Last Name</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="lname" id="lname" readonly value="<?php echo $eLName; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="addressNo" class="control-label col-md-3">Address Number</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="addresNo" id="addressNo" readonly value="<?php echo $eAno; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="addressLane" class="control-label col-md-3">Lane/ Street</label>
                    <div class="col-md-8">
                    	<input class="form-control  text-capitalize" type="text" name="lane" id="lane" readonly value="<?php echo $eALane; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="addressCity" class="control-label col-md-3">City</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="city" id="city" readonly value="<?php echo $eACity; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeeContact" class="control-label col-md-3">Contact Number</label>
                    <div class="col-md-8">
                    	<input class="form-control" type="text" name="contact" id="contact" readonly value="<?php echo $eContact; ?>"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="regDate" class="control-label col-md-3">Registered Date Time</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="regDate" id="regDate" readonly value="<?php echo $regDateTime; ?>" required/>
                	</div>
                </div>
                <div class="form-group">
                     <div class="form-group col-md-11 text-center">
                        <input type="submit" value="Delete Profile" id="submit" name="submit" class="btn btn-danger" onclick="return confirm('Do You Wish to De-Activate Account?');return false;"/>
                    </div>
                </div>
            </form>
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
<?php
} else {
	header('Location:../404.php');
}
?>               