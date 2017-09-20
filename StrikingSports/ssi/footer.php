<?php
$getMem = "SELECT count(*) as members FROM users";
$rGetMem = mysqli_query($con, $getMem);
if(mysqli_num_rows($rGetMem)!=0){
	while($rowGetMem = mysqli_fetch_array($rGetMem)){
		$members = $rowGetMem['members'];
	}
}
$getPosts = "SELECT count(*) as posts FROM blog_post WHERE category_id='1'";
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
                        <h4>HQ : ADDRESS &amp; CONTACT</h4>
                        <p>No : 18/1, Nagaha Road. Rukmale, Pannipitiya, Sri Lanka</p>
                    </div>
                    <div class="foot2-2 foot-soc foot-com">
                        <h4>Follow Us Now</h4>
                        <p>Click your favorite link below</p>
                        <ul>
                            <li><a href=""><i class="fa fa-facebook fb1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-youtube gp1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-envelope-o sh1"></i></a>
                            </li>
                        </ul>
                        <span class="foot-ph">Phone: +94 7795 86170</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="foot2-1 foot-com">
                        <h4>SITE : ADDRESS &amp; CONTACT</h4>
                        <p>No 3241, Grandiz, Desay City</p>
                    </div>
                    <div class="foot2-2 foot-soc foot-com">
                        <h4>Follow Us Now</h4>
                        <p>Click your favorite link below</p>
                        <ul>
                            <li><a href=""><i class="fa fa-facebook fb1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-google-plus gp1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-twitter tw1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-youtube gp1"></i></a>
                            </li>
                            <li><a href=""><i class="fa fa-envelope-o sh1"></i></a>
                            </li>
                        </ul>
                        <span class="foot-ph">Phone: +71 8596 4152</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="foot2-32 foot-pop foot-com">
                        <h4>POPULAR Sports Events</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur cing elit, sed do eiusmod tempor</p>
                        <ul>
                            <li>
                                <img src="../images/2.jpeg" alt="">
                                <div class="foot-pop-eve">
                                    <span>cricket</span>
                                    <h4>Football:THIS SATURDAY STARTS THE INTENSIVE TRAINING FOR THE FINAL</h4>
                                    <p>AUGUST 23RD, 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="../images/5.jpg" alt="">
                                <div class="foot-pop-eve">
                                    <span>Cricket</span>
                                    <h4>Cricket:JAKE DRIBBLER ANNOUNCED THAT HE IS RETIRING NEXT MNONTH</h4>
                                    <p>AUGUST 23RD, 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="../images/6.jpeg" alt="">
                                <div class="foot-pop-eve">
                                    <span>BASKETBALL</span>
                                    <h4>BASKETBALL:THE ALCHEMISTS NEWS COACH IS BRINGIN A NEW SHOOTING GUARD</h4>
                                    <p>AUGUST 23RD, 2017</p>
                                </div>
                            </li>
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