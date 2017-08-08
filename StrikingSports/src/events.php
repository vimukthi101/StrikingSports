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
            <div>
                <div class="events ev-po-1 ev-po-com">
                    <div class="ev-po-title">
                        <h3>Upcoming Cricket Events</h3>
                        <p>Headlining the calendar is the Dubai World Cup</p>
                    </div>
                    <table class="myTable">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Event</th>
                                <th class="e_h1">Place</th>
                                <th>Information</th>
                                <th>Register</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td><img src="../images/3.jpg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Football</h4><span>AUGUST 23RD, 2017</span>
                                    </div>
                                </td>
                                <td class="e_h1">Australia</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td><img src="../images/2.jpeg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Handball</h4><span>SEPTEMBER 02RD, 2016</span>
                                    </div>
                                </td>
                                <td class="e_h1">France</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td><img src="../images/4.jpg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Rugby Pro</h4><span>JANUARY 12TH, 2018</span>
                                    </div>
                                </td>
                                <td class="e_h1">USA</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td><img src="../images/5.jpg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Volleyball</h4><span>NOVEMBER 05TH, 2017</span>
                                    </div>
                                </td>
                                <td class="e_h1">Texas</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td><img src="../images/6.jpeg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>The Alchemists</h4><span>DECEMBER 07TH, 2017</span>
                                    </div>
                                </td>
                                <td class="e_h1">Australia</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td><img src="../images/7.jpg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Cricket</h4><span>OCTOBER 18TH, 2017</span>
                                    </div>
                                </td>
                                <td class="e_h1"> Austria</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>07</td>
                                <td><img src="../images/8.jpg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Basketball</h4><span>JUNE 21TH, 2017</span>
                                    </div>
                                </td>
                                <td class="e_h1">Hong Kong</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>08</td>
                                <td><img src="../images/9.jpeg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Badminton</h4><span>MAY 04TH, 2018</span>
                                    </div>
                                </td>
                                <td class="e_h1">USA</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>09</td>
                                <td><img src="../images/10.jpeg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>marathon</h4><span>MARCH 28TH, 2017</span>
                                    </div>
                                </td>
                                <td class="e_h1">England</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><img src="../images/2.jpeg" alt="">
                                    <div class="h-tm-ra1">
                                        <h4>Tennis</h4><span>FEBRUARY 4TH, 2020</span>
                                    </div>
                                </td>
                                <td class="e_h1">Minnesota</td>
                                <td><a href="" class="link-btn">More Info</a>
                                </td>
                                <td><a href="" class="link-btn reg-btn">Register Now</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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