<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
if(isset($_SESSION['position']) && $_SESSION['position']==1){
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
        <div class="lp spe-bot-red-3">
        	<div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> My Blog <span> Posts Stats</span></h2>
                <div class="hom-trend-con">
                    <span class="col-md-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Drafts : 9</span>
                    <span class="col-md-3"><i class="fa fa-check-circle" aria-hidden="true"></i> Published : 23</span>
                    <span class="col-md-3"><i class="fa fa-ban" aria-hidden="true"></i> Rejected : 16</span>
                    <span class="col-md-3"><i class="fa fa-clock-o" aria-hidden="true"></i> Pending Approval : 11</span>
                </div>
            </div>
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Recent Blog Posts <span> By Me</span></h2>
            </div>
            <?php
			for($j=0;$j<3;$j++){
				echo '<div class="p-join-club">';
				for($i=0;$i<4;$i++){
					echo '
						<div class="col-md-3">
							<div class="hom-trend">
								<div class="hom-trend-img">
									<img class="img-responsive" src="../images/1.jpg" alt="">
								</div>
								<div class="hom-trend-con">
									<span><i class="fa fa-calendar" aria-hidden="true"></i> 02/08/2017</span>
									<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>500</span>
									<span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>200</span>
									<span><i class="fa fa-comment-o" aria-hidden="true"></i>300</span>
									<span><i class="fa fa-eye" aria-hidden="true"></i>1000</span>
									<a href="viewPost.php?id=">
										<h4>Kick Off: What you need to know today</h4>
									</a>
									<p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
								</div>
								<div class="hom-trend-con">
									<a href="deletePost.php?id="><span class="col-sm-4"><i class="fa fa-trash-o" aria-hidden="true"></i>Dele.</span></a>
									<a href="viewPost.php?id="><span class="col-sm-4"><i class="fa fa-eye" aria-hidden="true"></i>View</span>
									<a href="editPost.php?id="><span class="col-sm-4"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</span>
								</div>
							</div>
						</div>
					';
				}
				echo '</div>';
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
} else {
	//404 page	
	header('Location:../404.php');
}
?>
</html>