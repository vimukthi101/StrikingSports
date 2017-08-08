<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
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
        <div class="lp spe-bot-red-3">
            <div>
                <div class="inn-title">
                    <h2>SL: Striking Sports  <span> Club</span></h2>
                    <p>123, Galle Road, Moratuwa, Sri Lanka.</p>
					<span class="con-ph"><i class="fa fa-phone"></i> Phone: +00 0000 0000</span>
					<span class="con-ph"><i class="fa fa-envelope-o"></i> Email: contact@striking.lk</span>
                </div>
                <div class="inn-title">
                    <h2>UAE: Striking Sports  <span> Club</span></h2>
                    <p>28800 Orchard Lake Road, Suite 180 Farmington Hills</p>
					<span class="con-ph"><i class="fa fa-phone"></i> Phone: +00 0000 0000</span>
					<span class="con-ph"><i class="fa fa-envelope-o"></i> Email: contact@striking.lk</span>
                    <div class="share-btn">
                        <ul>
                            <li><a href=""><i class="fa fa-facebook fb1"></i> Follow On Facebook</a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i> Follow On Twitter</a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i> Follow On Google Plus</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="inn-all-com con-map">
                    <h4>Find Our Location</h4>
                    <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates a complete approach to cricket, wellness and business skills.</p>
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