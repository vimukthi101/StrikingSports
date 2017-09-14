<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
?>

<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenuAdmin.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Add A <span> New User</span></h2>
            </div>
            <div class="p-mf">
            	<div class="spe-title-1 spe-title-wid">
					<?php
						if(isset($_GET['error'])){
							if(!empty($_GET['error'])){
								$error = $_GET['error'];
								if($error == "ns"){
									echo '<label class="form-control" style="height:35px;">Please Submit The Form.</label>';
								} else if($error == "ef"){
									echo '<label class="form-control" style="height:35px;">Mandatory Fields Should Not Be Empty.</label>';
								} else if($error == "dm"){
									echo '<label class="form-control" style="height:35px;">Password And Confirm Password Does Not Match.</label>';
								} else if($error == "ee"){
									echo '<label class="form-control" style="height:35px;">Entered E-mail Does Not Exists.</label>';
								} else if($error == "fq"){
									echo '<label class="form-control" style="height:35px;">Could Not Update The User. Please Try Again Later.</label>';
								} else if($error == "as"){
									echo '<label class="form-control" style="height:35px;">User Updated Successfully.</label>';
								} else if($error == "we"){
									echo '<label class="form-control" style="height:35px;">Should Be A Valid EMail Address.</label>';
								} else if($error == "wf"){
									echo '<label class="form-control" style="height:35px;">First Name Should Be Letters. Cannot Be Empty.</label>';
								} else if($error == "wm"){
									echo '<label class="form-control" style="height:35px;">Middle Name Should Be Letters.</label>';
								} else if($error == "wl"){
									echo '<label class="form-control" style="height:35px;">Last Name Should Be Letters. Cannot Be Empty.</label>'; 
								} else if($error == "wn"){
									echo '<label class="form-control" style="height:35px;">Address No Should Be Letters, Numbers, / or \. Cannot Be Empty.</label>';
								} else if($error == "wa"){
									echo '<label class="form-control" style="height:35px;">Lane Should Be Letters. Cannot Be Empty.</label>';
								} else if($error == "wc"){
									echo '<label class="form-control" style="height:35px;">City Should Be Letters. Cannot Be Empty.</label>';
								} else if($error == "wp"){
									echo '<label class="form-control" style="height:35px;">Contact No Should Be A Valid Number With 10 Digits.</label>';
								}
							}
						}
					?>
                </div>
                <?php
				$email = trim(htmlspecialchars(mysqli_real_escape_string($con,$_GET['id'])));
				$getUser = "SELECT * FROM staff WHERE email='".$email."'";
				$resultGetUser = mysqli_query($con, $getUser);
				if(mysqli_num_rows($resultGetUser)!=0){
					while($rowUser = mysqli_fetch_array($resultGetUser)){
						$nameId = $rowUser['name_name_id'];
						$addressId = $rowUser['address_address_id'];
						$position = $rowUser['position'];
						if($position == 0){
							$position = "System Admin";
						} else if($position == 1){
							$position = "Editor";
						} else if($position == 2){
							$position = "Approver";
						}
						$contact = $rowUser['contact_no'];
						$getName = "SELECT * FROM NAME WHERE name_id='".$nameId."'";
						$resultGetName = mysqli_query($con, $getName);
						if(mysqli_num_rows($resultGetName) != 0){
							while($rowGetName = mysqli_fetch_array($resultGetName)){
								$eFName = $rowGetName['first_name'];
								$eSName = $rowGetName['second_name'];
								$eLName = $rowGetName['last_name'];
							}
						}
						$getAddress = "SELECT * FROM address WHERE address_id='".$addressId."'";
						$resultGetAddress = mysqli_query($con, $getAddress) or die();
						if(mysqli_num_rows($resultGetAddress) != 0){
							while($rowGetAddress = mysqli_fetch_array($resultGetAddress)){
								$eAno = $rowGetAddress['address_no'];
								$eALane = $rowGetAddress['address_lane'];
								$eACity = $rowGetAddress['address_city'];
							}
						}
						echo '<form method="post" action="controller/editStaffController.php" role="form" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-group col-md-11">
									<h4>First Name <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="text" id="fName" name="fName" value="'.$eFName.'" required class="form-control" pattern="^[a-zA-Z]+$" placeholder="Enter First Name" title="Should be letters only."/>
								</div>
								<div class="form-group col-md-11">
									<h4>Second Name </h4>
									<input type="text" id="sName" name="sName" value="'.$eSName.'" class="form-control" pattern="^[a-zA-Z]+$" placeholder="Enter Second Name" title="Should be letters only."/>
								</div>
								<div class="form-group col-md-11">
									<h4>Last Name <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="text" id="lName" name="lName" required value="'.$eLName.'" class="form-control" pattern="^[a-zA-Z]+$" placeholder="Enter Last Name" title="Should be letters only."/>
								</div>
								<div class="form-group col-md-11">
									<h4>E-Mail <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="email" id="email" name="email" required value="'.$email.'" class="form-control" readonly/>
								</div>
								<div class="form-group col-md-11">
									<h4>Position <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="text" id="position" name="position" required value="'.$position.'" class="form-control" readonly />
								</div>
								<div class="form-group col-md-11">
									<h4>Contact Number </h4>
									<input type="text" id="contact" name="contact" value="'.$contact.'" class="form-control" pattern="^\d{10}$|^$" placeholder="Enter Contact Number" title="Should be a valid telephone number."/>
								</div>
								<div class="form-group col-md-11">
									<h4>Address Number <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="text" id="aNo" name="aNo" class="form-control" value="'.$eAno.'" required pattern="^([0-9].*[\\/][a-zA-Z0-9]*)|([0-9].*)$" placeholder="Enter Address Number" title="Should be letters, numbers and comma only."/>
								</div>
								<div class="form-group col-md-11">
									<h4>Lane <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="text" id="lane" name="lane" class="form-control" value="'.$eALane.'" required pattern="[a-zA-Z]+" placeholder="Enter Address Lane" title="Should be letters only."/>
								</div>
								<div class="form-group col-md-11">
									<h4>City <span style="color:rgb(255,0,0);">*</span></h4>
									<input type="text" id="city" name="city" class="form-control" required value="'.$eACity.'" pattern="[a-zA-Z]+" placeholder="Enter City" title="Should be letters only."/>
								</div>
								<div class="form-group" style="text-align:center;">
									<label style="text-align:center;" class="control-label col-md-11"><span style="color:rgb(255,0,0);">*</span> Mandatory Fields</label> 
								</div>
								<div class="form-group col-md-11 text-center">
									<input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
								</div>
							</form>';
					}
				} else {
					//no result
					header('Location:../viewUsers.php');
				}
				?>
            </div>
        </div>
    </section>
    <?php
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