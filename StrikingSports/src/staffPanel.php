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
						$email = $_SESSION['email'];
                		$draft = "SELECT COUNT(*) as draft FROM blog_post WHERE STATUS='0' AND staff_email='".$email."'";
						$rDraft = mysqli_query($con, $draft);
						$pending = "SELECT COUNT(*) as pending FROM blog_post WHERE STATUS='1' AND staff_email='".$email."'";
						$rPending = mysqli_query($con, $pending);
						$published = "SELECT COUNT(*) as published FROM blog_post WHERE STATUS='2' AND staff_email='".$email."'";
						$rPublished = mysqli_query($con, $published);
						$rejected = "SELECT COUNT(*) as rejected FROM blog_post WHERE STATUS='3' AND staff_email='".$email."'";
						$rRejected = mysqli_query($con, $rejected);
						if(mysqli_num_rows($rDraft)!=0 && mysqli_num_rows($rPending)!=0 && mysqli_num_rows($rPublished)!=0 && mysqli_num_rows($rRejected)!=0){
							while($rowDraft = mysqli_fetch_array($rDraft)){
								$cDraft = $rowDraft['draft'];
								if(empty($cDraft)){
									$cDraft = 0;
								}
							}
							while($rowPending = mysqli_fetch_array($rPending)){
								$cPending = $rowPending['pending'];
								if(empty($cPending)){
									$cPending = 0;
								}
							}
							while($rowPublished = mysqli_fetch_array($rPublished)){
								$cPublished = $rowPublished['published'];
								if(empty($cPublished)){
									$cPublished = 0;
								}
							}
							while($rowRejected = mysqli_fetch_array($rRejected)){
								$cRejected = $rowRejected['rejected'];
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
			$getPost = "SELECT * FROM blog_post WHERE staff_email='".$email."' ORDER BY created_date_time";
			$rGetPost = mysqli_query($con, $getPost);
			if(mysqli_num_rows($rGetPost)!=0){
				echo '<div class="row">';
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
									<a href="post.php?id='.$id.'">
										<h4>'.$title.'</h4>
										<p style="max-width: 500px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">'.$description.'</p>
									</a>
								</div>
								<div class="hom-trend-con">
									<a href="deletePost.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-trash-o" aria-hidden="true"></i>Del.</span></a>
									<a href="post.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-eye" aria-hidden="true"></i>View</span></a>
									<a href="editPost.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</span></a>
								</div>
								<div style="padding-top:30px;"></div>
							</div>
						</div>
					</div>';
				}
				echo '</div>';
			} else {
				echo '<h2 class="text-center">No Blog Posts To Show</h2>';	
			}
			?>
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
<?php
} else if(isset($_SESSION['position']) && $_SESSION['position']==0){
?>
<!--admin home page-->
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
                <h2><i class="fa fa-check" aria-hidden="true"></i> Site <span>Users Stats</span></h2>
                <div class="hom-trend-con">
                	<?php
                		$admins = "SELECT COUNT(*) AS sysadmin FROM staff WHERE POSITION='0'";
						$rAdmins = mysqli_query($con, $admins);
						$editors = "SELECT COUNT(*) AS editor FROM staff WHERE POSITION='1'";
						$rEditors = mysqli_query($con, $editors);
						$approvers = "SELECT COUNT(*) AS approver FROM staff WHERE POSITION='2'";
						$rApprovers = mysqli_query($con, $approvers);
						if(mysqli_num_rows($rAdmins)!=0 && mysqli_num_rows($rEditors)!=0 && mysqli_num_rows($rApprovers)!=0){
							while($rowAdmins = mysqli_fetch_array($rAdmins)){
								$cAdmin = $rowAdmins['sysadmin'];
								if(empty($cAdmin)){
									$cAdmin = 0;
								}
							}
							while($rowEditors = mysqli_fetch_array($rEditors)){
								$cEditors = $rowEditors['editor'];
								if(empty($cEditors)){
									$cEditors = 0;
								}
							}
							while($rowApprovers = mysqli_fetch_array($rApprovers)){
								$cApprovers = $rowApprovers['approver'];
								if(empty($cApprovers)){
									$cApprovers = 0;
								}
							}
						}
					?>
                    <span class="col-md-3"><i class="fa fa-laptop" aria-hidden="true"></i> SysAdmins : <?php echo $cAdmin ?></span>
                    <span class="col-md-3"><i class="fa fa-pencil" aria-hidden="true"></i> Editors : <?php echo $cEditors ?></span>
                    <span class="col-md-3"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Approvers : <?php echo $cApprovers ?></span>
                </div>
            </div>
        	<div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Site Blog <span> Posts Stats</span></h2>
                <div class="hom-trend-con">
                	<?php
						$emailAdmin = $_SESSION['email'];
                		$draftAdmin = "SELECT COUNT(*) as draft FROM blog_post WHERE STATUS='0'";
						$rDraftAdmin = mysqli_query($con, $draftAdmin);
						$pendingAdmin = "SELECT COUNT(*) as pending FROM blog_post WHERE STATUS='1'";
						$rPendingAdmin = mysqli_query($con, $pendingAdmin);
						$publishedAdmin = "SELECT COUNT(*) as published FROM blog_post WHERE STATUS='2'";
						$rPublishedAdmin = mysqli_query($con, $publishedAdmin);
						$rejectedAdmin = "SELECT COUNT(*) as rejected FROM blog_post WHERE STATUS='3'";
						$rRejectedAdmin = mysqli_query($con, $rejectedAdmin);
						if(mysqli_num_rows($rDraftAdmin)!=0 && mysqli_num_rows($rPendingAdmin)!=0 && mysqli_num_rows($rPublishedAdmin)!=0 && mysqli_num_rows($rRejectedAdmin)!=0){
							while($rowDraftAdmin = mysqli_fetch_array($rDraftAdmin)){
								$cDraftAdmin = $rowDraftAdmin['draft'];
								if(empty($cDraftAdmin)){
									$cDraftAdmin = 0;
								}
							}
							while($rowPendingAdmin = mysqli_fetch_array($rPendingAdmin)){
								$cPendingAdmin = $rowPendingAdmin['pending'];
								if(empty($cPendingAdmin)){
									$cPendingAdmin = 0;
								}
							}
							while($rowPublishedAdmin = mysqli_fetch_array($rPublishedAdmin)){
								$cPublishedAdmin = $rowPublishedAdmin['published'];
								if(empty($cPublishedAdmin)){
									$cPublishedAdmin = 0;
								}
							}
							while($rowRejectedAdmin = mysqli_fetch_array($rRejectedAdmin)){
								$cRejectedAdmin = $rowRejectedAdmin['rejected'];
								if(empty($cRejectedAdmin)){
									$cRejectedAdmin = 0;
								}
							}
						}
					?>
                    <span class="col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Drafts : <?php echo $cDraftAdmin ?></span>
                    <span class="col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i> Published : <?php echo $cPublishedAdmin ?></span>
                    <span class="col-md-3"><i class="fa fa-ban" aria-hidden="true"></i> Rejected : <?php echo $cRejectedAdmin ?></span>
                    <span class="col-md-3"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending Approval : <?php echo $cPendingAdmin ?></span>
                </div>
            </div>
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Recent <span> Blog Posts</span></h2>
            </div>
            <?php
			$getPostAdmin = "SELECT * FROM blog_post ORDER BY created_date_time";
			$rGetPostAdmin = mysqli_query($con, $getPostAdmin);
			if(mysqli_num_rows($rGetPostAdmin)!=0){
				echo '<div class="row">';
				while($rowGetPostAdmin = mysqli_fetch_array($rGetPostAdmin)){
					$dateAdmin = $rowGetPostAdmin['created_date_time'];
					$idAdmin = $rowGetPostAdmin['post_id'];
					$titleAdmin = $rowGetPostAdmin['title'];
					$descriptionAdmin = $rowGetPostAdmin['description'];
					$imageAdmin = $rowGetPostAdmin['image'];
					$viewsAdmin = $rowGetPostAdmin['views'];
					$getLikeAdmin = "SELECT COUNT(STATUS) AS likes FROM likes WHERE blog_post_id='".$idAdmin."' AND STATUS='0'";
					$resultLikeAdmin = mysqli_query($con, $getLikeAdmin);
					if(mysqli_num_rows($resultLikeAdmin)!=0){
						while($rowLikeAdmin = mysqli_fetch_array($resultLikeAdmin)){
							$likesAdmin = $rowLikeAdmin['likes'];
						}
					}
					$getUnLikeAdmin = "SELECT COUNT(STATUS) AS unlikes FROM likes WHERE blog_post_id='".$idAdmin."' AND STATUS='1'";
					$resultUnLikeAdmin = mysqli_query($con, $getUnLikeAdmin);
					if(mysqli_num_rows($resultUnLikeAdmin)!=0){
						while($rowUnLikeAdmin = mysqli_fetch_array($resultUnLikeAdmin)){
							$unLikesAdmin = $rowUnLikeAdmin['unlikes'];
						}
					}
					$getCommentsAdmin = "SELECT COUNT(*) as comments FROM comments WHERE blog_post_post_id='".$idAdmin."'";
					$resultCommentsAdmin = mysqli_query($con, $getCommentsAdmin);
					if(mysqli_num_rows($resultCommentsAdmin)!=0){
						while($rowCommentsAdmin = mysqli_fetch_array($resultCommentsAdmin)){
							$commentsAdmin = $rowCommentsAdmin['comments'];
						}
					}
					echo '<div class="p-join-club">
						<div class="col-md-3">
							<div class="hom-trend">
								<div class="hom-trend-img">
									<img src="data:image/jpeg;base64,'.base64_encode($imageAdmin).'" class="img img-responsive" style="width:100%;height:200px;"></img>
								</div>
								<div class="hom-trend-con">
									<span><i class="fa fa-calendar" aria-hidden="true"></i> '.$dateAdmin.'</span>
									<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$likesAdmin.'</span>
									<span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$unLikesAdmin.'</span>
									<span><i class="fa fa-comment-o" aria-hidden="true"></i> '.$commentsAdmin.'</span>
									<span><i class="fa fa-eye" aria-hidden="true"></i> '.$viewsAdmin.'</span>
									<a href="post.php?id='.$idAdmin.'">
										<h4>'.$titleAdmin.'</h4>
										<p style="max-width: 500px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">'.$descriptionAdmin.'</p>
									</a>
								</div>
								<div class="hom-trend-con">
									<a href="deletePost.php?id='.$idAdmin.'"><span class="col-sm-4"><i class="fa fa-trash-o" aria-hidden="true"></i>Del.</span></a>
									<a href="post.php?id='.$idAdmin.'"><span class="col-sm-4"><i class="fa fa-eye" aria-hidden="true"></i>View</span></a>
									<a href="editPost.php?id='.$idAdmin.'"><span class="col-sm-4"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</span></a>
								</div>
							</div>
						</div>
					</div>';
				}
				echo '</div>';
			} else {
				echo '<h2 class="text-center">No Blog Posts To Show</h2>';	
			}
			?>
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
<?php
} else if(isset($_SESSION['position']) && $_SESSION['position']==2){
?>
<!--approver home page-->
<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenuApprover.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp spe-bot-red-3">
        	<div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> My Blog <span> Posts Stats</span></h2>
                <div class="hom-trend-con">
                	<?php
						$email2 = $_SESSION['email'];
						$toBeApproved = "SELECT COUNT(*) as pending FROM blog_post WHERE STATUS='1'";
						$rToBeApproved = mysqli_query($con, $toBeApproved);
						$approved = "SELECT COUNT(*) AS published FROM blog_post WHERE STATUS='2' AND approved_by='".$email2."'";
						$rApproved = mysqli_query($con, $approved);
						$rejectedBy = "SELECT COUNT(*) as rejected FROM blog_post WHERE STATUS='3' AND approved_by='".$email2."'";
						$rRejectedBy = mysqli_query($con, $rejectedBy);
						if(mysqli_num_rows($rToBeApproved)!=0 && mysqli_num_rows($rApproved)!=0 && mysqli_num_rows($rRejectedBy)!=0){
							while($rowToBeApproved = mysqli_fetch_array($rToBeApproved)){
								$cToBeApproved = $rowToBeApproved['pending'];
								if(empty($cToBeApproved)){
									$cToBeApproved = 0;
								}
							}
							while($rowApproved = mysqli_fetch_array($rApproved)){
								$cApproved = $rowApproved['published'];
								if(empty($cApproved)){
									$cApproved = 0;
								}
							}
							while($rowRejectedBy = mysqli_fetch_array($rRejectedBy)){
								$cRejectedBy = $rowRejectedBy['rejected'];
								if(empty($cRejectedBy)){
									$cRejectedBy = 0;
								}
							}
						}
					?>
                    <span class="col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i> Approved : <?php echo $cApproved ?></span>
                    <span class="col-md-3"><i class="fa fa-ban" aria-hidden="true"></i> Rejected : <?php echo $cRejectedBy ?></span>
                    <span class="col-md-3"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending : <?php echo $cToBeApproved ?></span>
                </div>
            </div>
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Recent Blog<span> Posts Approved</span></h2>
            </div>
            <?php
			$getPost = "SELECT * FROM blog_post WHERE STATUS='2' AND approved_by='".$email2."' ORDER BY created_date_time";
			$rGetPost = mysqli_query($con, $getPost);
			if(mysqli_num_rows($rGetPost)!=0){
				echo '<div class="row">';
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
									<a href="post.php?id='.$id.'">
										<h4>'.$title.'</h4>											
										<p style="max-width: 500px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">'.$description.'</p>
									</a>
								</div>
								<div class="hom-trend-con">
									<a href="post.php?id='.$id.'"><span class="col-sm-4"><i class="fa fa-eye" aria-hidden="true"></i>View</span></a>
								</div>
							</div>
						</div>
					</div>';
				}
				echo '</div>';
			} else {
				echo '<h2 class="text-center" style="padding:20px;">No Blog Posts To Show</h2>';	
			}
			?>
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
<?php
} else {
	//404 page	
	header('Location:../404.php');
}
?>
</html>