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

<body style="overflow: visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenu.php');
		include_once('../ssi/topMenu.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> match fixings <span> 2017</span></h2>
                <p>Becoming a gym certified personal cricket trainer is your foundation for success. gym is the only personal trainer certification program that integrates</p>
            </div>
            <div class="p-mf">
                <ul>
                    <li>
                        <div class="mf-1">THE ALCHEMISTS</div>
                        <div class="mf-2"><img src="../images/19.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">AUGUST 23RD, 2017</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t2.png" alt="">
                        </div>
                        <div class="mf-5">BLOODY WAVE</div>
                    </li>
                    <li>
                        <div class="mf-1">New Orleanss Saints</div>
                        <div class="mf-2"><img src="../images/t1.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">JUNE 21TH, 2017</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t3.png" alt="">
                        </div>
                        <div class="mf-5">Montreal Alouettess</div>
                    </li>
                    <li>
                        <div class="mf-1">Attlanta Braves</div>
                        <div class="mf-2"><img src="../images/t4.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">SEPTEMBER 02RD, 2016</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t5.png" alt="">
                        </div>
                        <div class="mf-5">Dasllas Cowboys</div>
                    </li>
                    <li>
                        <div class="mf-1">Torontoo Argonauts</div>
                        <div class="mf-2"><img src="../images/t6.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">JANUARY 12TH, 2018</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t7.png" alt="">
                        </div>
                        <div class="mf-5">Oakland Aathletics</div>
                    </li>
                    <li>
                        <div class="mf-1">Buffalo Billss</div>
                        <div class="mf-2"><img src="../images/t8.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">NOVEMBER 05TH, 2017</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t9.png" alt="">
                        </div>
                        <div class="mf-5">Chicago Bullss</div>
                    </li>
                    <li>
                        <div class="mf-1">West Brromwich Albion</div>
                        <div class="mf-2"><img src="../images/t10.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">DECEMBER 07TH, 2017</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t11.png" alt="">
                        </div>
                        <div class="mf-5">Pittsburgh Pirateses</div>
                    </li>
                    <li>
                        <div class="mf-1">Boston Bruinss</div>
                        <div class="mf-2"><img src="../images/t12.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">OCTOBER 18TH, 2017</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t13.png" alt="">
                        </div>
                        <div class="mf-5">Milwaukee Brewerse</div>
                    </li>
                    <li>
                        <div class="mf-1">Detroit Tigerse</div>
                        <div class="mf-2"><img src="../images/t14.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">MAY 04TH, 2018</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t15.png" alt="">
                        </div>
                        <div class="mf-5">New York Giantse</div>
                    </li>
                    <li>
                        <div class="mf-1">Cincinnati Redse</div>
                        <div class="mf-2"><img src="../images/t16.png" alt="">
                        </div>
                        <div class="mf-3"><span class="mf-31">FEBRUARY 4TH, 2020</span><span class="mf-32">Juventus Stadium - Turin </span>
                        </div>
                        <div class="mf-4"><img src="../images/t17.png" alt="">
                        </div>
                        <div class="mf-5">Pittsburgh Steelerse</div>
                    </li>
                </ul>
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