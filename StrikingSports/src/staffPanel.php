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
if(isset($_SESSION['position']) && $_SESSION['position']==1){
?>
<!--editor home page-->
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
        <div class="lp spe-bot-red-3">
        	<div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> My Blog <span> Posts Stats</span></h2>
                <div class="hom-trend-con">
                	<?php
                		$draft = "SELECT COUNT(*) as draft FROM blog_post WHERE STATUS='0'";
						$rDraft = mysqli_query($con, $draft);
						$pending = "SELECT COUNT(*) as pending FROM blog_post WHERE STATUS='1'";
						$rPending = mysqli_query($con, $pending);
						$published = "SELECT COUNT(*) as published FROM blog_post WHERE STATUS='2'";
						$rPublished = mysqli_query($con, $published);
						$rejected = "SELECT COUNT(*) as rejected FROM blog_post WHERE STATUS='3'";
						$rRejected = mysqli_query($con, $rejected);
						if(mysqli_num_rows($rDraft)!=0 && mysqli_num_rows($rPending)!=0 && mysqli_num_rows($rPublished)!=0 && mysqli_num_rows($rRejected)!=0){
							while($rowDraft = mysqli_fetch_array($rDraft)){
								$cDraft = $rowDraft['draft'];
								if(empty($cDraft)){
									$cDraft = 0;
								}
							}
							while($rowPending = mysqli_fetch_array($rPending)){
								$cPending = $rowDraft['pending'];
								if(empty($cPending)){
									$cPending = 0;
								}
							}
							while($rowPublished = mysqli_fetch_array($rPublished)){
								$cPublished = $rowDraft['published'];
								if(empty($cPublished)){
									$cPublished = 0;
								}
							}
							while($rowRejected = mysqli_fetch_array($rRejected)){
								$cRejected = $rowDraft['rejected'];
								if(empty($cRejected)){
									$cRejected = 0;
								}
							}
						}
					?>
                    <span class="col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Drafts : <?php echo $cDraft ?></span>
                    <span class="col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i> Published : <?php echo $cPublished ?></span>
                    <span class="col-md-3"><i class="fa fa-ban" aria-hidden="true"></i> Rejected : <?php echo $cRejected ?></span>
                    <span class="col-md-3"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending Approval : <?php echo $cPending ?></span>
                </div>
            </div>
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Recent Blog Posts <span> By Me</span></h2>
            </div>
            <?php
			$email = $_SESSION['email'];
			$getPost = "SELECT * FROM blog_post WHERE staff_email='".$email."' ORDER BY created_date_time";
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
						<div class="col-md-4">
							<div class="hom-trend">
								<div class="hom-trend-img">
									<img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive" style="width:100%;height:300px;"></img>
								</div>
								<div class="hom-trend-con">
									<span><i class="fa fa-calendar" aria-hidden="true"></i> '.$date.'</span>
									<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$likes.'</span>
									<span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$unLikes.'</span>
									<span><i class="fa fa-comment-o" aria-hidden="true"></i> '.$comments.'</span>
									<span><i class="fa fa-eye" aria-hidden="true"></i> '.$views.'</span>
									<a href="viewPost.php?id=">
										<h4>'.$title.'</h4>
									</a>
									<p>'.$description.'</p>
								</div>
								<div class="hom-trend-con">
									<a href="deletePost.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span></a>
									<a href="post.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-eye" aria-hidden="true"></i>View</span>
									<a href="editPost.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</span>
								</div>
							</div>
						</div>
					</div>';
				}
			} else {
				echo '<h2 class="text-center">No Blog Posts To Show</h2>';	
			}
			?>
        </div>
    </section>
    <?php
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
<?php
} else if(isset($_SESSION['position']) && $_SESSION['position']==0){
?>
<!--admin home page-->

<?php
} else if(isset($_SESSION['position']) && $_SESSION['position']==2){
?>
<!--approver home page-->

<?php
} else {
	//404 page	
	header('Location:../404.php');
}
?>
</html>