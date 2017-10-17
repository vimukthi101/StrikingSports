<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['position']) && ($_SESSION['position']==0 || $_SESSION['position']==1 || $_SESSION['position']==2)){
include_once('../ssi/db.php');
//errors will not be shown
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<?php
$p = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["p"])));
$r = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["r"])));
$s = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["s"])));
$t = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["t"])));
$hint = "";
if($p != ""){
	$getPost = "SELECT * FROM events WHERE event_name LIKE '%".$p."%'";
} else if($r != ""){
	$getPost = "SELECT * FROM events WHERE event_date LIKE '%".$r."%'";
} else if($s != ""){
	$getPost = "SELECT * FROM events WHERE status='".$s."'";
} else if($t != ""){
	$getPost = "SELECT * FROM events WHERE event_category='".$t."'";
} else { 
	// 404 no operation
	header('Location:viewEvents.php');
}
$resultGetPost = mysqli_query($con, $getPost);
if(mysqli_num_rows($resultGetPost) != 0){
echo '<table class="table table-responsive table-striped">
		<tr>
			<td>Title</td>
			<td>Status</td>
			<td>Place</td>
			<td>Actions</td>
		</tr>';
while($rowPosts = mysqli_fetch_array($resultGetPost)){
	$id = $rowPosts['event_id'];
	$title = $rowPosts['event_name'];
	$status = $rowPosts['status'];
	$tag = $rowPosts['place'];
	if($status == "0"){
		$status = "Draft";
	} else if($status == "1"){
		$status = "Pending Approval";
	} else if($status == "2"){
		$status = "Published";
	} else if($status == "3"){
		$status = "Rejected";
	}
	echo '<tr>
		<td>'.$title.'</td>
		<td>'.$status.'</td>
		<td>'.$tag.'</td>
		<td><a href="eventDynamic.php?id='.$id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editEvent.php?id='.$id.'"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteEvent.php?id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
	  </tr>';
}
echo '</table>';
} else {
//if no result to show
echo '<h3 class="text-center" style="padding:50px;">No Events To Display.</h3>';
}
} else {
	header('Location:../404.php');	
}
?>