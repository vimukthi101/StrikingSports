<?php
	if(!isset($_SESSION[''])){
		session_start();	
	}
	include_once('ssi/db.php');
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
                    <a href="src/rugby.php"><img src="./images/c6.png" alt=""> Rugby</a>
                </li>
                <li>
                    <a href="src/football.php"><img src="./images/c6.png" alt=""> Football</a>
                </li>
                <li>
                    <a href="src/others.php"><img src="./images/c6.png" alt=""> Other Sports</a>
                </li>
                <li>
                    <a href="src/events.php"><img src="./images/f6.png" alt=""> Events</a>
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
                    <li><a href="">phone: +94 7795 86170</a>
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
                            <a href="src/register.php">
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
                </ul> 
            </div>
        </div>
    </section>
    <section>
        <div class="home">
            <div class="h_l">
                <img src="./images/cricket-logo.png" alt="">
                <h2>Current Sports Events</h2>
                <p>You can't put a limit on anything. The more you dream, the farther you get - Michael Phelps</p>
                <?php
				$today = date("Y-m-d");
				$getEvents = "SELECT * FROM EVENTS WHERE event_date >= '".$today."' ORDER BY event_date LIMIT 5";
				$resultEvents = mysqli_query($con, $getEvents);
				if(mysqli_num_rows($resultEvents)){
					$counter = 1;
					while($rowEvents = mysqli_fetch_array($resultEvents)){
						$eventTitle = $rowEvents['event_name'];
						$eventId = $rowEvents['event_id'];	
						echo '<ul>
								<li><a href="src/eventDynamic.php?id='.$eventId.'"><span>'.$counter.'</span>'.$eventTitle.'</a></li>
							</ul>';
						$counter++;
					}
					echo '<a href="src/events.php" class="aebtn">View All Events</a>';
				} else {
					echo '<ul>
								<li><a><span>*</span>No Events To Display</a></li>
							</ul>';
				}
				?>
            </div>
            <div class="h_r">
                <div class="slideshow-container">
                    <div class="mySlides fade" style="display: block;">
                        <div class="numbertext">1 / 2</div>
                        <img src="./images/cricket1.jpg" alt="">
                        <div class="text">Striking Sports</div>
                    </div>
                    <div class="mySlides fade" style="display: none;">
                        <div class="numbertext">2 / 2</div>
                        <img src="./images/b6.jpg" alt="">
                        <div class="text">Striking Sports</div>
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
                    <h2>Upcoming <span>sports SPOTLIGHT</span> in this month</h2>
                    <div class="hom-tit">
                        <div class="hom-tit-1"></div>
                        <div class="hom-tit-2"></div>
                        <div class="hom-tit-3"></div>
                    </div>
                    <p>Feel the thrill of seeing a global sporting event in one of the world's most incredible cities.</p>
                </div>
                <div class="event-left col-md-9">
                    <ul>
                    	<?php
						$today2 = date("Y-m-d");
						$getEvents2 = "SELECT * FROM EVENTS WHERE event_date >= '".$today2."' ORDER BY event_date LIMIT 5";
						$resultEvents2 = mysqli_query($con, $getEvents2);
						if(mysqli_num_rows($resultEvents2)){
							while($rowEvents2 = mysqli_fetch_array($resultEvents2)){
								$eventTitle2 = $rowEvents2['event_name'];
								$eventId2 = $rowEvents2['event_id'];	
								$eventDate2 = $rowEvents2['event_date'];
								$eventPlace2 = $rowEvents2['place'];
								$image2 = $rowEvents2['event_image'];
								echo '<li>
									<div class="el-img">
										<img src="data:image/jpeg;base64,'.base64_encode($image2).'" class="img img-responsive"></img>
									</div>
									<div class="el-con">
										<span>'.date("d F Y", strtotime($eventDate2)).'</span>
										<h3>'.$eventTitle2.', '.$eventPlace2.'</h3>
										<a href="src/eventDynamic.php?id='.$eventId2.'">More Information</a>
									</div>
								</li>';
							}
						} else {
							
						}
						?>
                    </ul>
                </div>
                <div class="event-right col-md-3">
                    <ul>
                        <li class="event-right-bg-1">
                            <h4>YOUR AD GOES HERE</h4>
                            <p>You can publish your ad here by contacting Striking Sports.</p>
                            <p>Contact : +94 7795 86170</p>
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
                        <div class="hom-tick">
                            <div class="hom-tick-2">
                            	<h4>YOUR AD GOES HERE</h4>
                                <h4>You can publish your ad here by contacting Striking Sports.</h4>
                                <h4>Contact : +94 7795 86170</h4>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>		
    </section>
    <section>
        <div class="lp spe-bot-red-3">
            <div class="ela">
                <div class="spe-title-1">
                    <h2>Pick a <span>Sport and join</span> the fun today</h2>
                    <div class="hom-tit">
                        <div class="hom-tit-1"></div>
                        <div class="hom-tit-2"></div>
                        <div class="hom-tit-3"></div>
                    </div>
                </div>
                <div class="hom-top-trends-box row">
                    <div class="col-md-6 hom-top-trends-box-1">
                        <div class="hom-top-trends-box-11">
                            <img class="img-responsive" src="./images/1(1).jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 hom-top-trends-box-2">
                        <div class="hom-top-trends-box-21 p-cri">
                            <h4>YOUR AD GOES HERE</h4>
                            <p>You can publish your AD here by contacting Striking Sports.</p>
                            <a>Contact : +94 7795 86170</a>
                        </div>
                    </div>
                    <div class="col-md-6 hom-top-trends-box-2">
                        <div class="hom-top-trends-box-21 hom-top-trends-box-22 p-cri1">
                            <h4>YOUR AD GOES HERE</h4>
                            <p>You can publish your AD here by contacting Striking Sports.</p>
                            <a>Contact : +94 7795 86170</a>
                        </div>
                    </div>
                </div>
                <div class="hom-top-trends row">
                <?php
				$getPost = "SELECT * FROM blog_post ORDER BY created_date_time limit 8";
				$rGetPost = mysqli_query($con, $getPost);
				if(mysqli_num_rows($rGetPost)!=0){
					while($rowGetPost = mysqli_fetch_array($rGetPost)){
						$postDate = $rowGetPost['created_date_time'];
						$postId = $rowGetPost['post_id'];
						$postTitle = $rowGetPost['title'];
						$postDescription = $rowGetPost['description'];
						$postImage = $rowGetPost['image'];
						echo '
							<div class="col-md-3">
								<div class="hom-trend">
									<div class="hom-trend-img">
										<img src="data:image/jpeg;base64,'.base64_encode($postImage).'" class="img img-responsive img-thumbnail" style="width:300px;height:200px;"></img>
									</div>
									<div class="hom-trend-con">
										<span><i class="fa fa-futbol-o" aria-hidden="true"></i>'.date("d F Y", strtotime($postDate)).'</span>
										<a href="src/view.php?id='.$postId.'">
											<h4>'.$postTitle.'</h4>
										</a>
										<p>'.$postDescription.'</p>
									</div>
								</div>
							</div>
						';
					}
				}
				?>
                </div>
            </div>
        </div>
    </section>
    <!--section class="ev-po">
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
    </section-->
    <!--section>
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
    </section-->
    <?php
	$getPost = "SELECT * FROM blog_post WHERE created_date_time IN (SELECT MAX(created_date_time) FROM blog_post)";
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
							<a href="./src/view.php?id=<?php echo $id; ?>">
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
						<a href="./src/view.php?id=<?php echo $id; ?>"><li><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</li></a>
						<a href="./src/view.php?id=<?php echo $id; ?>"><li><i class="fa fa-tag" aria-hidden="true"></i> Tag</li></a>
						<a href="./src/view.php?id=<?php echo $id; ?>"><li><i class="fa fa-share-alt" aria-hidden="true"></i> Share This</li></a>
					</ul>
				</div>
			</div>
		</div>
	</section>
    <?php
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
						<a href=""><img src="./images/cricket-logo.png" alt="">
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
								<li><a href=""><i class="fa fa-youtube gp1"></i></a>
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
								<li><a href=""><i class="fa fa-youtube gp1"></i></a>
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
								<a href="http://striking.lk/" target="_blank"><img src="./images/strikingLogo.jpg" class="img img-responsive" style="width:90px;height:110px;" alt="">
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