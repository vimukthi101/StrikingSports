<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
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
            <div>
                <div class="inn-title">
                    <h2>AD : Striking Sports  <span> Club</span></h2>
                    <p>No : 18/1, Nagaha Road. Rukmale, Pannipitiya, Sri Lanka</p>
					<span class="con-ph"><i class="fa fa-phone"></i> Phone: +94 7795 86170</span>
					<span class="con-ph"><i class="fa fa-envelope-o"></i> Email: sports@striking.lk</span>
                </div>
                <div class="inn-title">
                    <h2>SITE : Striking Sports  <span> Club</span></h2>
                    <p>No : 231, Ihala Imbulgoda, Imbulgoda, Gampaha, Sri Lanka</p>
					<span class="con-ph"><i class="fa fa-phone"></i> Phone: +94 7129 22461</span>
					<span class="con-ph"><i class="fa fa-envelope-o"></i> Email: sports@striking.lk</span>
                    <div class="share-btn">
                        <ul>
                            <li><a href="https://www.facebook.com/sports.striking/" target="_blank"><i class="fa fa-facebook fb1"></i> Follow On Facebook</a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i> Follow On Twitter</a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i> Follow On Google Plus</a>
                            </li>
                        </ul>
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