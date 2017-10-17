<?php
include_once('../ssi/db.php');
$getPost = "SELECT * FROM blog_post WHERE STATUS='2' ORDER BY created_date_time DESC LIMIT 1";
$rGetPost = mysqli_query($con, $getPost);
if(mysqli_num_rows($rGetPost)!=0){
	while($rowGetPost = mysqli_fetch_array($rGetPost)){
		$date = $rowGetPost['created_date_time'];
		$id = $rowGetPost['post_id'];
		$title = $rowGetPost['title'];
		$description = $rowGetPost['description'];
		$image = $rowGetPost['image'];
		$views = $rowGetPost['views'];
	}
}
?>
<section>
    <div class="blog row">
        <div class="lp">
            <div class="blog-1 col-md-2">
                <span>Latest Posts</span>
                <h4><?php echo date_format(date_create($date),"d"); ?></h4>
                <span><?php echo date_format(date_create($date),"M Y"); ?></span>
            </div>
            <div class="blog-2 col-md-8">
                <ul>
                    <li>
                        <a href="view.php?id=<?php echo $id; ?>">
                            <h4><?php echo $title; ?></h4>
                        </a>
                    </li>
                    <li>
                        <p><?php echo $description; ?></p>
                    </li>
                </ul>
            </div>
            <div class="blog-3 col-md-2">
                <ul>
                    <a href="view.php?id=<?php echo $id; ?>"><li><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</li></a>
                    <a href="view.php?id=<?php echo $id; ?>"><li><i class="fa fa-tag" aria-hidden="true"></i> Tag</li></a>
                    <a href="view.php?id=<?php echo $id; ?>"><li><i class="fa fa-share-alt" aria-hidden="true"></i> Share This</li></a>
                </ul>
            </div>
        </div>
    </div>
</section>