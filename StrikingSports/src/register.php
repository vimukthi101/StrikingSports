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
                        <h2>Register your <span>Account Now!</span> </h2>
                    </div>
                    <div class="spe-title-1 spe-title-wid center-block">
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
									echo '<label class="form-control" style="height:35px;">Entered E-mail Exists.</label>';
								} else if($error == "fq"){
									echo '<label class="form-control" style="height:35px;">Could Not Add The User. Please Try Again Later.</label>';
								} else if($error == "as"){
									echo '<label class="form-control" style="height:35px;">User Added Successfully.</label>';
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
                    <div class="book-form">
                        <form role="form" class="form-horizontal" method="post" action="controller/registrationController.php">
                            <div class="form-group">
                                <label for="employeeEmail" class="control-label col-md-3">E-Mail <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" title="Should Be A Valid EMail Address" type="email" name="email" id="email" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employeefName" class="control-label col-md-3">First Name <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" pattern="^[a-zA-Z]+$" title="Should Be Letters. Cannot Be Empty." type="text" name="fname" id="fname" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employeemName" class="control-label col-md-3">Middle Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" pattern="^[a-zA-Z]*$|^$" title="Should Be Letters. Can Be Empty." type="text" name="mname" id="mname" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employeelName" class="control-label col-md-3">Last Name <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" pattern="^[a-zA-Z]+$" title="Should Be Letters. Cannot Be Empty." type="text" name="lname" id="lname" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addressNo" class="control-label col-md-3">Address Number <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" pattern="^([0-9].*[\\/][a-zA-Z0-9]*)|([0-9].*)$" title="Should Be Letters, Numbers, / or \. Cannot Be Empty." type="text" name="addresNo" id="addressNo" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addressLane" class="control-label col-md-3">Lane/ Street <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" title="Should Be Letters. Cannot Be Empty." type="text" name="lane" id="lane" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="addressCity" class="control-label col-md-3">City <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" title="Should Be Letters. Cannot Be Empty." type="text" name="city" id="city" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employeeContact" class="control-label col-md-3">Contact Number</label>
                                <div class="col-md-8">
                                    <input class="form-control" maxlength="10" pattern="^\d{10}$" title="Should Be A Valid Number With 10 Digits." type="text" name="contact" id="contact" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employeeContact" class="control-label col-md-3">Password <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="password" id="password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="employeeContact" class="control-label col-md-3">Confirm Password <span style="color:rgb(255,0,0);">*</span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="cPassword" id="cPassword" />
                                </div>
                            </div>
                            <div class="form-group" style="text-align:center;">
                                <label for="employeeContact" style="text-align:center;" class="control-label col-md-11"><span style="color:rgb(255,0,0);">*</span> Mandatory Fields</label> 
                            </div>
                            <div class="form-group">
                            	<div class="col-sm-offset-3 col-sm-6">
                                	<input type="submit" value="REGISTER" id="submit" name="submit" class="btn btn-success" />
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