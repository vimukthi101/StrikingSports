<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_GET['id']) && !empty($_GET['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
?>

<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenuStaff.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
    <?php
		$id = trim(htmlspecialchars(mysqli_real_escape_string($con,$_GET["id"])));
		$getPost = "SELECT * FROM blog_post WHERE post_id='".$id."'";
		$resultPost = mysqli_query($con, $getPost);
		if(mysqli_num_rows($resultPost)!=0){
			while($rowPost = mysqli_fetch_array($resultPost)){
				$date = $rowPost['created_date_time'];
				$title = $rowPost['title'];
				$description = $rowPost['description'];
				$post = $rowPost['post'];
				$status = $rowPost['status'];
				$staff = $rowPost['staff_email'];
				$tags = $rowPost['tag'];
				$categoryId = $rowPost['category_id'];
				$views = $rowPost['views'];
				$getName = "SELECT first_name, second_name, last_name FROM NAME WHERE name_id IN(SELECT name_name_id FROM staff WHERE email='".$staff."')";
				$resultName = mysqli_query($con, $getName);
				if(mysqli_num_rows($resultName)!=0){
					while($rowName = mysqli_fetch_array($resultName)){
						$fName = $rowName['first_name'];
						$mName = $rowName['second_name'];
						$lName = $rowName['last_name'];
						$name = $fName.' '.$mName.' '.$lName;
					}
				} else {
					$name = $staff;
				}
				$getCategory = "SELECT category FROM category WHERE category_id ='".$categoryId."'";
				$resultCategory = mysqli_query($con, $getCategory);
				if(mysqli_num_rows($resultCategory)!=0){
					while($rowCategory = mysqli_fetch_array($resultCategory)){
						$category = $rowCategory['category'];
					}
				}
				$getComments = "SELECT * FROM comments WHERE blog_post_post_id='".$id."'";
				$resultComments = mysqli_query($con, $getComments);
				if(mysqli_num_rows($resultComments)!=0){
					while($rowComments = mysqli_fetch_array($resultComments)){
						$commentId = $rowComments['comment_id'];
						$comment = $rowComments['comment'];
						$commentDate = $rowComments['comment_date_time'];
						$commentUser = $rowComments['users_email'];
					}
				}
			}
			echo '<div class="lp spe-bot-red-3">
			<div class="p-mf"><h4><span>Created On : </span>'.$date.'<span> By : </span>'.$name.'</h4></div>
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> '.$title.'</h2>
				<h3><i class="fa fa-eye" aria-hidden="true"></i><span> '.$views.' </span><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$views.' </span><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$views.'</span></h3>
            </div>
			<div class="p-mf"><h4>'.$description.'</h4></div>
			<div class="p-mf"><p>'.$post.'</p></div>
			<div class="p-mf"><h4>Tags : <span>'.$tags.'</span></h4></div>
			<div class="p-mf"><h4>Category : <span>'.$category.'</span></h4></div>
			<div class="p-mf"><h4>Comments : </h4></div>
        </div>';
		} else {
			echo '<div class="lp spe-bot-red-3 text-center" style="height:400px;">
            <div class="inn-title">
                <h2>No Post To Dispaly. Please Try Again Later.</h2>
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
?>