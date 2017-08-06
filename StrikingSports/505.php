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

<body>
<!--body start-->
	<div class="col-md-12">
        <img src="images/505.png" class="img-responsive center-block" style="padding:50px;margin-top:80px;height:80vh;"/>
        <?php
			session_destroy();
			header("Refresh: 5; URL=index.php");
		?>
    </div>
<!--body end-->
</body>
</html>