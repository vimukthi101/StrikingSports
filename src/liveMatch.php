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
            <div class="tr-pro">
                <div class="inn-title">
                    <h2><i class="fa fa-check" aria-hidden="true"></i> cricket <span>tournament 2017</span></h2>
                    <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates</p>
                    <div class="share-btn">
                        <ul>
                            <li><a href=""><i class="fa fa-facebook fb1"></i> Share On Facebook</a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i> Share On Twitter</a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="inn-all-com">
                    <h4>match Start Date</h4>
                    <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates a complete approach to cricket, wellness and business skills.</p>
                    <div class="inn-ev-date">
                        <div class="inn-ev-date-left">
                            <h4>28 th</h4>
                            <span>augest 2017</span>
                        </div>
                        <div class="inn-ev-date-rig">
                            <ul>
                                <li>20 <span>days</span>
                                </li>
                                <li>08 <span>hours</span>
                                </li>
                                <li>35 <span>min</span>
                                </li>
                                <li>47 <span>sec</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="inn-all-com inn-all-list tp-1">
                    <h4>Other Details</h4>
                    <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates a complete approach to cricket, wellness and business skills.</p>
                    <ul>
                        <li>League Location: Illinois, USA</li>
                        <li>Get trained by qualified personnel</li>
                        <li>Guest lectures by International faculty</li>
                        <li>Internship with the Global cricket leader</li>
                        <li>Placement opportunities with Gold’s Gym</li>
                        <li>Earn handsome salaries on completion of course</li>
                        <li>cricket Assessment room</li>
                    </ul>
                    <div class="inn-tickers">
                        <a href="" class="inn-reg-com inn-reg-book"><i class="fa fa-ticket" aria-hidden="true"></i> Ticket Booking</a>
                        <a href="" class="inn-reg-com inn-reg-link"><i class="fa fa-registered" aria-hidden="true"></i> Register Now</a>
                    </div>
                </div>
                <div class="inn-all-com inn-all-list inn-pad-top-5 tp-1">
                    <h4>Player Rankings</h4>
                    <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates a complete approach to cricket, wellness and business skills.</p>
                    <a href="" class="inn-te-ra-link">Click to view full team ranking</a>
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