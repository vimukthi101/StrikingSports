<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
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
			<td>Event Date Time</td>
			<td>Title</td>
			<td>Status</td>
			<td>Place</td>
			<td>Category</td>
			<td>Actions</td>
		</tr>';
while($rowPosts = mysqli_fetch_array($resultGetPost)){
	$id = $rowPosts['event_id'];
	$dateTime = $rowPosts['event_date'];
	$title = $rowPosts['event_name'];
	$description = $rowPosts['information'];
	$status = $rowPosts['status'];
	$tag = $rowPosts['place'];
	$category = $rowPosts['event_category'];
	echo '<tr>
		<td>'.$dateTime.'</td>
		<td>'.$title.'</td>
		<td>'.$status.'</td>
		<td>'.$tag.'</td>
		<td>'.$category.'</td>
		<td><a href="eventDynamic.php?id='.$id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editEvent.php?id='.$id.'"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteEvent.php?id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
	  </tr>';
}
echo '</table>';
} else {
//if no result to show
echo '<h3 class="text-center" style="padding:50px;">No Events To Display.</h3>';
}
?>