<?php
	if(!isset($_SESSION[''])){
		session_start();	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Striking Sports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./images/strikingLogo.jpg" type="image/x-icon">
    <link href="./css/css.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/mob.css">
</head>

<body style="overflow:auto;">
    <div id="preloader" style="display: none;">
        <div id="status" style="display: none;">&nbsp;</div>
    </div>
    <section>
        <div class="menu" style="overflow:auto;">
            <ul>
                <li>
                    <a href="index.php" class="menu-lef-act"><img src="./images/s1.png" alt=""> Home</a>
                </li>
                <li>
                    <a href="src/cricket.php"><img src="./images/c3.png" alt=""> cricket</a>
                </li>
                <li>
                    <a href="src/matches.php"><img src="./images/c6.png" alt=""> Matchs</a>
                </li>
                <li>
                    <a href="src/events.php"><img src="./images/f6.png" alt=""> Events</a>
                </li>
                <li>
                    <a href="src/rankings.php"><img src="./images/c2.png" alt=""> Ranking</a>
                </li>
                <li>
                    <a href="src/squads.php"><img src="./images/f7.png" alt=""> Squad</a>
                </li>
                <li>
                    <a href="src/liveMatch.php"><img src="./images/c4.png" alt=""> Live match</a>
                </li>			
                <li>
                    <a href="src/join.php"><img src="./images/cy5.png" alt=""> Join Club</a>
                </li>				
                <li>
                    <a href="src/about.php"><img src="./images/about.png" alt=""> About</a>
                </li>
                <li>
                    <a href="src/contact.php"><img src="./images/contact.png" alt=""> Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="mob-menu">
            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
        </div>
        <div class="mob-close">
            <span><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
    </section>
    <section class="i-head-top">
        <div class="i-head row">
            <div class="i-head-left i-head-com col-md-6">
                <ul>
                    <li><a href="">phone: +00 0000 0000</a>
                    </li>
                    <li><a href="">Email: sports@striking.lk</a>
                    </li>
                </ul>
            </div>
            <div class="i-head-right i-head-com col-md-6 col-sm-12 col-xs-12">
                <ul>
                	<?php
					if(isset($_SESSION['email'])){
					?>
                   		<li class="top-scal">
                            <a href="src/Profile.php">
                                <i class="fa fa-ticket" aria-hidden="true"></i> Welcome <?php echo $_SESSION['first_name'];?>
                            </a>
                        </li>
                        <li class="top-scal-1">
                            <a href="src/controller/logout.php">
                                <i class="fa fa-registered" aria-hidden="true"></i> Log Out
                            </a>
                        </li>
                    <?php
					} else {
					?>	
                    	<li class="top-scal">
                            <a href="">
                                <i class="fa fa-ticket" aria-hidden="true"></i> Register
                            </a>
                        </li>
                        <li class="top-scal-1">
                            <a href="src/login.php">
                                <i class="fa fa-registered" aria-hidden="true"></i> Log In
                            </a>
                        </li>
                    <?php
					}
					?>
                    <li>
                        <a href="" class="tr-menu">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i> Browse
                        </a>
                    </li>
                </ul>
                        <div class="cat-menu">
                            <div class="col-md-3 col-sm-6 cm1 mob-hid">
                                <h4>Top Trendings This month</h4>
                                <ul>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> cricket Training For Beginners</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Champions Trophy 2017</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Join Our Club &amp; Donate</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Under 18 cricket Cup, Sri Lanks</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> cricket League - Register Now!</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> cricket - Club Matches</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> View All Events</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 cm1 mob-hid">
                                <h4>Upcoming cricket Matches</h4>
                                <ul>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> NCC vs SSC</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Moors vs Air Force</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Army vs Police</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> Bloomfield vs Moratuwa</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> NCC vs Southern</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> SSC vs Police</a>
                                    </li>
                                    <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i> View All Matches</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>2017 upcoming league matches</h4>
                                <div class="foot-pop top-me-ev">
                                    <ul>
                                        <li>
                                            <a href="">
                                                <img src="./images/2.jpeg" alt="">
                                                <div class="foot-pop-eve top-me-text">
                                                    <span>Cricket: AUGUST 23RD, 2017</span>
                                                    <h4>Football:THIS SATURDAY STARTS THE INTENSIVE TRAINING FOR THE FINAL</h4>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <img src="./images/5.jpg" alt="">
                                                <div class="foot-pop-eve top-me-text">
                                                    <span>Body Building: AUGUST 23RD, 2017</span>
                                                    <h4>Body Building:ROSHAN MAHANAMA ANNOUNCED THAT HE IS RETIRING NEXT MNONTH</h4>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <img src="./images/6.jpeg" alt="">
                                                <div class="foot-pop-eve top-me-text">
                                                    <span>BASKETBALL: AUGUST 23RD, 2017</span>
                                                    <h4>BASKETBALL: SOUHERN SHARKS NEWS COACH IS BRINGIN A NEW SHOOTING GUARD</h4>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cbb2-home-nav-bot mob-hid">
                                <ul>
                                    <li>The Power of Refined Local Search, Now in Your Hands <span>Call us on: +00 0000 0000</span>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="cbb2-ani-btn-join">
                                            <i class="fa fa-user" aria-hidden="true"></i> Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="cbb2-ani-btn">
                                            <i class="fa fa-life-buoy" aria-hidden="true"></i> Join Our Club
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="cbb2-ani-btn">
                                            <i class="fa fa-dollar" aria-hidden="true"></i> Make Donation
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="home">
            <div class="h_l">
                <img src="./images/cricket-logo.png" alt="">
                <h2>Current cricket Events</h2>
                <p>Lorem ipsum dolor sit amet, cons ecte tuer adipiscing elit, sed diam non ummy nibh euismod tinc idunt ut laoreet dolore magna ali quam erat volutpat.</p>
                <ul>
                    <li><a href=""><span>1</span>World Twenty20, 2017</a>
                    </li>
                    <li><a href=""><span>2</span>Cricket Training for Kids</a>
                    </li>
                    <li><a href=""><span>3</span>Join Our Club &amp; Donate</a>
                    </li>
                    <li><a href=""><span>4</span>Cricket Training - Register Now!</a>
                    </li>
                    <li><a href=""><span>5</span>Selection for Under 18</a>
                    </li>
                </ul>
                <a href="" class="aebtn">View All Events</a>
            </div>
            <div class="h_r">
                <div class="slideshow-container">
                    <div class="mySlides fade" style="display: block;">
                        <div class="numbertext">1 / 2</div>
                        <a href=""><img src="./images/cricket1.jpg" alt="">
                        </a>
                        <div class="text">Caption Text 1</div>
                    </div>
                    <div class="mySlides fade" style="display: none;">
                        <div class="numbertext">2 / 2</div>
                        <a href=""><img src="./images/b6.jpg" alt="">
                        </a>
                        <div class="text">Caption Text 2</div>
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="hom-search lp">
            <div class="row">
                <div class="hom-search-inn">
                    <form>
                        <ul>
                            <li>
                                <input type="text" placeholder="Search cricket News and Events Now!">
                            </li>
                            <li>
                                <input type="submit" value="SEARCH">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="se lp">
            <div class="row">
                <div class="spe-title-1">
                    <h2>Upcoming <span>cricket SPOTLIGHT</span> in this month</h2>
                    <div class="hom-tit">
                        <div class="hom-tit-1"></div>
                        <div class="hom-tit-2"></div>
                        <div class="hom-tit-3"></div>
                    </div>
                    <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities. Headlining the calendar is the Dubai World Cup</p>
                </div>
                <div class="event-left col-md-9">
                    <ul>
                        <li>
                            <div class="el-img">
                                <img class="img-responsive" src="./images/1.jpg" alt="">
                            </div>
                            <div class="el-con">
                                <span>Jun 05 - Aug 27</span>
                                <h3>ICC Champions Trophy 2017, Australia</h3>
                                <p>The indoor sports mania is back again offering all sorts of indoor sports in the summer.</p>
                                <a href="">More Information</a>
                            </div>
                        </li>
                        <li>
                            <div class="el-img">
                            	<img class="img-responsive" src="./images/2.jpg" alt="">
                            </div>
                            <div class="el-con">
                                <span>Jun 05 - Aug 27</span>
                                <h3>U19 Cricket World Cup 2018, England</h3>
                                <p>The indoor sports mania is back again offering all sorts of indoor sports in the summer.</p>
                                <a href="">More Information</a>
                            </div>
                        </li>
                        <li>
                            <div class="el-img">
                            	<img class="img-responsive" src="./images/3.jpg" alt="">
                            </div>
                            <div class="el-con">
                                <span>Jun 05 - Aug 27</span>
                                <h3>Join Cricket academies &amp; coaching at Bristol</h3>
                                <p>The indoor sports mania is back again offering all sorts of indoor sports in the summer.</p>
                                <a href="">More Information</a>
                            </div>
                        </li>
                        <li>
                            <div class="el-img">
                            	<img class="img-responsive" src="./images/4.jpg" alt="">
                            </div>
                            <div class="el-con">
                                <span>Jun 05 - Aug 27</span>
                                <h3>Professional Cricket Coaching for players, New Zealand</h3>
                                <p>The indoor sports mania is back again offering all sorts of indoor sports in the summer.</p>
                                <a href="">More Information</a>
                            </div>
                        </li>
                        <li>
                            <div class="el-img">
                            	<img class="img-responsive" src="./images/5(1).jpg" alt="">
                            </div>
                            <div class="el-con">
                                <span>Jun 05 - Aug 27</span>
                                <h3>Grand Opening Cricket Fan Club, India</h3>
                                <p>The indoor sports mania is back again offering all sorts of indoor sports in the summer.</p>
                                <a href="">More Information</a>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="event-right col-md-3">
                    <ul>
                        <li class="event-right-bg-1">
                            <h4>YOUR AD GOES HERE</h4>
                            <p>You can publish your add here by contacting Striking Sports.</p>
                            <a href="">View More</a>
                        </li>
                        <li class="event-right-bg-2 p-cri-hom-2">
                            <h4>YOUR AD GOES HERE</h4>
                            <p>You can publish your add here by contacting Striking Sports.</p>
                            <a href="">View More</a>
                        </li>
                        <li class="event-right-bg-3 p-cri-hom-3 pad-red-bot-0">
                            <h4>YOUR AD GOES HERE</h4>
                            <p>You can publish your add here by contacting Striking Sports.</p>
                            <a href="">View More</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="uc uc-cricket">
            <div class="lp uc1">
                <div class="row">
                    <div class="hom-tick-book">
                        <h2>U19 Cricket World Cup</h2>
                        <div class="hom-tick">
                            <div class="hom-tick-1">
                                <h3>26 July 2017</h3>
                            </div>
                            <div class="hom-tick-2">
                                <span class="hom-tick-21">Preparing for the awesome Cricket experience</span>
                            </div>
                        </div>
                        <a href="" class="hvr-sweep-to-right">More Information</a>
					</div>
				</div>
			</div>
		</div>		
    </section>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="ela">
                <div class="spe-title-1">
                    <h2>Pick a <span>Class and join</span> the fun today</h2>
                    <div class="hom-tit">
                        <div class="hom-tit-1"></div>
                        <div class="hom-tit-2"></div>
                        <div class="hom-tit-3"></div>
                    </div>
                    <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities. Headlining the calendar is the Dubai World Cup</p>
                </div>
                <div class="hom-top-trends-box row">
                    <div class="col-md-6 hom-top-trends-box-1">
                        <div class="hom-top-trends-box-11">
                            <img class="img-responsive" src="./images/1(1).jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 hom-top-trends-box-2">
                        <div class="hom-top-trends-box-21 p-cri">
                            <h4>London: Junior Tournaments</h4>
                            <p>The indoor sports mania is back again offering all sorts of indoor</p>
                            <a href="">View More</a>
                        </div>
                    </div>
                    <div class="col-md-6 hom-top-trends-box-2">
                        <div class="hom-top-trends-box-21 hom-top-trends-box-22 p-cri1">
                            <h4>Improve sports skills</h4>
                            <p>The indoor sports mania is back again offering all sorts of indoor</p>
                            <a href="">View More</a>
                        </div>
                    </div>
                </div>
                <div class="hom-top-trends row">
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/1(2).jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Away Swing Bowlers - Grip (Right arm)</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/11.jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Back foot drive</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/9.jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Back Foot Defence</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/4(1).jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Example of advancing down wicket</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hom-top-trends row">
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/5(2).jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Front View (no Gloves)</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/6.jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Inswing Bowling Grip (Right Arm)</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hom-trend">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/7.jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Leg Spin - Grip</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hom-trend pad-red-bot-0">
                            <div class="hom-trend-img">
                                <img class="img-responsive" src="./images/8.jpg" alt="">
                            </div>
                            <div class="hom-trend-con">
                                <span><i class="fa fa-futbol-o" aria-hidden="true"></i> 2rd augest 2017</span>
                                <a href="">
                                    <h4>Sample drop feed</h4>
                                </a>
                                <p>The Sports Games also celebrated and showcased sport, thanks to the city’s stunning setting</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ev-po">
        <div class="lp">
            <div class="row">
                <div class="col-md-6 eve-res">
                    <div class="events ev-po-1 ev-po-com">
                        <div class="ev-po-title pag-cri-inn-combg1">
                            <h3>Upcoming cricket Events</h3>
                            <p>Headlining the calendar is the Dubai World Cup</p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th class="e_h1">Place</th>
                                    <th>Booking</th>
                                    <th>Register</th>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td><img src="./images/3(1).jpg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Football</h4><span>AUG 23RD, 2017</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Barcelona</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td><img src="./images/2.jpeg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Handball</h4><span>SEPT 02RD, 2016</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">London</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td><img src="./images/4(2).jpg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Rugby Pro</h4><span>JANUARY 12TH, 2018</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Tokyo</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td><img src="./images/5.jpg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Volleyball</h4><span>NOV 05TH, 2017</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Melbourne</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td><img src="./images/6.jpeg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>The Alchemists</h4><span>DEC 07TH, 2017</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Beijing</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td><img src="./images/7(1).jpg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Cricket</h4><span>OCT 18TH, 2017</span>
                                        </div>
                                    </td>
                                    <td class="e_h1"> Berlin</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>07</td>
                                    <td><img src="./images/8(1).jpg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Basketball</h4><span>JUNE 21TH, 2017</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Rio</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td><img src="./images/9.jpeg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Badminton</h4><span>MAY 04TH, 2018</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Manchester</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td><img src="./images/10.jpeg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>marathon</h4><span>MARCH 28TH, 2017</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Toronto</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><img src="./images/2.jpeg" alt="">
                                        <div class="h-tm-ra1">
                                            <h4>Tennis</h4><span>FEB 4TH, 2020</span>
                                        </div>
                                    </td>
                                    <td class="e_h1">Sydney</td>
                                    <td><a href="" class="link-btn">Book Now</a>
                                    </td>
                                    <td><a href="" class="link-btn reg-btn">Register Now</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 eve-res">
                    <div class="events ev-po-2 ev-po-com">
                        <div class="ev-po-title pag-cri-inn-combg">
                            <h3>Player Ranking 2017</h3>
                            <p>Headlining the calendar is the Dubai World Cup</p>
                        </div>
                        <table class="myTable">
                            <tbody>
                                <tr>
                                    <th>Rank</th>
                                    <th>TEAMS</th>
                                    <th>W</th>
                                    <th>L</th>
                                    <th>D</th>
                                    <th>PTS</th>
                                </tr>
                                <tr>
                                    <td>01</td>
                                    <td><img src="./images/19.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td><img src="./images/t2.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>Bloody Wave</h4><span>Atlantic School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td><img src="./images/t3.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>L.A Pirates</h4><span>Bebop Institute</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td><img src="./images/t4.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td><img src="./images/t5.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td><img src="./images/t6.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>07</td>
                                    <td><img src="./images/t7.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td><img src="./images/t8.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td><img src="./images/t9.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><img src="./images/t9.png" alt="">
                                        <div class="h-tm-ra">
                                            <h4>The Alchemists</h4><span>Eric Bros School</span>
                                        </div>
                                    </td>
                                    <td>84</td>
                                    <td>36</td>
                                    <td>12</td>
                                    <td>168</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="lp">
            <div class="spe-title-1">
                <h2>Fundraising for Sports <span>Clubs &amp; Charities</span></h2>
                <div class="hom-tit">
                    <div class="hom-tit-1"></div>
                    <div class="hom-tit-2"></div>
                    <div class="hom-tit-3"></div>
                </div>
                <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities. Headlining the calendar is the Dubai World Cup</p>
            </div>
            <div class="ela">
                <div class="a21">
                    <img src="./images/join.jpeg" alt="">
                </div>
                <div class="a22 home-join pad-red-bot-0 pad-red-bot-pad-0">
                    <h2>Be a good sport and donate to your local club through</h2>
                    <span class="spor-eve-sp">Over 200 members and growing, We love our team. Fundraise or donate to Sport Relief with Us.The worlds leading online fundraising platform, helping charities to make more</span>
                    <p>Cras justo odio, dapisonec elit non mi porta gravida curab blait tempus. Maecenas sed diam eget risus varius blandit sit amet non magna rutrum faucibus dolor auctor.
                        <br>Cras justo odio, dapisonec elit non mi porta gravida curab blait tempus. Maecenas sed diam eget risus varius blandit non magna.</p>
                    <ul>
                        <li><a href="" class="joc">Join Our Club</a>
                        </li>
                        <li><a href="" class="md">Make Donations</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="blog row">
            <div class="lp">
                <div class="blog-1 col-md-2">
                    <span>Latest Posts</span>
                    <h4>30</h4>
                    <span>June 2017</span>
                </div>
                <div class="blog-2 col-md-8">
                    <ul>
                        <li>
                            <a href="">
                                <h4>Sri Lanka VS Zimbabwe</h4>
                            </a>
                        </li>
                        <li>
                            <p>Sri Lanka have named Upul Tharanga as captain of the ODI side for their tri-series in Zimbabwe, which includes West Indies, as regular captain Angelo Mathews and vice-captain Dinesh Chandimal are both absent through injury. Kusal Perera will fill the role of vice-captain, while veteran seamer Nuwan Kulasekara has been recalled to the 15-man squad.</p>
                        </li>
                    </ul>
                </div>
                <div class="blog-3 col-md-2">
                    <ul>
                        <li><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</li>
                        <li><i class="fa fa-tag" aria-hidden="true"></i> Tag</li>
                        <li><i class="fa fa-share-alt" aria-hidden="true"></i> Share This</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="ffoot">
            <div class="lp">
                <div class="row">
                    <div class="col-md-12 foot1">
                        <a href=""><img src="./images/cricket-logo.png" alt="">
                        </a>
                        <ul>
                            <li><span>10,231,124</span> Community Members</li>
                            <li><span>512</span> Sports Events</li>
                            <li><span>10,231,124</span> Community Members</li>
                        </ul>
                    </div>
                </div>
                <div class="row foot2">
                    <div class="col-md-3">
                        <div class="foot2-1 foot-com">
                            <h4>SL: ADDRESS &amp; CONTACT</h4>
                            <p>123, Galle Road, Moratuwa, Sri Lanka.</p>
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
                            <span class="foot-ph">Phone: +00 0000 0000</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="foot2-1 foot-com">
                            <h4>UAE: ADDRESS &amp; CONTACT</h4>
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
                                    <img src="./images/2.jpeg" alt="">
                                    <div class="foot-pop-eve">
                                        <span>cricket</span>
                                        <h4>Football:THIS SATURDAY STARTS THE INTENSIVE TRAINING FOR THE FINAL</h4>
                                        <p>AUGUST 23RD, 2017</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./images/5.jpg" alt="">
                                    <div class="foot-pop-eve">
                                        <span>Cricket</span>
                                        <h4>Cricket:JAKE DRIBBLER ANNOUNCED THAT HE IS RETIRING NEXT MNONTH</h4>
                                        <p>AUGUST 23RD, 2017</p>
                                    </div>
                                </li>
                                <li>
                                    <img src="./images/6.jpeg" alt="">
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
                        <h5>Our Sponsors</h5>
                        <ul>
                            <li>
                                <a href=""><img src="./images/1.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href=""><img src="./images/2.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href=""><img src="./images/3.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href=""><img src="./images/4.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href=""><img src="./images/5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href=""><img src="./images/6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href=""><img src="./images/2.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="fcopy">
            <div class="lp copy-ri row">
                <div class="col-md-4 col-sm-12 col-xs-12 text-center">Copyright © <?php $year = getdate(); echo $year['year']; ?> Striking Sports. All Rights Reserved.</div>
                <div class="col-md-4 col-sm-12 col-xs-12 text-center">Powered By : <a href="http://striking.lk/" target="_blank">Striking Group</a></div>
                <div class="col-md-4 foot-privacy text-center">
                    <ul>
                        <li><a href="">Privacy</a>
                        </li>
                        <li><a href="">Terms of use</a>
                        </li>
                        <li><a href="">Security</a>
                        </li>
                        <li><a href="">Policy</a>
                        </li>
                        <li><a href="">Make Sponsors</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.js"></script>
    <script src="./js/custom.js"></script>
</body>
</html>