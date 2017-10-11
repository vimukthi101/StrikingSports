<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['position']) && ($_SESSION['position']==0 || $_SESSION['position']==1 || $_SESSION['position']==2)){
if(isset($_GET['id'])){
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
		if(isset($_SESSION['position']) && $_SESSION['position']==0){
			include_once('../ssi/sideMenuAdmin.php');
		} else if(isset($_SESSION['position']) && $_SESSION['position']==1){
			include_once('../ssi/sideMenuStaff.php');
		} else if(isset($_SESSION['position']) && $_SESSION['position']==2){
			include_once('../ssi/sideMenuApprover.php');
		}
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="inn-title">
                <h2><i class="fa fa-check" aria-hidden="true"></i> Edit The <span> Blog Post</span></h2>
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
                        } else if($error == 'ii'){
                            echo '<div style="padding:3px;">
                                    <label class="form-control">Please Upload A Valid Image.</label>
                                </div>';
                        }
                    }
                    ?>
                </div>
                <?php
					if(!empty($_GET['id'])){
						$email = $_SESSION['email'];
						$id = trim(htmlspecialchars(mysqli_real_escape_string($con,$_GET["id"])));
						$getPost = "SELECT * FROM blog_post WHERE post_id='".$id."'";
						$resultPost = mysqli_query($con, $getPost);
						if(mysqli_num_rows($resultPost)!=0){
							while($rowPost = mysqli_fetch_array($resultPost)){
								$postId = $rowPost['post_id'];
								$title = $rowPost['title'];
								$description = $rowPost['description'];
								$content = $rowPost['post'];
								$status = $rowPost['status'];
								$staff = $rowPost['staff_email'];
								$tags = $rowPost['tag'];
								$postCategoryId = $rowPost['category_id'];
								$image = $rowPost['image'];
								if($email == $staff){
									echo '
										<form method="post" action="controller/editPostController.php" role="form" class="form-horizontal" enctype="multipart/form-data">
											<div class="form-group col-md-11">
												<h2>The Title </h2>
												<input required type="text" id="id" name="id" value="'.$postId.'" hidden=""/>
												<input placeholder="Enter A Title For Your Blog Post" required type="text" id="title" name="title" pattern="[A-Za-z\s]+" class="form-control" title="Should be letters only" value="'.$title.'"/>
											</div>
											<div class="form-group col-md-11">
												<h2>Cover Image </h2>
												<img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive" style="width:100%;height:300px;"></img>
												<input type="file" id="image" name="image" class="form-control" title="Should be a valid image" accept="image/*"/>
											</div>
											<div class="form-group col-md-11">
												<h2>The Description </h2>
												<input placeholder="Enter A Description For Your Blog Post" maxlength="400" required type="text" id="description" name="description" pattern="[A-Za-z\s]+" class="form-control" title="Should be letters only" value="'.$description.'"/>
											</div>
											<div class="form-group col-md-11">
												<h2>The Content </h2>
												<textarea class="form-control" id="blogContent" name="content">'.$content.'</textarea>
											</div>
											<div class="form-group col-md-11">
												<h2>The Tags </h2>
												<input type="text" id="tags" name="tags" class="form-control" pattern="[a-zA-Z,]+" placeholder="Enter A Comma Separated List Of Tags e.g.: cricket,sri lanka,sangakkara" title="Should be letters only. Use the comma as the separator" value="'.$tags.'"/>
											</div>';
											$getCategory = "SELECT * FROM category";
											$resultCategory = mysqli_query($con, $getCategory);
											if(mysqli_num_rows($resultCategory)!=0){
												echo '<div class="form-group col-md-11">
														<h2>Select A Category </h2>
															<select class="form-control" onChange="showCategory(this.value);" id="category" name="category">
																<option disabled>--Select a category--</option>';
												while($rowCategory = mysqli_fetch_array($resultCategory)){
													$categoryId = $rowCategory['category_id'];
													$category = $rowCategory['category'];
													if($categoryId == $postCategoryId){
														echo '<option selected value="'.$categoryId.'">'.$category.'</option>';
													} else {
														echo '<option value="'.$categoryId.'">'.$category.'</option>';	
													}
												}
												echo '</select>
													</div>';
											}
											echo '<div class="form-group col-md-11 text-center">
												<input type="submit" name="submit" id="submit" class="btn" value="Save as Draft">
												<input type="submit" name="submit" id="submit" class="btn btn-success" value="Send for Approval">
											</div>
										</form>
									';
								} else {
									echo '<h2 style="height:300px;" class="text-center">You Don\'t Have Permission To Edit This Post</h2>';
								}
							}
						} else {
							echo '<h2 style="height:300px;" class="text-center">No Post To Display</h2>';
						}
					} else {
						echo '<h2 style="height:300px;" class="text-center">No Post To Display</h2>';
					}
				?>
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
<?php
} else {
	header('Location:../index.php');	
}
} else {
	header('Location:../404.php');	
}
?>