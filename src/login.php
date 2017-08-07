<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	include_once('../ssi/header.php');
?>

<body>
<!--header start-->
    <div class="col-md-12 text-center" style="background-color:#1a2229;padding:15px;height:10vh;">
        <font size="+3" color="#FFFFFF" face="Verdana, Geneva, sans-serif">Striking Sports</font>
    </div>
<!--header end-->    
<!--body start-->
	<div class="col-md-12" style="background-image:url(../images/10.jpeg);background-repeat:no-repeat;background-size:cover;width:100%;height:79vh;">
        <div>
            <div style="background-color:rgba(0,153,255,0.4);padding:10px;top:20vh;left:60%;" class="col-md-4 text-center">
            	<font size="+2" face="Verdana, Geneva, sans-serif" color="#000000" style="padding:10px;">Log In</font>
            	<form role="form" class="form-group" action="controller/loginController.php" method="post">
                    <div style="padding:10px;">
                     <input type="email" title="Should be a valid e-mail address" class="form-control" id="userNIC" name="userNIC" placeholder="Enter User E-mail Address" required="required">
                    </div>
                    <div style="padding:10px;">
                     <input type="password" class="form-control" pattern="\S+" title="Password should not be empty" id="password" name="password" placeholder="Enter Password" required="required">
                    </div>
                    <div style="padding:10px;">
                     <a href="register.php"><font face="Verdana, Geneva, sans-serif" color="#FFFFFF" style="padding:10px;">Don't have an account yet? Click here to register!</font></a>
                    </div>
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
                    <div class="row" style="padding:10px;">
                        <div class="center-block">
                             <input type="submit" class="btn btn-default" id="submit" name="submit" value="Log In" />
                             <input type="reset" class="btn btn-default" id="reset" name="reset" value="Clear" />
                         </div>
                    </div>
                </form>
            </div>        
        </div>
    </div>
<!--body end-->
<!--footer start-->
    <?php
		include_once('../ssi/copyRights.php');
	?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
<!--footer end-->
</body>
</html>
