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
$q = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["q"])));
$r = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["r"])));
$s = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["s"])));
$t = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["t"])));
$hint = "";
if($p != ""){
	$getPost = "SELECT * FROM blog_post WHERE title LIKE '%".$p."%'";
} else if($q != ""){
	$getPost = "SELECT * FROM blog_post WHERE tag LIKE '%".$q."%'";
} else if($r != ""){
	$getPost = "SELECT * FROM blog_post WHERE created_date_time LIKE '%".$r."%'";
} else if($s != ""){
	$getPost = "SELECT * FROM blog_post WHERE status='".$s."'";
} else if($t != ""){
	$getPost = "SELECT * FROM blog_post WHERE category_id='".$t."'";
} else { 
	// 404 no operation
	header('Location:viewPost.php');
}
$resultGetPost = mysqli_query($con, $getPost);
if(mysqli_num_rows($resultGetPost) != 0){
echo '<table class="table table-striped table-bordered">
		<tr>
			<td>Title</td>
			<td>Description</td>
			<td>Status</td>
			<td>Tags</td>
			<td>Actions</td>
		</tr>';
while($rowPosts = mysqli_fetch_array($resultGetPost)){
	$id = $rowPosts['post_id'];
	$title = $rowPosts['title'];
	$description = $rowPosts['description'];
	$status = $rowPosts['status'];
	if($status == "0"){
		$status = "Draft";
	} else if($status == "1"){
		$status = "Pending Approval";
	} else if($status == "2"){
		$status = "Published";
	} else if($status == "3"){
		$status = "Rejected";
	}
	$tag = $rowPosts['tag'];
	$array = explode(",",$tag);
	$count = sizeof($array);
	for($i=0;$i < $count;$i++){
		$array[$i];
	}
	echo '<tr>
		<td>'.$title.'</td>
		<td>'.$description.'</td>
		<td>'.$status.'</td>
		<td>';
		for($i=0;$i <= $count;$i++){
			echo $array[$i]."\n";
		}
		echo '</td>
		<td><a href="post.php?id='.$id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="editPost.php?id='.$id.'"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="deletePost.php?id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
	  </tr>';
}
echo '</table>';
} else {
//if no result to show
echo '<h3 class="text-center" style="padding:50px;">No Posts To Display.</h3>';
}
} else {
	header('Location:../404.php');	
}
?>