<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['position']) && $_SESSION['position']==2){
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
		include_once('../ssi/sideMenuApprover.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp">
            <div>
                <div class="events ev-po-1 ev-po-com inn-title">
                    <h2><i class="fa fa-check" aria-hidden="true"></i> Approve / <span> Reject List</span></h2>
					<?php
                        $email = $_SESSION['email'];
                        $getPost = "SELECT * FROM blog_post WHERE STATUS='1' ORDER BY created_date_time";
                        $rGetPost = mysqli_query($con, $getPost);
                        if(mysqli_num_rows($rGetPost)!=0){
                            echo '<table class="myTable table table-responsive">
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Post</th>
                                            <th>Created By</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>';
                            while($rowGetPost = mysqli_fetch_array($rGetPost)){
                                $date = $rowGetPost['created_date_time'];
                                $id = $rowGetPost['post_id'];
                                $title = $rowGetPost['title'];
                                $description = $rowGetPost['description'];
                                $image = $rowGetPost['image'];
                                $createdBy = $rowGetPost['staff_email'];
                                echo '<tr>
                                        <td><img src="data:image/jpeg;base64,'.base64_encode($image).'" class="img img-responsive" style="width:100px;height:100px;"></img></td>
                                        <td style="max-width:400px;">'.$title.'</td>
                                        <td style="max-width:600px;">'.$description.'</td>
                                        <td><a href="post.php?id='.$id.'" class="link-btn">View Post</a></td>
                                        <td>'.$createdBy.'</td>
                                        <td>'.$date.'</td>
                                        <td>
                                        <span><a class="link-btn" href="controller/approvePost.php?id='.$id.'"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></span>
                                        <span><a href="controller/rejectPost.php?id='.$id.'" class="link-btn"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a></span></td>
                                    </tr>';
                            }
                            echo '</tbody>
                                </table>';
                        } else {
                            echo '<div style="padding-top:75px;padding-bottom:75px;" class="text-center"><h2>No Posts To Display.</h2></div>';	
                        }
                    ?>
                </div>
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