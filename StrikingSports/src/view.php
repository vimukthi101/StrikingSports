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
    <?php
		$email = $_SESSION['email'];
		$id = trim(htmlspecialchars(mysqli_real_escape_string($con,$_GET["id"])));
		$updateViews = "UPDATE blog_post SET views=views+1 WHERE post_id='".$id."'";
		if(mysqli_query($con, $updateViews));
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
				$image = $rowPost['image'];
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
				$getLike = "SELECT COUNT(STATUS) AS likes FROM likes WHERE blog_post_id='".$id."' AND STATUS='0'";
				$resultLike = mysqli_query($con, $getLike);
				if(mysqli_num_rows($resultLike)!=0){
					while($rowLike = mysqli_fetch_array($resultLike)){
						$likes = $rowLike['likes'];
					}
				}
				$getUnLike = "SELECT COUNT(STATUS) AS unlikes FROM likes WHERE blog_post_id='".$id."' AND STATUS='1'";
				$resultUnLike = mysqli_query($con, $getUnLike);
				if(mysqli_num_rows($resultUnLike)!=0){
					while($rowUnLike = mysqli_fetch_array($resultUnLike)){
						$unLikes = $rowUnLike['unlikes'];
					}
				}
				$getLikedStatus = "SELECT status FROM likes WHERE users_email='".$email."' AND blog_post_id='".$id."'";
				$resultLikedStatus = mysqli_query($con, $getLikedStatus);
				if(mysqli_num_rows($resultLikedStatus)!=0){
					while($rowLikedStatus = mysqli_fetch_array($resultLikedStatus)){
						$postLikeStatus = $rowLikedStatus['status'];
					}
				} else {
					$postLikeStatus =2;
				}
			}
			echo '<div class="lp spe-bot-red-3">
			<div class="p-mf"><h4><span>Created On : </span>'.$date.'<span> By : </span>'.$name.'</h4></div>
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> '.$title.'</h2>
				<h3><a><i class="fa fa-eye" aria-hidden="true"></i><span> '.$views.' </span></a>';
				if(isset($_SESSION['email'])){
					if($postLikeStatus == 0){
						echo '<a href="controller/postLikesController.php?id='.$id.'&status=0&pStatus=0"><i class="fa fa-thumbs-up" style="color:rgb(255,0,0);" aria-hidden="true"></i><span> '.$likes.' </span></a><a href="controller/postLikesController.php?id='.$id.'&status=1&pStatus=0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$unLikes.'</span></a>';
					} else if($postLikeStatus == 1) {
						echo '<a href="controller/postLikesController.php?id='.$id.'&status=0&pStatus=1"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$likes.' </span></a><a href="controller/postLikesController.php?id='.$id.'&status=1&pStatus=1"><i class="fa fa-thumbs-down" style="color:rgb(255,0,0);" aria-hidden="true"></i><span> '.$unLikes.'</span></a>';
					} else if($postLikeStatus == 2) {
						echo '<a href="controller/postLikesController.php?id='.$id.'&status=0&pStatus=2"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$likes.' </span></a><a href="controller/postLikesController.php?id='.$id.'&status=1&pStatus=2"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$unLikes.'</span></a>';
					}	
				} else {
					echo '<a><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$likes.' </span></a><a><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$unLikes.'</span></a>';
				}
				echo '</h3>
            </div>
			<div class="p-mf"><img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive" style="width:100%;height:300px;"></img></div>
			<div class="p-mf"><h4>'.$description.'</h4></div>
			<div class="p-mf"><p>'.$post.'</p></div>
			<div class="p-mf"><h4>Tags : <span>'.$tags.'</span></h4></div>
			<div class="p-mf"><h4>Category : <span>'.$category.'</span></h4></div>
			<div class="p-mf"><h4>Comments : </h4></div>
        </div>';
				$getComments = "SELECT * FROM comments WHERE blog_post_post_id='".$id."' ORDER BY comment_date_time";
				$resultComments = mysqli_query($con, $getComments);
				if(mysqli_num_rows($resultComments)!=0){
					while($rowComments = mysqli_fetch_array($resultComments)){
						$commentId = $rowComments['comment_id'];
						$comment = $rowComments['comments'];
						$commentDate = $rowComments['comment_date_time'];
						$commentUser = $rowComments['users_email'];
						$getCommentLike = "SELECT COUNT(STATUS) as likes FROM comment_like WHERE comment_id='".$commentId."' AND STATUS='0'";
						$resultCommentLike = mysqli_query($con, $getCommentLike);
						if(mysqli_num_rows($resultCommentLike)!=0){
							while($rowCommentLike = mysqli_fetch_array($resultCommentLike)){
								$commentLike = $rowCommentLike['likes'];
							}
						}
						$getCommentUnLike = "SELECT COUNT(STATUS) as likes FROM comment_like WHERE comment_id='".$commentId."' AND STATUS='1'";
						$resultCommentUnLike = mysqli_query($con, $getCommentUnLike);
						if(mysqli_num_rows($resultCommentUnLike)!=0){
							while($rowCommentUnLike = mysqli_fetch_array($resultCommentUnLike)){
								$commentUnLike = $rowCommentUnLike['likes'];
							}
						}
						$getCommentLikedStatus = "SELECT status FROM comment_like WHERE users_email='".$email."' AND comment_id='".$commentId."'";
						$resultCommentLikedStatus = mysqli_query($con, $getCommentLikedStatus);
						if(mysqli_num_rows($resultCommentLikedStatus)!=0){
							while($rowCommentLikedStatus = mysqli_fetch_array($resultCommentLikedStatus)){
								$commentLikeStatus = $rowCommentLikedStatus['status'];
							}
						} else {
							$commentLikeStatus =2;
						}
						echo '<div class="lp spe-bot-red-3" style="padding-top:0;">
								<div class="p-mf">
									<p>'.$commentDate.' by '.$commentUser.'</p>
									<textarea disabled>'.$comment.'</textarea>
									<p>';
						if(isset($_SESSION['email'])){
							if($commentLikeStatus == 0){
								echo '<a href="controller/commentLikesController.php?id='.$commentId.'&status=0&pStatus=0&post='.$id.'"><i class="fa fa-thumbs-up" aria-hidden="true" style="color:rgb(255,0,0);"></i><span> '.$commentLike.' </span></a><a href="controller/commentLikesController.php?id='.$commentId.'&status=1&pStatus=0&post='.$id.'"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$commentUnLike.'</span></a>';	
							} else if($commentLikeStatus == 1) {
								echo '<a href="controller/commentLikesController.php?id='.$commentId.'&status=0&pStatus=1&post='.$id.'"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$commentLike.' </span></a><a href="controller/commentLikesController.php?id='.$commentId.'&status=1&pStatus=1&post='.$id.'"><i class="fa fa-thumbs-down" aria-hidden="true" style="color:rgb(255,0,0);"></i><span> '.$commentUnLike.'</span></a>';
							} else if($commentLikeStatus == 2) {
								echo '<a href="controller/commentLikesController.php?id='.$commentId.'&status=0&pStatus=2&post='.$id.'"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$commentLike.' </span></a><a href="controller/commentLikesController.php?id='.$commentId.'&status=1&pStatus=2&post='.$id.'"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$commentUnLike.'</span></a>';
							}
						} else {
							echo '<a><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$commentLike.' </span></a><a><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$commentUnLike.'</span></a>';
						}
									echo '</p>
									<p id="new"></p>
								</div>
							</div>';
					}
				}
				if(isset($_SESSION['email'])){
					echo '<div class="lp spe-bot-red-3" style="padding-top:0;">
						<div class="p-mf">
						<form role="form" class="form-group" action="controller/commentController.php" method="post">
							<div style="padding:10px;">
								<textarea id="comment" name="comment" class="form-control" required></textarea>
								<input type="text" name="post" id="post" hidden="" value="'.$id.'">
							</div>
							<div class="col-md-2 pull-right" style="padding:10px;">
								<input type="submit" id="submit" name="submit" value="Post Comment" class="form-control btn btn-success">
							</div>
						</form>
						</div>
					 </div>';	
				} else {
					echo '<h4 class="text-center">Please login to add a comment</h4>';
				}
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
		include_once('../ssi/latestPost.php');
		include_once('../ssi/footer.php');
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
?>