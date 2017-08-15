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
$p = trim(htmlspecialchars(mysqli_real_escape_string($con,$_REQUEST["q"])));
$hint = "";
if($p != ""){
	$getPost = "SELECT * FROM blog_post WHERE title LIKE '%".$p."%'";
	$resultGetPost = mysqli_query($con, $getPost);
	if(mysqli_num_rows($resultGetPost) != 0){
		echo '<table class="table table-striped">
				<th>
					<td>Created Date Time</td>
					<td>Title</td>
					<td>Description</td>
					<td>Post</td>
					<td>Status</td>
					<td>Tags</td>
					<td>Category</td>
					<td>Actions</td>
				</th>';
		while($rowPosts = mysqli_fetch_array($resultGetPost)){
			$dateTime = $rowPosts['created_date_time'];
			$title = $rowPosts['title'];
			$description = $rowPosts['description'];
			$post = $rowPosts['post'];
			$status = $rowPosts['status'];
			$tag = $rowPosts['tag'];
			$category = $rowPosts['category_id'];
			echo '<tr>
				<td>'.$dateTime.'</td>
				<td>'.$title.'</td>
				<td>'.$description.'</td>
				<td>'.$post.'</td>
				<td>'.$status.'</td>
				<td>'.$tag.'</td>
				<td>'.$category.'</td>
				<td>actions</td>
			  </tr>';
		}
		echo '</table>';
	} else {
		//if no result to show
		echo '<h3 class="text-center" style="padding:50px;">No Posts To Display.</h3>';
	}	
} else if($q != ""){
	$getPost = "SELECT * FROM blog_post WHERE tag LIKE '%".$q."%'";
	$resultGetPost = mysqli_query($con, $getPost);
	if(mysqli_num_rows($resultGetPost) != 0){
		echo '<table class="table table-striped">
				<th>
					<td>Created Date Time</td>
					<td>Title</td>
					<td>Description</td>
					<td>Post</td>
					<td>Status</td>
					<td>Tags</td>
					<td>Category</td>
					<td>Actions</td>
				</th>';
		while($rowPosts = mysqli_fetch_array($resultGetPost)){
			$dateTime = $rowPosts['created_date_time'];
			$title = $rowPosts['title'];
			$description = $rowPosts['description'];
			$post = $rowPosts['post'];
			$status = $rowPosts['status'];
			$tag = $rowPosts['tag'];
			$category = $rowPosts['category_id'];
			echo '<tr>
				<td>'.$dateTime.'</td>
				<td>'.$title.'</td>
				<td>'.$description.'</td>
				<td>'.$post.'</td>
				<td>'.$status.'</td>
				<td>'.$tag.'</td>
				<td>'.$category.'</td>
				<td>actions</td>
			  </tr>';
		}
		echo '</table>';
	} else {
		//if no result to show
		echo '<h3 class="text-center" style="padding:50px;">No Posts To Display.</h3>';
	}
} else { 
	// 404 no operation
	header('Location:../viewPost.php');	
}
?>