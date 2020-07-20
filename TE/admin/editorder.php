<?php include ( "../admin/connect.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
	$user = "";
	header("location: login.php?ono=".$eoid."");
}
else {
	if (isset($_REQUEST['eoid'])) {
	
		$eoid = mysqli_real_escape_string($conn,$_REQUEST['eoid']);
		$getposts5 = mysqli_query($conn,"SELECT * FROM orders WHERE id='$eoid'") or die(mysql_error());
			if (mysqli_num_rows($getposts5)){

			}else {
				header('location: index.php');
			}
	}else {
		header('location: index.php');
	}
	$user = $_SESSION['admin_login'];
	$result = mysqli_query($conn,"SELECT * FROM admin WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
		$uname_db = $get_user_email['username'];


	$result1 = mysqli_query($conn,"SELECT * FROM orders WHERE id='$eoid'");
		$get_order_info = mysqli_fetch_assoc($result1);
			$eouid = $get_order_info['user_id'];
			$eopid = $get_order_info['product_id'];
			$eoquantity = $get_order_info['quantity'];
			$eodate = $get_order_info['odate'];
			$eddate = $get_order_info['ddate'];

			$result2 = mysqli_query($conn,"SELECT * FROM user WHERE id='$eouid'");
			$get_order_info2 = mysqli_fetch_assoc($result2);
			$euname = $get_order_info2['firstName'];
			$euemail = $get_order_info2['email'];
			$eumobile = $get_order_info2['phone'];
}

$getposts = mysqli_query($conn,"SELECT * FROM products WHERE CONCERTID ='$eopid'") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
						$row = mysqli_fetch_assoc($getposts);
						$id = $row['CONCERTID'];
						$pName = $row['ARTIST'];
						$price = $row['TIKCETPRICE'];
						$description = $row['CONCERTDTE'];
						$picture = $row['PICTURE'];
						$apicture = $row['APICTURE'];
						$available =$row['SEATCAPACITY'];
					}	

//order

if (isset($_POST['order'])) {
//declere veriable

$dquantity = $_POST['quantity'];

//triming name
	try {
		if(empty($_POST['quantity'])) {
			throw new Exception('Quantity can not be empty');
			
		}
				if(mysqli_query($conn,"UPDATE orders SET quantity='$dquantity' WHERE id='$eoid'")){
					//success message
				header('location: editorder.php?eoid='.$eoid.'');
				$success_message = '
				<div class="signupform_content"><h2><font face="bookman">Change successful!</font></h2>
				</div>';
				}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}
if (isset($_POST['delorder'])) {
//triming name
	if(mysqli_query($conn,"DELETE FROM orders WHERE id='$eoid'")){

	header('location: orders.php');
	}

	}
$search_value = "";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Order</title>
	<link rel="stylesheet" type="text/css" href="../admin/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
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
							echo '<a style="text-decoration: none;color: #fff;" href="login.php">Hi '.$uname_db.'</a>';
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
	<div class="holecontainer" style=" padding-top: 20px; padding: 0 ">
		<div class="container signupform_content ">
			<div>
				<h2 style="padding-bottom: 20px; color: #ffffff;" >Change Order / Delete Order</h2>
				<div style="float: right;">
				<?php 
					echo '
						<div class="">
						<div class="signupform_text"></div>
						<div>
							<form action="" method="POST" class="registration">
								<div class="signup_form" style="margin-top: 38px;"> 
																	
									<div>
										<td>
											<select name="quantity" required="required" style=" font-size: 20px;
										font-style: italic; margin-bottom: 3px; margin-top: 0px; padding: 14px; line-height: 25px; border-radius: 4px;border: 1px solid #A9A9A9;color: #A9A9A9;margin-left: 0;width: 300px;background-color: transparent;" class="">
										<option selected value="'.$eoquantity.'">Quantity: '.$eoquantity.'</option>';
				 								?><?php
												for ($i=1; $i<=$available; $i++) { 
													echo '<option value="'.$i.'">Quantity: '.$i.'</option>';
												}
											?>
											<?php echo '
											</select>
										</td>
									</div>
									<div>
										<input name="order" class="uisignupbutton signupbutton" type="submit" value="Confirm Change">
									</div>
									<div>
										<input name="delorder" class="uisignupbutton signupbutton" type="submit" value="Delete Order">
									</div>
									<div class="signup_error_msg"> '; ?>
										<?php 
											if (isset($error_message)) {echo $error_message;}
											
										?>
									<?php echo '</div>
								</div>
							</form>
							
						</div>
					</div>

					';
					if(isset($success_message)) {echo $success_message;}

				 ?>
					
				</div>
			</div>
		</div>
		<div style="float: left; margin: 0 97px; padding: 50px">
			<div>
				<?php
					echo '
						<ul style="float: left;">
							<li style="float: left;">
								<div class="home-prodlist-img">
									<img src="../image/'.$apicture.'"  class="home-prodlist-imgi" style="height: 500px; width: 400px; padding: 2px;">
									<img src="../image/'.$picture.'"  class="home-prodlist-imgi" style="height: 500px; width: 400px; padding: 2px;">
									
									<div style="text-align: center; padding: 0 0 6px 0; color: #ffffff;">'.$pName.'</div>
								</div>
								
							</li>
						</ul>
					';
				?>
			</div>

		</div>
	</div>
</body>
</html>