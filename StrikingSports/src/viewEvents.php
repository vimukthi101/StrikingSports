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
?>

<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenuStaff.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> View An <span> Event</span></h2>
            </div>
            <?php
				if(isset($_GET['error'])){
				$error = $_GET['error'];
				if($error == 'su'){
					echo '<div style="padding:3px;">
							<label class="form-control">Event delete successfully.</label>
						</div>';
					}
				}
			?>
            <div class="col-md-4">
                <div class="form-group">
                    <p class="control-label">Title </p>
                    <div>
                        <input class="form-control" onkeyup="showTitle(this.value);" type="text" name="title" id="title" />
                    </div>
                </div>
                <div class="form-group">
                    <p class="control-label">Event Date </p>
                    <div>
                        <input class="form-control" onChange="showDate(this.value);" type="date" name="date" id="date" />
                    </div>
                </div>
                <div class="form-group">
                    <p class="control-label">Status </p>
                    <div>
                    	<select class="form-control" onChange="showStatus(this.value);" name="sta" id="sta">
                        	<option disabled selected>--Select a status--</option>
                        	<option value="0">Draft</option>
                            <option value="1">Pending Approval</option>
                            <option value="2">Published</option>
                            <option value="3">Rejected</option>
                        </select>
                    </div>
                </div>
				<?php
                $getCategory = "SELECT * FROM category";
                $resultCategory = mysqli_query($con, $getCategory);
                if(mysqli_num_rows($resultCategory)!=0){
                    echo '<div class="form-group">
                            <p class="control-label">Categories </p>
                            <div>
                                <select class="form-control" onChange="showCategory(this.value);" name="category" id="category">
									<option disabled selected>--Select a category--</option>';
                    while($rowCategory = mysqli_fetch_array($resultCategory)){
                        $categoryId = $rowCategory['category_id'];
                        $category = $rowCategory['category'];
                        echo '<option value="'.$categoryId.'">'.$category.'</option>';
                    }
                    echo '</select>
                            </div>
                        </div>';
                }
                ?>      
            </div>
                <div class="inn-all-com inn-all-list inn-pad-top-5 tp-1 table-responsive" id="txtHint">
                </div>
        </div>
    </section>
    <?php
		include_once('../ssi/copyRights.php');
	?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script>
		function showTitle(str) {
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "getEvent.php?p=" + str, true);
				xmlhttp.send();
			}
		}
		function showDate(str) {
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "getEvent.php?r=" + str, true);
				xmlhttp.send();
			}
		}
		function showStatus(str) {
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "getEvent.php?s=" + str, true);
				xmlhttp.send();
			}
		}
		function showCategory(str) {
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "getEvent.php?t=" + str, true);
				xmlhttp.send();
			}
		}
	</script>
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