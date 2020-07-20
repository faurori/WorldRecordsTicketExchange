<?php include ( "../admin/connect.php" ); ?>
<?php 
ob_start();
session_start();
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


<!doctype html>
<html>
	<head>
		<title>=Ticket Exchange- All Products</title>
		<link rel="stylesheet" type="text/css" href="../admin/style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(../image/background.png);">
		<div class="homepageheader">
			<div class="signinButton loginButton">
			    
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">HI, '.$uname_db.'</a>';
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
		<div>
			<table class="rightsidemenu">
				<tr style="font-weight: bold;" colspan="10" bgcolor="#000000">
					<th>Concert Id</th>
					<th>Artist</th>
					<th>Venue</th>
					<th>Venue City</th>
					<th>Venue State</th>
					<th>Date</th>
					<th>Ticket Price</th>
					<th>Seat Capacity</th>
					<th>Artist/Venue Picture</th>
				</tr>
				<tr>
					<?php include ( "../admin/connect.php");
					$query = "SELECT * FROM products ORDER BY CONCERTID";
					$run = mysqli_query($conn,$query);
					while ($row=mysqli_fetch_assoc($run)) {
						$id = $row['CONCERTID'];
						$pName = $row['ARTIST'];
						$venue = $row['CONCERTVENUE'];
						$venuecity = $row['VENUECITY'];
						$venuest = $row['VENUEST'];
						$date = $row['CONCERTDTE'];
						$price = $row['TICKETPRICE'];
						$available = $row['SEATCAPACITY'];
						$picture = $row['PICTURE'];
						$apicture = $row['APICTURE'];
					
					 ?>
					<th><?php echo $id; ?></th>
					<th><?php echo $pName; ?></th>
					<th><?php echo $venue; ?></th>
					<th><?php echo $venuecity; ?></th>
					<th><?php echo $venuest; ?></th>
					<th><?php echo $date; ?></th>
					<th><?php echo $price; ?></th>
					<th><?php echo $available; ?></th>
					<th><?php echo '<div class="home-prodlist-img"> 
					<img src="../image/'.$apicture.'"  class="home-prodlist-imgi" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
					<img src="../image/'.$picture.'"  class="home-prodlist-imgi" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									</a>
								</div>' ?></th>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>