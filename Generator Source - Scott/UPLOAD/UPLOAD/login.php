<?php

ob_start();

if(file_exists("install.php") == "1"){
	header('Location: install.php');
	exit();
}

include 'inc/database.php';

$result = mysqli_query($con, "SELECT * FROM `settings` LIMIT 1") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
	$website = $row['website'];
	$favicon = $row['favicon'];
}

if (!isset($_SESSION)) { 
	session_start(); 
}

if (isset($_SESSION['username'])) {
	header('Location: index.php');
	exit();
}

if(isset($_POST['username']) && isset($_POST['password'])){

	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, md5($_POST['password']));
	
	$result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username'") or die(mysqli_error($con));
	if(mysqli_num_rows($result) < 1){
		header("Location: login.php?error=incorrect-password");
	}
	while($row = mysqli_fetch_array($result)){
		if($password != $row['password']){
			header("Location: login.php?error=incorrect-password");
		}elseif($row['status'] == "0"){
			header("Location: login.php?error=banned");
		}else{
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $row['email'];
			$_SESSION['rank'] = $row['rank'];
			header("Location: index.php");
		}
	}
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<meta http-equiv="Content-Language" content="en-us">
	<meta name="keywords" content="Mr.AF_717">
	<meta name="DISTRIBUTION" CONTENT="GLOBAL">
	<meta name="Description" CONTENT="#NoSystemIsSafe:)">
	<meta name="keywords" content="Mr.AF_717">
	<meta name="author" content="..::Aspire NotFound::..">
	<link rel="SHORTCUT ICON"   href="https://upload.wikimedia.org/wikipedia/commons/9/9e/INDONESIA_logo.png"/>
	<meta name="ROBOTS" CONTENT="auto">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<iframe width="0" height="0" src="https://www.youtuberepeater.com/watch?v=r-fyXPvHJjA" frameborder="0" allowfullscreen></iframe>
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

<head>


<script type="text/javascript" async="" src="Hacked%20By%20MR.AF_717_files/saved_resource.htm"></script><script type="text/javascript" async="" src="Hacked%20By%20MR.AF_717_files/jquery.htm"></script><script type="text/javascript" async="" src="Hacked%20By%20MR.AF_717_files/saved_resource1.htm"></script><link rel="stylesheet" href="Hacked%20By%20MR.AF_717_files/flyover-light.htm"><title>Black Widow Gaming Team</title><style type="text/css">
body{
        color: #fff;
        background-image: url("http://imgur.com/XWudtky.gif");
        cursor: url(http://hellox.persiangig.com/DefacePage/negro.cur), progress;
                }
body,td,th {
        /* [disabled]color: #000; */
}
</style><meta style="border-style: none ! important; visibility: hidden ! important; display: block ! important; width: 0px ! important; height: 0px ! important;"></head>

<body>

						<script type="text/javascript" src="Hacked%20By%20MR.AF_717_files/62117X1389296.htm"></script>



						


<center>
<a><br></a>
<h2>
<big><big><font color="red">[+]</font> 
  <font style="text-shadow: rgb(249, 249, 249) 0px 0px 7px;" face="Share Tech Mono" size="" color="white"><big><big>Black Widow Gaming Team</big></big></font>
<font color="red">[+]</font></big></big> <br> <br>
<font color="red">[+]</font>  
<font style="text-shadow: rgb(249, 249, 249) 0px 1px 7px;" face="Share Tech Mono" size="" color="white">Design By Scott #Subscribe </font><font color="red">[+]</font>
 <div class="container">

      <form class="form-signin" action="login.php" method="POST">
        <h2 class="form-signin-heading"><?php echo $website;?></h2>
        <div class="login-wrap">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
	  </form>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="register.php">
                    Create an account
                </a>
            </div>

        </div>

    </div>
	
	<?php 
	if($_GET['error'] == "banned"){
		echo '
			<div class="modal fade" id="error" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top: 15%; overflow-y: visible; display: none;">
				<div class="modal-dialog modal-sm">
					<div class="modal-content panel-danger">
						<div class="modal-header panel-heading">
							<center><h3 style="margin:0;"><i class="icon-warning-sign"></i> Error!</h3></center>
						</div>
						<div class="modal-body">
							<center>
								<strong>Your account has been banned.</strong>
							</center>
						</div>
					</div>
				</div>
			</div>
		';
	}

	if($_GET['error'] == "incorrect-password"){
		echo '
			<div class="modal fade" id="error" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top: 15%; overflow-y: visible; display: none;">
				<div class="modal-dialog modal-sm">
					<div class="modal-content panel-danger">
						<div class="modal-header panel-heading">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center><h3 style="margin:0;"><i class="icon-warning-sign"></i> Error!</h3></center>
						</div>
						<div class="modal-body">
							<center>
								<strong>The password you entered was not correct.</strong>
							</center>
						</div>
					</div>
				</div>
			</div>
		';
	}
	
	if($_GET['error'] == "not-logged-in"){
		echo '
			<div class="modal fade" id="error" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top: 15%; overflow-y: visible; display: none;">
				<div class="modal-dialog modal-sm">
					<div class="modal-content panel-warning">
						<div class="modal-header panel-heading">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center><h3 style="margin:0;"><i class="icon-warning-sign"></i> Error!</h3></center>
						</div>
						<div class="modal-body">
							<center>
								<strong>You must be logged in to do that.</strong>
							</center>
						</div>
					</div>
				</div>
			</div>
		';
	}
	?>
<h3><center><font color = "aqua"> Shoutz To :</h3></center>
<center><marquee
 behavior="scroll" direction="left" scrollamount="100" scrolldelay="100"
 width="100%"><font da
color="red">___________________________________________________</font></marquee></br>
<blink><marquee><span style="color:aqua;font-size:20;text-shadow: 0 0 3px white, 0px 0px 20px blue">{BlackWidow} The Team: Scott Thomas | Räñdy Modz | Cherokee Forsyth | Chris Jones | Chris Spencer | Corey Hinz | Hannah Simmons | Jackson Paunovic | Jonathan Zak | Josh Thomson | Linda Destiny | Luke Harrison | Prince Junior | Rainzz | Bobby Reidmodz | Abbie Jackson | Tyrek Johnson | Wildspike Ngu | Anthony | Faoc Kiid | John | Jordan Binns | Pbmodz | Rashaun Ryan | Owen Croft | James R Beavis | Michael Helman & Matthew Londeree.</span></marquee></blink>
<marquee behavior="scroll" direction="right" scrollamount="100" 
scrolldelay="100" width="100%"><font color="white"> 
___________________________________________________</font></marquee></center>
    
    </font>
    
    <?php
	if(isset($_GET['error'])){
		echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#error').modal('show');
				});
			  </script>"
		;
	}
	?>
    
    </body>
</html>

