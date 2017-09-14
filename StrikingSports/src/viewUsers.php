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

<body style="overflow: visible;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <?php
		include_once('../ssi/sideMenuAdmin.php');
		include_once('../ssi/topMenuStaff.php');
		include_once('../ssi/searchBar.php');
	?>
    <section>
        <div class="lp">
            <div>
                <div class="events ev-po-1 ev-po-com inn-title">
                    <h2><i class="fa fa-check" aria-hidden="true"></i> View <span> Users</span></h2>
					<?php
                        $email = $_SESSION['email'];
                        $getUser = "SELECT * FROM staff";
                        $rGetUser = mysqli_query($con, $getUser);
                        if(mysqli_num_rows($rGetUser)!=0){
                            echo '<table class="myTable table table-responsive">
                                    <tbody>
                                        <tr>
                                            <th>Email</th>
                                            <th>Registered Date</th>
                                            <th>Status</th>
                                            <th>Position</th>
                                            <th>Name</th>
											<th>Address</th>
											<th>Contact No</th>
											<th>Actions</th>
                                        </tr>';
                            while($rowGetUser = mysqli_fetch_array($rGetUser)){
                                $userEmail = $rowGetUser['email'];
                                $date = $rowGetUser['registered_date_time'];
                                $status = $rowGetUser['status'];
                                $contact = $rowGetUser['contact_no'];
                                $address_id = $rowGetUser['address_address_id'];
                                $name_id = $rowGetUser['name_name_id'];
								$getName = "SELECT * FROM name where name_id='".$name_id."'";
								$rGetName = mysqli_query($con, $getName);
								if(mysqli_num_rows($rGetName)!=0){
									 while($rowGetName = mysqli_fetch_array($rGetName)){
										 $fName = $rowGetName['first_name'];
										 $lName = $rowGetName['last_name'];
									 }
								}
								$getAddress = "SELECT * FROM address where address_id='".$address_id."'";
								$rGetAddress = mysqli_query($con, $getAddress);
								if(mysqli_num_rows($rGetAddress)!=0){
									 while($rowGetAddress = mysqli_fetch_array($rGetAddress)){
										 $aNo = $rowGetAddress['address_no'];
										 $lane = $rowGetAddress['address_lane'];
										 $city = $rowGetAddress['address_city'];
									 }
								}
								$position = $rowGetUser['position'];
								if($position == 0){
									$position = "System Admin";
								} else if($position == 1){
									$position = "Editor";
								} else if($position == 2){
									$position = "Approver";
								}
								if($status == 0){
									$statusT = "Disabled";
								} else if($status == 1){
									$statusT = "Active";
								}
                                echo '<tr>
                                        <td>'.$userEmail.'</td>
                                        <td>'.$date.'</td>
                                        <td>'.$statusT.'</td>
                                        <td>'.$position.'</td>
                                        <td>'.$fName.' '.$lName.'</td>
										<td>'.$aNo.','.$lane.','.$city.'</td>
										<td>'.$contact.'</td>
                                        <td>';
										if($status == 0){
											echo '<span><a onclick="return confirm(\'Do You Wish to Activate The User?\');return false;" href="controller/activateUser.php?id='.$userEmail.'" class="link-btn"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a></span>';
										} else if($status == 1){
											echo '<span><a onclick="return confirm(\'Do You Wish to Disable The User?\');return false;" href="controller/deactivateUser.php?id='.$userEmail.'" class="link-btn"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a></span>';
										}
										echo '<span>&nbsp;</span><span><a class="link-btn" href="editStaff.php?id='.$userEmail.'"><i class="fa fa-edit" aria-hidden="true"></i></a></span>
                                        <span><a onclick="return confirm(\'Do You Wish to Delete The User Account?\');return false;" href="controller/deleteUser.php?id='.$userEmail.'" class="link-btn"><i class="fa fa-trash-o" aria-hidden="true"></i></a></span></td>
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