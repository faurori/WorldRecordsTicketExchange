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

?>


<!doctype html>
<html>
	<head>
		<title>Ticket Exchange- Order Managment</title>
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
					<th>Id</th>
					<th>User Id</th>
					<th>Product Id</th>
					<th>Order Ticket Quantity</th>
					<th>Ticket Price</th>
					<th>Order Total</th>
					<th>Order Date</th>
					<th>Delivery Date</th>
					<th>User Name</th>
					<th>User Phone</th>
					<th>User Email</th>
					<th>Edit Order</th>
				</tr>
				<tr>
					<?php include ( "../admin/connect.php");
					$query = "SELECT * FROM orders ORDER BY id";
					$run = mysqli_query($conn,$query);
					while ($row=mysqli_fetch_assoc($run)) {
						$oid = $row['id'];
						$ouid = $row['user_id'];
						$opid = $row['product_id'];
						$oquantity = $row['quantity'];
						$odate = $row['odate'];
						$ddate = $row['ddate'];
						
						//getting user info
						$query1 = "SELECT * FROM user WHERE id='$ouid'";
						$run1 = mysqli_query($conn,$query1);
						$row1=mysqli_fetch_assoc($run1);
						$ofname = $row1['username'];
						$oumobile = $row1['phone'];
						$ouemail = $row1['email'];

						//product info
						$query2 = "SELECT * FROM products WHERE CONCERTID='$opid'";
						$run2 = mysqli_query($conn,$query2);
						$row2=mysqli_fetch_assoc($run2);
						$opcate = $row2['ARTIST'];
						$opitem = $row2['CONCERTVENUE'];
						$picture = $row2['PICTURE'];
						$apicture = $row2['APICTURE'];
						$oprice = $row2['TICKETPRICE'];

					
					 ?>
					<th><?php echo $oid; ?></th>
					<th><?php echo $ouid; ?></th>
					<th><?php echo $opid; ?></th>
					<th><?php echo $oquantity; ?></th>
					<th><?php echo $oprice ?></th>
					<th><?php echo $oquantity*$oprice; ?>
					<th><?php echo $odate; ?></th>
					<th><?php echo $ddate; ?></th>
					<th><?php echo $ofname; ?></th>
					<th><?php echo $oumobile; ?></th>
					<th><?php echo $ouemail; ?></th>
					<th><?php echo '<div class="home-prodlist-img"><a href="editorder.php?eoid='.$oid.'">
									<img src="../image/'.$apicture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									<img src="../image/'.$picture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									</a>
								</div>' ?></th>
				</tr>
				<?php } ?>
			</table>
		</div>
	</body>
</html>