<?php include ( "connect.php" ); ?>
<?php 

if (isset($_REQUEST['poid'])) {
	
	$poid = mysqli_real_escape_string($conn,$_REQUEST['poid']);
}else {
	header('location: index.php');
}
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
	header("location: login.php?ono=".$poid."");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
			$uemail_db = $get_user_email['email'];

			$umob_db = $get_user_email['phone'];
		
}


$getposts = mysqli_query($conn,"SELECT * FROM products WHERE CONCERTID ='$poid'") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
						$row = mysqli_fetch_assoc($getposts);
						$id = $row['CONCERTID'];
						$pName = $row['ARTIST'];
						$price = $row['TICKETPRICE'];
						$description = $row['CONCERTDTE'];
						$picture = $row['PICTURE'];
						$apicture= $row['APICTURE'];
						$available =$row['SEATCAPACITY'];
					}	

//order

if (isset($_POST['order'])) {
//declere veriable
$mbl = $_POST['phone'];
$emil = $_POST['email'];
$quan = $_POST['quantity'];
//triming name
	try {
		if(empty($_POST['phone'])) {
			throw new Exception('phone can not be empty');
			
		}
		if(empty($_POST['email'])) {
			throw new Exception('email can not be empty');
			
		}
		if(empty($_POST['quantity'])) {
			throw new Exception('email can not be empty');
			
		}

		// Check if email already exists
		
						$d = date("Y-m-d"); //Year - Month - Day
						$timestamp = time();
						$date = strtotime("+1 day", $timestamp);
						$date = date('Y-m-d', $date);
					
						if(mysqli_query($conn,"INSERT INTO orders (user_id,product_id,quantity,email,phone,odate,ddate) VALUES ('$user','$poid',$quan,'$_POST[email]','$_POST[phone]','$d','$date')")){

							//success message
						$success_message = '
						<div class="signupform_content"><h2><font face="bookman"><style= color: #ffffff;> Your order was successful!</style></font></h2>
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman">
							
						</font></div></div>';
						}else{
							$error_message = 'Something went wrong!';
						}
						//}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #ffffff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #ffffff;" href="signin.php">REGISTER</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #ffffff;" href="profile.php?user_id='.$user.'">HI, '.$uname_db.' , Click here to view your orders!</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #ffffff;" href="login.php">LOG IN</a>';
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
	<div class="holecontainer" style="color: #ffffff; padding-top: 20px; padding: 0">
		<div class="container signupform_content ">
			<div>

				<h2 style="color: #ffffff; padding-bottom: 20px;">Order Form</h2>
				<div style="float: right; height: 300px; width: 500px; padding: 2px;">
				<?php 
					if(isset($success_message)) {echo $success_message;}
					else {
					echo '
						<div class="">
						<div class="signupform_text"></div>
						<div>
							<form action="" method="POST" class="registration">
								<div class="signup_form" style="    margin-top: 38px;">
									<div>
										<td>
											<input name="phone" placeholder="Your phone number" required="required" class="email signupbox" type="text" size="10" value="'.$umob_db.'">
										</td>
									</div>
									<div>
										<td>
											<input name="email" id="password-1" required="required"  placeholder="Write your full email" class="password signupbox " type="text" size="30" value="'.$uemail_db.'">
										</td>
									</div>
									<div>
										<td>
											<select onchange="changeAmount()" name="quantity" required="required" id="productAmount" style=" font-size: 20px;
		font-style: italic; margin-bottom: 3px; margin-top: 0px;padding: 14px;line-height: 25px;border-radius: 4px;border: 1px solid #A92A2A; color: #A92A2A; margin-left: 0; width: 300px; background-color: transparent;" class="">';
					

				 ?><?php
												for ($i=1; $i<=$available; $i++) { 
													echo '<option  value="'.$i.'">Quantity: '.$i.'</option>';
												}
											?>
											<?php echo '
											</select>
										</td>
									</div>
									<div>
										<input name="order" class="uisignupbutton signupbutton" type="submit" value="Confirm Order">
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

					}

				 ?>
					
				</div>
			</div>
		</div>
		<div style="float: left; font-size: 23px;">
			<div>
			    <!--<div class="home-prodlist-img"><a href="/view_product.php?product_id='.$id.'"> -->
				<?php
					echo '
						<ul style="float: left;">
							<li style="float: left; padding: 0px 25px 25px 25px;">
								<div class="home-prodlist-img">
								<img src="./image/'.$apicture.'" class="home-prodlist-imgi" style="height: 500px; width: 400px; padding: 2px;">
									<img src="./image/'.$picture.'" class="home-prodlist-imgi" style="height: 500px; width: 400px; padding: 2px;">
									</a>
									<div style="text-align: center; padding: 0 0 6px 0; color: #ffffff;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: <span id="amountText"> $'.$price.'</span> <span id="aHiddenText" style="display:none">'.$price.'</span></div>
								</div>
							</li>
						</ul>
					';
				?>
			</div>

		</div>
	</div>
	<script type="text/javascript">
	function changeAmount() {
	    var v = document.getElementById("aHiddenText").innerHTML;
	    document.getElementById("amountText").innerHTML = v;
	    var sBox = document.getElementById("productAmount");
    	var y = sBox.value;
	    var x = document.getElementById("amountText").innerHTML;
	    var y = parseInt(y);
	    var x = parseInt(x);
	    document.getElementById("amountText").innerHTML = x+"x"+y+ " = " + x*y;
	}
	</script>
</body>
</html>
