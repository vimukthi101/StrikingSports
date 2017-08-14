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

<body style="overflow:visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenuStaff.php');
		include_once('../ssi/topMenu.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Add A <span> Blog Post</span></h2>
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
                        } else if($error == 'we'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control" style="height:35px;">Title Can Contain Only Letters.</label>
                                </div>';
                        } else if($error == 'wf'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Description Can Contain Only Letters.</label>
                                </div>';
                        } else if($error == 'wm'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Tags Can Contain Letters Only, Use Comma To Separate Tags</label>
                                </div>';
                        } else if($error == 'pt'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Please Try Again Later.</label>
                                </div>';
                        } else if($error == 'su'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Post Saved And Sent For Approval.</label>
                                </div>';
                        } else if($error == 'sd'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Post Saved As Draft. Send It For Approval For Publishing.</label>
                                </div>';
                        } 
                    }
                    ?>
                </div>
                <form method="post" action="controller/addPostController.php" role="form" class="form-horizontal">
               		<div class="form-group col-md-11">
                    	<h2>Enter The Title </h2>
                    	<input placeholder="Enter A Title For Your Blog Post" required type="text" id="title" name="title" pattern="[a-zA-Z]+" class="form-control" />
                    </div>
                    <div class="form-group col-md-11">
                    	<h2>Enter A Description </h2>
                    	<input placeholder="Enter A Description For Your Blog Post" required type="text" id="description" name="description" pattern="[a-zA-Z]+" class="form-control" />
                    </div>
                	<div class="form-group col-md-11">
                    	<h2>Enter The Content </h2>
                    	<textarea class="form-control" id="blogContent" name="content"></textarea>
                    </div>
                    <div class="form-group col-md-11">
                    	<h2>Enter The Tags </h2>
                    	<input type="text" id="tags" name="tags" class="form-control" pattern="[a-zA-Z,]+" placeholder="Enter A Comma Separated List Of Tags e.g.: cricket,sri lanka,sangakkara"/>
                    </div>
                    <div class="form-group col-md-11">
                    	<h2>Select A Category </h2>
                    	<select class="form-control" id="category" name="category">
                        	<option selected disabled>--Select A Category From Here--</option>
                            <option value="1">Cricket</option>
                            <option value="2">Athletics</option>
                            <option value="3">Swimming</option>
                        </select>
                    </div>
                    <div class="form-group col-md-11 text-center">
                    	<input type="submit" name="submit" id="submit" class="btn" value="Save as Draft">
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Send for Approval">
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
	<script src='../tinymce/tinymce.min.js'></script>
    <script>
		tinymce.init({
		selector: '#blogContent'
		});
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