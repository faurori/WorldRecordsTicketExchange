<?php include ("../admin/connect.php"); ?>
<?php session_start(); ?>
<?php
ob_start();
if (!isset($_SESSION['admin_login'])) {
	header("location: login.php");
	$user = "";
}
else {
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['username'];
}
$search_value = "";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ticket Exchange Employee Interface</title>
		<link rel="stylesheet" type="text/css" href="../admin/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body style="min-width: 980px;">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="signin.php">SIGN IN</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">WELCOME,  '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="../index.php">
					<img style=" height: 75px; width: 130px;" src="../image/MusicNote.jpg">
				</a>
			</div>
			<h1 style="text-align: center;"><strong><span style="color: white;">World Records Ticket Exchange</span></strong></h1>
			</div>
		</div>
		<div class="categolis">
			<table>
				<tr>
					<th>
						<a href="index.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px; ">Home</a>
					</th>
					
					<th>
					    <a href="newadmin.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px; border-radius: 12px;">New Admin</a>
					</th>
					
					<th>
					    <a href="allproducts.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px; border-radius: 12px;">All Products</a>
					</th>
					
					<th>
					    <a href="orders.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px; border-radius: 12px;">Orders</a>
					</th>
					
				</tr>
			</table>
		</div>
		<div class="home-welcome">
			<div class="home-welcome-text">
				<h1><span style="color: white;">Welcome To The World Records Ticket Exchange Employee Interface</span></h1>
			</div>
		</div>
	</body>
</html>