<?php include ( "connect.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];

			$umob_db = $get_user_email['phone'];
			
}

if (isset($_REQUEST['user_id'])) {
	
	$user2 = mysqli_real_escape_string($conn,$_REQUEST['user_id']);
	if($user != $user2){
		header('location: index.php');
	}
}else {
	header('location: index.php');
}

$search_value = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-image: url(image/background.png);">
	<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fffff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fffff;" href="signin.php">REGISTER</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?user_id='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/MusicNote.jpg">
				</a>
			</div>
			<h2 style="text-align: center;"><strong><span style="color: white;">World Records Ticket Exchange</span></strong></h2>
			</div>
		</div>
	<div class="categolis">
		<table>
			<tr>
				<th><a href="AlisonWonderland.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
					     ">Alison Wonderland</a></th>
					
					<th><a href="ArianaGrande.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
					      ">Ariana Grande</a></th>
					
					<th><a href="Blink182.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Blink 182</a></th>
						
					<th><a href="EdSheeran.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
					      ">Ed Sheeran</a></th>
							
					<th><a href="EltonJohn.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Elton John</a></th>
								
					<th><a href="ImagineDragons.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
			  			  ">Imagine Dragons</a></th>
			  					
					<th><a href="JCole.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
				  		  ">J. Cole</a></th>
				  					
					<th><a href="JustinBieber.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Justin Bieber</a></th>	
						  
					<th><a href="MartinGarrix.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Martin Garrix</a></th>
					
					<th><a href="PanicAtTheDisco!.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Panic! At The Disco</a></th>
								
					<th><a href="Rezz.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;font-size: 15px;
			  			  ">Rezz</a></th>
			  			
					<th><a href="RollingStones.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Rolling Stones</a></th>
						
					<th><a href="Shakira.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Shakira</a></th>
						
					<th><a href="ShawnMendes.php" style="text-decoration: none;color:#ffffff;padding: 4px 12px;font-size: 15px;
						  ">Shawn Mendes</a></th>
						
					<th><a href="Tiesto.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
						  ">Tiesto</a></th>
			</tr>
		</table>
	</div>
	<div style="margin-top: 20px;">
		<div style="width: 900px; margin: 0 auto;">
		
			<ul>
				<li style="float: left;">
					<div class="settingsleftcontent">
						<ul>
							<ul>
							<li><?php echo '<a href="profile.php?user_id='.$user.'" style=" background-color: #A92A2A; border-radius: 4px; color: #ffffff;" >My Orders</a>'; ?></li>
							<li><?php echo '<a href="settings.php?user_id='.$user.'" style=" background-color: #A92A2A; border-radius: 4px; color: #ffffff;" >>Settings</a>'; ?></li>
						</ul>
						</ul>
					</div>
				</li>
				<li style="float: right; background-color: #fff;">
					<div>
						<div>
							<table class="rightsidemenu"><center>
								<tr style="font-weight: bold;" colspan="10" bgcolor="#000000">
								    <!--<tr><center><strong>Ticket Order History</strong></center></tr> -->
									<th>Artist Name</th>
									<th>Venue</th>
									<th>Concert Date</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
									<th>Order Date</th>
									<th>Delivery Date</th>
									<th>Concert Details</th>
									
									
								</tr>
								<tr>
									<?php include ( "connect.php");
									$query = "SELECT * FROM orders WHERE user_id='$user' ORDER BY id";
									$run = mysqli_query($conn,$query);
									while ($row=mysqli_fetch_assoc($run)) {
										$product_id = $row['product_id'];
										$quantity = $row['quantity'];
										$email = $row['email'];
										$mobile = $row['phone'];
										$odate = $row['odate'];
										$ddate = $row['ddate'];
										
										
										//get product info
										$query1 = "SELECT * FROM products WHERE CONCERTID='$product_id'";
										$run1 = mysqli_query($conn,$query1);
										$row1=mysqli_fetch_assoc($run1);
										$pId = $row1['CONCERTID'];
										$pName = $row1['ARTIST'];
										$venue = $row1['CONCERTVENUE'];
										$concertdate= $row1['CONCERTDTE'];
										$price = $row1['TICKETPRICE'];
										$picture = $row1['PICTURE'];
										$apicture = $row1['APICTURE'];
									 ?>
									<th><?php echo $pName; ?></th>
									<th><?php echo $venue; ?></th>
									<th><?php echo $concertdate; ?></th>
									<th><?php echo $price; ?></th>
									<th><?php echo $quantity; ?></th>
									<th><?php $firstnumber=$price; $secondnumber=$quantity; $total=$firstnumber*$secondnumber; echo  $total ?> </th>
									<th><?php echo $odate; ?></th>
									<th><?php echo $ddate; ?></th>
									<th><?php echo '<div class="home-prodlist-img"><a href="view_product.php?product_id='.$pId.'">
													<img src="./image/'.$apicture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
													<img src="./image/'.$picture.'" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
													</a>
												</div>' ?></th>
								</tr>
								<?php } ?>
								</center>
							</table>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	
</body>
</html>