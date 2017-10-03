<?php
include_once('../ssi/db.php');
$getMem = "SELECT count(*) as members FROM users";
$rGetMem = mysqli_query($con, $getMem);
if(mysqli_num_rows($rGetMem)!=0){
	while($rowGetMem = mysqli_fetch_array($rGetMem)){
		$members = $rowGetMem['members'];
	}
}
$getPosts = "SELECT count(*) as posts FROM blog_post";
$rGetPosts = mysqli_query($con, $getPosts);
if(mysqli_num_rows($rGetPosts)!=0){
	while($rowGetPosts = mysqli_fetch_array($rGetPosts)){
		$Posts = $rowGetPosts['posts'];
	}
}
?>
<section>
    <div class="ffoot">
        <div class="lp">
            <div class="row">
                <div class="col-md-12 foot1">
                    <a href=""><img src="../images/cricket-logo.png" alt="">
                    </a>
                    <ul>
                        <li><span><?php echo $members; ?></span> Community Members</li>
                        <li><span>512</span> Sports Events</li>
                        <li><span><?php echo $Posts; ?></span> Blog Posts</li>
                    </ul>
                </div>
            </div>
            <div class="row foot2">
                <div class="col-md-3">
                    <div class="foot2-1 foot-com">
                        <h4>AD : ADDRESS &amp; CONTACT</h4>
                        <p>No : 18/1, Nagaha Road. Rukmale, Pannipitiya, Sri Lanka</p>
                    </div>
                    <div class="foot2-2 foot-soc foot-com">
                        <h4>Follow Us Now</h4>
                        <p>Click your favorite link below</p>
                        <ul>
                            <li><a href="https://www.facebook.com/sports.striking/" target="_blank"><i class="fa fa-facebook fb1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i></a>
                            </li>
                            <li><a href="https://www.youtube.com/channel/UCQSGAiIUwgzjSs7jhivJ5dQ" target="_blank"><i class="fa fa-youtube gp1"></i></a>
                            </li>
                            <li><a href="mailto:sports@striking.lk"><i class="fa fa-envelope-o sh1"></i></a>
                            </li>
                        </ul>
                        <span class="foot-ph">Phone: +94 7795 86170</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="foot2-1 foot-com">
                        <h4>SITE : ADDRESS &amp; CONTACT</h4>
                        <p>No : 231, Ihala Imbulgoda, Imbulgoda, Gampaha, Sri Lanka</p>
                    </div>
                    <div class="foot2-2 foot-soc foot-com">
                        <h4>Follow Us Now</h4>
                        <p>Click your favorite link below</p>
                        <ul>
                            <li><a href="https://www.facebook.com/sports.striking/" target="_blank"><i class="fa fa-facebook fb1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i></a>
                            </li>
                            <li><a href="https://www.youtube.com/channel/UCQSGAiIUwgzjSs7jhivJ5dQ" target="_blank"><i class="fa fa-youtube gp1"></i></a>
                            </li>
                            <li><a href="mailto:sports@striking.lk"><i class="fa fa-envelope-o sh1"></i></a>
                            </li>
                        </ul>
                        <span class="foot-ph">Phone: +94 7129 22461</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="foot2-32 foot-pop foot-com">
                        <h4>POPULAR Sports Events</h4>
                        <p>Check the recent sports events</p>
                        <ul>
                        <?php
						   $sEvents = "SELECT * FROM EVENTS WHERE STATUS='2' LIMIT 3";
						   $sResult = mysqli_query($con, $sEvents);
						   if(mysqli_num_rows($sResult)){
							   while($sRow = mysqli_fetch_array($sResult)){
								   $splace = $sRow['place'];
								   $seventDate = $sRow['event_date'];
								   $seventId = $sRow['event_id'];
								   $sname = $sRow['event_name'];
								   $simage = $sRow['event_image'];
								   echo '<a href="eventDynamic.php?id='.$eventId.'"><li>
										<img src="data:image/jpeg;base64,'.base64_encode($simage).'" class="img img-responsive" style="height:90px;width:120px;"></img>
										<div class="foot-pop-eve">
											<span>'.$sname.'</span>
											<h4>'.$splace.'</h4>
											<p>'.$seventDate.'</p>
										</div>
									</li></a>';
							   }
						   }
					   ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 foot4">
                    <h5>Our Partners</h5>
                    <ul>
                        <li>
                            <a href="http://striking.lk/" target="_blank"><img src="../images/strikingLogo.jpg" class="img img-responsive" style="width:90px;height:110px;" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>