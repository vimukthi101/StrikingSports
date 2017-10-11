<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/style-squads.css">
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
                <div class="events ev-po-2 ev-po-com team-squad">
                    <div class="ev-po-title pag-cri-inn-combg">
                        <h3>Team Squad</h3>
                        <p>One Team One Nation</p>
                    </div>
                    <!--squads start-->
                    <div id="teams" class="teams">
                        <div class="container">
                          <div class="heading col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h4 class="border">Sri Lankan Team</h4>
                          </div>
                          <div class="teams-frame col-lg-12">
                            <ul class="nav nav-tabs vertical-tab col-md-12" role="tablist">
                              <li class="active">
                                <a href="" role="tab" data-toggle="tab">Senior</a>
                              </li>
                            </ul>
                            <div class="tab-pane fade active in" id="senior-team">
                              <div class="team-players">
                                <div class="player-profile">
                                  <img src="../images/team-player6.jpg" alt="" class="thumbnail">
                                  <span class="number">21</span>
                                  <span class="name">Hong Gildong</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player7.jpg" alt="" class="thumbnail">
                                  <span class="number">11</span>
                                  <span class="name">Ican Ivanovich</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player8.jpg" alt="" class="thumbnail">
                                  <span class="number">14</span>
                                  <span class="name">Hong Gildong</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player9.jpg" alt="" class="thumbnail">
                                  <span class="number">18</span>
                                  <span class="name">Hong Gildong</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player10.jpg" alt="" class="thumbnail">
                                  <span class="number">19</span>
                                  <span class="name">Ola Nordmann</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player11.jpg" alt="" class="thumbnail">
                                  <span class="number">6</span>
                                  <span class="name">Mathieu Debuchy</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player8.jpg" alt="" class="thumbnail">
                                  <span class="number">4</span>
                                  <span class="name">Ican Ivanovich</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player11.jpg" alt="" class="thumbnail">
                                  <span class="number">23</span>
                                  <span class="name">Hong Gildong</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player10.jpg" alt="" class="thumbnail">
                                  <span class="number">21</span>
                                  <span class="name">Ican Ivanovich</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player7.jpg" alt="" class="thumbnail">
                                  <span class="number">22</span>
                                  <span class="name">Mathieu Debuchy</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player8.jpg" alt="" class="thumbnail">
                                  <span class="number">33</span>
                                  <span class="name">Ola Nordmann</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player6.jpg" alt="" class="thumbnail">
                                  <span class="number">9</span>
                                  <span class="name">Mathieu Debuchy</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player8.jpg" alt="" class="thumbnail">
                                  <span class="number">19</span>
                                  <span class="name">Ican Ivanovich</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player9.jpg" alt="" class="thumbnail">
                                  <span class="number">17</span>
                                  <span class="name">Mathieu Debuchy</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player7.jpg" alt="" class="thumbnail">
                                  <span class="number">13</span>
                                  <span class="name">Ola Nordmann</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player8.jpg" alt="" class="thumbnail">
                                  <span class="number">45</span>
                                  <span class="name">Hong Gildong</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player10.jpg" alt="" class="thumbnail">
                                  <span class="number">11</span>
                                  <span class="name">Ola Nordmann</span>
                                </div>
                                <div class="player-profile">
                                  <img src="../images/team-player11.jpg" alt="" class="thumbnail">
                                  <span class="number">15</span>
                                  <span class="name">Mathieu Debuchy</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--squads end-->
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