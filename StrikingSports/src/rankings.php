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
        <div class="lp">
            <div>
                <div class="events ev-po-2 ev-po-com">
                    <div class="ev-po-title pag-cri-inn-combg">
                        <h3>Player Ranking 2017</h3>
                        <p>Headlining the calendar is the Dubai World Cup</p>
                    </div>
                    <table class="myTable">
                        <tbody>
                            <tr>
                                <th>Rank</th>
                                <th>TEAMS</th>
                                <th>W</th>
                                <th>L</th>
                                <th>D</th>
                                <th>PTS</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td><img src="../images/19.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td><img src="../images/t2.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>Bloody Wave</h4><span>Atlantic School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td><img src="../images/t3.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>L.A Pirates</h4><span>Bebop Institute</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td><img src="../images/t4.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td><img src="../images/t5.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td><img src="../images/t6.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>07</td>
                                <td><img src="../images/t7.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>08</td>
                                <td><img src="../images/t8.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>09</td>
                                <td><img src="../images/t9.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><img src="../images/t9.png" alt="">
                                    <div class="h-tm-ra">
                                        <h4>The Alchemists</h4><span>Eric Bros School</span>
                                    </div>
                                </td>
                                <td>84</td>
                                <td>36</td>
                                <td>12</td>
                                <td>168</td>
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