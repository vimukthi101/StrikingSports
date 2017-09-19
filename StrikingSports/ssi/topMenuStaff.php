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
                            <a href="../src/staffProfile.php">
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
            </ul>
        </div>
    </div>
</section>