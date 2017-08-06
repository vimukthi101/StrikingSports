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
        <div class="lp" style="background-image:url(../images/bg-s.jpg);background-repeat:no-repeat;background-size:cover;">
            <div class="booking-bg-1">
                <div class="bg-book">
                    <div class="spe-title-1 spe-title-wid">
                        <h2>Register your <span>Team Now!</span> </h2>
                        <div class="hom-tit">
                            <div class="hom-tit-1"></div>
                            <div class="hom-tit-2"></div>
                            <div class="hom-tit-3"></div>
                        </div>
                        <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities. Headlining the calendar is the Dubai World Cup</p>
                    </div>
                    <div class="book-succ">Thank you for Register with us we will get back to you soon.</div>
                    <div class="book-form">
                        <form id="tr_form" name="tr_form" class="form-horizontal" action="">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Team Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="trname" name="trname" class="form-control" placeholder="Type your team name" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Club Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="trcname" name="trcname" class="form-control" placeholder="Type your clubname" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">City</label>
                                <div class="col-sm-10">
                                    <input type="text" id="trcity" name="trcity" class="form-control" placeholder="Type your city" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Owner Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="troname" name="troname" class="form-control" placeholder="Type your owner name" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Total Members</label>
                                <div class="col-sm-10">
                                    <input type="number" id="trmem" name="trmem" class="form-control" placeholder="Type your total members" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Address</label>
                                <div class="col-sm-10">
                                    <textarea id="traddr" name="traddr" placeholder="Type your address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Desctiptions</label>
                                <div class="col-sm-10">
                                    <textarea id="trdesc" name="trdesc" placeholder="Type your descriptions" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Contact E-mail</label>
                                <div class="col-sm-10">
                                    <input type="email" id="trmail" name="trmail" class="form-control" placeholder="Type your email" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Contact Number</label>
                                <div class="col-sm-10">
                                    <input type="number" id="trphone" name="trphone" class="form-control" placeholder="Type your contact number" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="submit" id="send_button">
                                </div>
                            </div>
                        </form>
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