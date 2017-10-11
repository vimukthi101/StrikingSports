<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['position']) && ($_SESSION['position']==0 || $_SESSION['position']==1 || $_SESSION['position']==2)){
if(isset($_GET['id']) && !empty($_GET['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
//errors will not be shown
error_reporting(0);
?>

<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		if(isset($_SESSION['position']) && $_SESSION['position']==0){
			include_once('../ssi/sideMenuAdmin.php');
		} else if(isset($_SESSION['position']) && $_SESSION['position']==1){
			include_once('../ssi/sideMenuStaff.php');
		} else if(isset($_SESSION['position']) && $_SESSION['position']==2){
			include_once('../ssi/sideMenuApprover.php');
		}
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
    <?php
		$email = $_SESSION['email'];
		$id = trim(htmlspecialchars(mysqli_real_escape_string($con,$_GET["id"])));
		$getPost = "SELECT * FROM events WHERE event_id='".$id."'";
		$resultPost = mysqli_query($con, $getPost);
		if(mysqli_num_rows($resultPost)!=0){
			while($rowPost = mysqli_fetch_array($resultPost)){
				$date = $rowPost['event_date'];
				$title = $rowPost['event_name'];
				$description = $rowPost['information'];
				$place = $rowPost['place'];
				$status = $rowPost['status'];
				$staff = $rowPost['email'];
				$categoryId = $rowPost['event_category'];
				$image = $rowPost['event_image'];
			}
			$getCategory = "SELECT * FROM category WHERE category_id='".$categoryId."'";
			$resultCategory = mysqli_query($con, $getCategory);
			if(mysqli_num_rows($resultCategory)!=0){
				while($rowCategory = mysqli_fetch_array($resultCategory)){
					$category = $rowCategory['category'];
				}
			}
			echo '<div class="lp spe-bot-red-3">';
			if(isset($_GET['error'])){
				$error = $_GET['error'];
				if($error == 'pt'){
					echo '<div style="padding:3px;">
							<label class="form-control">Could not delete the post. Please try again later.</label>
						</div>';
				}
			}
			echo '<div class="inn-title">
				<h2><i class="fa fa-check" aria-hidden="true"></i> '.$title.'</h2>
				<h4><span>Event At : </span>'.$place.'</h4>
				<h4><span>Event On : </span>'.$date.'</h4>
				<h4><span> Added By : </span>'.$staff.'</h4>';
				echo '</h3>
            </div>
			<div class="p-mf"><img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive" style="width:100%;height:300px;"></img></div>
			<div class="p-mf"><h4>'.$description.'</h4></div>
			<div class="p-mf"><h4>Category : <span>'.$category.'</span></h4></div>
        </div><div class="lp spe-bot-red-3 center-block" style="padding-top:0;">';
							if($status==0 || $status==1 || $status==3){
								if($email == $staff){
									echo '<div class="p-mf col-md-offset-5"><form role="form" class="form-group" action="controller/deleteEventController.php" method="post"><div class="col-md-2" style="padding:5px;"><input type="text" hidden="" id="id" name="id" value="'.$id.'"><input type="submit" id="submit" name="submit" value="Delete Event" class="form-control btn btn-danger" onclick="return confirm(\'Are you sure that you want to delete the Event?\');return false;"></div></form></div>';	
								} else {
									echo '<div class="p-mf col-md-offset-4"><div class="col-md-6" style="padding:10px;"><input type="button" class="form-control btn btn-warning" value="You don\'t have permission to delete this Event"></div></div>';
								}
							} if($status==2){
								echo '<div class="p-mf col-md-offset-4"><div class="col-md-6" style="padding:10px;"><input type="button" class="form-control btn btn-warning" value="You don\'t have permission to delete this Event"></div></div>';
							}
							echo '</div>';
		} else {
			echo '<div class="lp spe-bot-red-3 text-center" style="height:400px;">
            <div class="inn-title">
                <h2>No Event To Dispaly. Please Try Again Later.</h2>
            </div>
        </div>';
		}
	?>
    </section>
    <?php
		include_once('../ssi/copyRights.php');
	?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript">
		 function load() { 
			document.getElementById('new').innerHTML = '<form role="form" class="form-group" action="" method="post"><div style="padding:10px;"><textarea id="replyComment" name="replyComment" class="form-control" required></textarea></div><div class="col-md-1 pull-right" style="padding:10px;"><input type="submit" id="submit" name="submit" value="Reply" class="form-control btn btn-success"></div></form>'; 
		 } 
	</script>
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
	// 404 no operation
	header('Location:../404.php');	
}
} else {
	// 404 no operation
	header('Location:../404.php');	
}
?>