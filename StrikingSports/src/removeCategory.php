<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['position']) && $_SESSION['position']==0){
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('../ssi/header.php');
include_once('../ssi/db.php');
//errors will not be shown
error_reporting(0);
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
        <div class="lp spe-bot-red-3">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Remove An <span> Existing Category</span></h2>
            </div>
            <div class="p-mf">
            	<div class="spe-title-1 spe-title-wid">
					<?php
                    if(isset($_GET['error'])){
                        $error = $_GET['error'];
                        if($error == 'pt'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Please Try Again Later.</label>
                                </div>';
                        } else if($error == 'su'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Category Removed Successfully.</label>
                                </div>';
                        } else if($error == 'de'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Category Has Been Used In A Blog Post, Cannot Delete.</label>
                                </div>';
                        }
                    }
                    ?>
                </div>
                <form method="post" role="form" class="form-horizontal">
               		<div class="form-group col-md-11">
                    	<h2>Select The Category To Remove</h2>
                        <table class="table table-responsive table-striped table-hover">
                        <th>
                            <td>Category</td>
                            <td>Action</td>
                        </th>
                        <?php
                            $get = "SELECT * FROM category";
                            $result = mysqli_query($con, $get);
                            if(mysqli_num_rows($result)!=0){
                                while($row = mysqli_fetch_array($result)){
                                    $categoryId = $row['category_id'];
                                    $category = $row['category'];
                                    echo '<tr><td></td><td>'.$category.'</td><td><a href="controller/removeCategoryController.php?id='.$categoryId.'&category='.$category.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
                                }
                            } else {
                                //no results
                            }
                        ?>
                        </table>
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
<?php
} else {
	header('Location:../404.php');	
}
?>