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
		include_once('../ssi/sideMenuAdmin.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp spe-bot-red-3" style="height:400px;">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Add A <span> New Category</span></h2>
            </div>
            <div class="p-mf">
            	<div class="spe-title-1 spe-title-wid">
					<?php
                    if(isset($_GET['error'])){
                        $error = $_GET['error'];
                        if($error == 'ns'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Please Submit The Form.</label>
                                </div>';
                        } else if($error == 'ef'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control" style="height:35px;">Required Fields Cannot Be Empty.</label>
                                </div>';
                        } else if($error == 'wc'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control" style="height:35px;">Category Can Contain Only Letters.</label>
                                </div>';
                        } else if($error == 'ec'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Category Already Exsisting.</label>
                                </div>';
                        } else if($error == 'pt'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Please Try Again Later.</label>
                                </div>';
                        } else if($error == 'su'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Category Added Successfully.</label>
                                </div>';
                        }
                    }
                    ?>
                </div>
                <form method="post" action="controller/addCategoryController.php" role="form" class="form-horizontal" enctype="multipart/form-data">
               		<div class="form-group col-md-11">
                    	<h2>Enter The Category </h2>
                    	<input placeholder="Add A New Category" required type="text" id="category" name="category" pattern="[A-Za-z\s]+" class="form-control" title="Should be letters only" />
                    </div>
                    <div class="form-group col-md-11 text-center">
                    	<input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                        <input type="reset" name="clear" id="clear" class="btn btn-warning" value="Clear">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
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