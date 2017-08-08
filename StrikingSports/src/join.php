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
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> join our <span>club 2017</span></h2>
                <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates</p>
            </div>
            <div class="p-join-club">
                <div class="col-md-3 col-sm-6">
                    <div class="p-jc-in">
                        <div class="p-jc-in-1">
                            <h2>$149</h2>
                            <span>//per year</span>
                        </div>
                        <h3>minimal</h3>
                        <div class="p-jc-list">
                            <ul>
                                <li>Texas Rangers</li>
                                <li>Michigan Lackers</li>
                                <li>United Eagles</li>
                                <li>Angry Beavers</li>
                            </ul>
                        </div>
                        <a href="">Join us today!</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-jc-in">
                        <div class="p-jc-in-1">
                            <h2>$249</h2>
                            <span>//per year</span>
                        </div>
                        <h3>OPTIMAL</h3>
                        <div class="p-jc-list">
                            <ul>
                                <li>Texas Rangers</li>
                                <li>Michigan Lackers</li>
                                <li>United Eagles</li>
                                <li>Angry Beavers</li>
                            </ul>
                        </div>
                        <a href="">Join us today!</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-jc-in">
                        <div class="p-jc-in-1">
                            <h2>$349</h2>
                            <span>//per year</span>
                        </div>
                        <h3>PREMIUM</h3>
                        <div class="p-jc-list">
                            <ul>
                                <li>Texas Rangers</li>
                                <li>Michigan Lackers</li>
                                <li>United Eagles</li>
                                <li>Angry Beavers</li>
                            </ul>
                        </div>
                        <a href="">Join us today!</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="p-jc-in">
                        <div class="p-jc-in-1">
                            <h2>$449</h2>
                            <span>//per year</span>
                        </div>
                        <h3>GOLD</h3>
                        <div class="p-jc-list">
                            <ul>
                                <li>Texas Rangers</li>
                                <li>Michigan Lackers</li>
                                <li>United Eagles</li>
                                <li>Angry Beavers</li>
                            </ul>
                        </div>
                        <a href="">Join us today!</a>
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