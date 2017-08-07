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
            	<u>Edit Profile</u>
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
        <div style="padding:10px;"> 
        	<?php
				if(isset($_GET['error'])){
					if(!empty($_GET['error'])){
						$error = $_GET['error'];
						if($error == "wf"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">First Name Should Be Letters. Cannot Be Empty.</label>
								</div>';
						} else if($error == "wm"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">Middle Name Should Be Letters.</label>
								</div>';
						} else if($error == "wl"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">Last Name Should Be Letters. Cannot Be Empty.</label>
								</div>';
						} else if($error == "wn"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">Address Number Should Be Letters, Numbers, / or \. Cannot Be Empty.</label>
								</div>';
						} else if($error == "wa"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">Lane Should Be Letters. Cannot Be Empty.</label>
								</div>';
						} else if($error == "wc"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">City Should Be Letters. Cannot Be Empty.</label>
								</div>';
						} else if($error == "wp"){
							echo '<div class="form-group text-center" style="padding-left:100px;">
									<label class="form-control" style="height:35px;">Contact Number Should Be A Valid Number With 10 Digits.</label>
								</div>';
						}
					}
				}
			?>
			<form role="form" class="form-horizontal" method="post" action="controller/editProfileController.php">
                <div class="form-group">
                    <label for="employeelNIC" class="control-label col-md-3">E-mail <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control" type="text" name="nic" id="nic" readonly="readonly" value="<?php echo $email; ?>" required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeefName" class="control-label col-md-3">First Name <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" pattern="^[a-zA-Z]+$" title="Should Be Letters. Cannot Be Empty." type="text" name="fname" id="fname" value="<?php echo $eFName; ?>" required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeemName" class="control-label col-md-3">Middle Name</label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="mname" id="mname" value="<?php echo $eSName; ?>" pattern="^[a-zA-Z]*$|^$" title="Should Be Letters. Can Be Empty."/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeelName" class="control-label col-md-3">Last Name <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8"> 
                    	<input class="form-control text-capitalize" type="text" name="lname" id="lname" value="<?php echo $eLName; ?>" pattern="^[a-zA-Z]+$" title="Should Be Letters. Cannot Be Empty." required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="addressNo" class="control-label col-md-3">Address Number <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="addresNo" id="addressNo" value="<?php echo $eAno; ?>" pattern="^([0-9].*[\\/][a-zA-Z0-9]*)|([0-9].*)$" title="Should Be Letters, Numbers, / or \. Cannot Be Empty." required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="addressLane" class="control-label col-md-3">Lane/ Street <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="lane" id="lane" value="<?php echo $eALane; ?>" pattern="^[a-zA-Z ]+$" title="Should Be Letters. Cannot Be Empty." required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="addressCity" class="control-label col-md-3">City <span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="city" id="city" value="<?php echo $eACity; ?>" pattern="^[a-zA-Z]+$" title="Should Be Letters. Cannot Be Empty." required="required"/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="employeeContact" class="control-label col-md-3">Contact Number</label>
                    <div class="col-md-8">
                    	<input class="form-control" type="text" name="contact" id="contact" value="<?php echo $eContact; ?>" pattern="^(\d{10})|(^$)$" title="Should Be A Valid Number With 10 Digits."/>
                	</div>
                </div>
                <div class="form-group">
                    <label for="regDate" class="control-label col-md-3">Registered Date Time<span style="color:rgb(255,0,0);">*</span></label>
                    <div class="col-md-8">
                    	<input class="form-control text-capitalize" type="text" name="regDate" id="regDate" readonly="readonly" value="<?php echo $regDateTime; ?>" required="required"/>
                	</div>
                </div>
                <div class="form-group" style="text-align:center;">
                    <label for="employeeContact" style="text-align:center;" class="control-label col-md-11"><span style="color:rgb(255,0,0);">*</span> Mandatory Fields</label> 
                </div>
                <div class="form-group col-md-11 text-center">
                    <input type="submit" value="Update" id="submit" name="submit" class="btn btn-success" />
                    <input type="reset" value="Clear" class="btn btn-danger" />
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