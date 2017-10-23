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
        <div class="lp spe-bot-red-3">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Sports <span> News</span></h2>
                <p>Actually nobody can be perfect in cricket. Everybody makes mistakes. It is important to learn from your mistakes and correct them - <span>Kumar Sangakkara</span></p>
            </div>
                <?php 
				if(isset($_POST['submit']) && isset($_POST['search'])){
					$search = trim(htmlspecialchars(mysql_real_escape_string(($_POST['search']))));
					$getPost = "SELECT * FROM blog_post WHERE title LIKE '%".$search."%' OR description LIKE '%".$search."%' OR post LIKE '%".$search."%' OR tag LIKE '%".$search."%'";
					$rGetPost = mysqli_query($con, $getPost);
					if(mysqli_num_rows($rGetPost)!=0){
						while($rowGetPost = mysqli_fetch_array($rGetPost)){
							$date = $rowGetPost['created_date_time'];
							$id = $rowGetPost['post_id'];
							$title = $rowGetPost['title'];
							$description = $rowGetPost['description'];
							$image = $rowGetPost['image'];
							$views = $rowGetPost['views'];
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
							$getComments = "SELECT COUNT(*) as comments FROM comments WHERE blog_post_post_id='".$id."'";
							$resultComments = mysqli_query($con, $getComments);
							if(mysqli_num_rows($resultComments)!=0){
								while($rowComments = mysqli_fetch_array($resultComments)){
									$comments = $rowComments['comments'];
								}
							}
							echo '<div class="p-join-club">
								<div class="col-md-3">
									<div class="hom-trend">
										<div class="hom-trend-img">
											<img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive" style="width:100%;height:200px;"></img>
										</div>
										<div class="hom-trend-con">
											<span><i class="fa fa-calendar" aria-hidden="true"></i> '.$date.'</span>
											<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$likes.'</span>
											<span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$unLikes.'</span>
											<span><i class="fa fa-comment-o" aria-hidden="true"></i> '.$comments.'</span>
											<span><i class="fa fa-eye" aria-hidden="true"></i> '.$views.'</span>
											<a href="view.php?id='.$id.'">
												<h4>'.$title.'</h4>
												<p style="max-width: 500px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">'.$description.'</p>
											</a>
										</div>
									</div>
								</div>
							</div>';
						}
					} else {
						echo '<h2 class="text-center">No Blog Posts To Show</h2>';	
					}
				} else {
					echo '<h2 class="text-center">No Blog Posts To Show</h2>';
				}
				?>		
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