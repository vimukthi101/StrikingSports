<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
//errors will not be shown
error_reporting(0);
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
                        <h3>Upcoming Sports Events</h3>
                        <p>&nbsp;</p>
                    </div>
                    <table class="myTable">
                    <tbody>
                   <?php
				   $today = date("Y-m-d");
				   $events = "SELECT * FROM EVENTS WHERE STATUS='2' AND event_date >= '".$today."' ORDER BY event_date";
				   $result = mysqli_query($con, $events);
				   if(mysqli_num_rows($result)){
					   echo '<tr>
                                <th>Event</th>
                                <th class="e_h1">Place</th>
                                <th>Information</th>
                            </tr>';
					   while($row = mysqli_fetch_array($result)){
						   $place = $row['place'];
						   $eventDate = $row['event_date'];
						   $eventId = $row['event_id'];
						   $name = $row['event_name'];
						   $image = $row['event_image'];
						   echo '<tr>
                                <td><img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive"></img>
                                    <div class="h-tm-ra1">
                                        <h4>'.$name.'</h4><span>'.$eventDate.'</span>
                                    </div>
                                </td>
                                <td class="e_h1">'.$place.'</td>
                                <td><a href="viewEvent.php?id='.$eventId.'" class="link-btn">More Info</a></td>
                            </tr>';
					   }
				   } else {
						echo '<h2 class="text-center" style="padding-top:40px;padding-bottom:40px;">No Events To Display</h2>';   
				   }
				   ?>   
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