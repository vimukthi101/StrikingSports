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
                            <a href="../src/Profile.php">
                                <i class="fa fa-ticket" aria-hidden="true"></i> Welcome <?php echo $_SESSION['first_name'];?>
                            </a>
                        </li>
                        <li class="top-scal-1">
                            <a href="../src/controller/logout.php">
                                <i class="fa fa-registered" aria-hidden="true"></i> Log Out
                            </a>
                        </li>
                    <?php
					} else {
					?>	
                    	<li class="top-scal">
                            <a href="../src/register.php">
                                <i class="fa fa-ticket" aria-hidden="true"></i> Register
                            </a>
                        </li>
                        <li class="top-scal-1">
                            <a href="../src/login.php">
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
                                            <img src="../images/2.jpeg" alt="">
                                            <div class="foot-pop-eve top-me-text">
                                                <span>Cricket: AUGUST 23RD, 2017</span>
                                                <h4>Football:THIS SATURDAY STARTS THE INTENSIVE TRAINING FOR THE FINAL</h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="../images/5.jpg" alt="">
                                            <div class="foot-pop-eve top-me-text">
                                                <span>Body Building: AUGUST 23RD, 2017</span>
                                                <h4>Body Building:ROSHAN MAHANAMA ANNOUNCED THAT HE IS RETIRING NEXT MNONTH</h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="../images/6.jpeg" alt="">
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