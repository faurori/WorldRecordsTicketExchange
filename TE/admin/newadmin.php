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

if (isset($_POST['signup'])) {
//declere veriable
$u_username = $_POST['username'];
$u_email = $_POST['email'];
//triming name
$_POST['username'] = trim($_POST['username']);

	try {
		if(empty($_POST['username'])) {
			throw new Exception('Fullname can not be empty');
			
		}
		if (is_numeric($_POST['username'][0])) {
			throw new Exception('Please write your full name!');

		}
		
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
			
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
			
		}
		
		

		
		// Check if email already exists
		
		$check = 0;
		$e_check = mysqli_query($conn,"SELECT email FROM `admin` WHERE email='$u_email'");
		$email_check = mysqli_num_rows($e_check);
		if (strlen($_POST['username']) >2 && strlen($_POST['username']) <16 ) {
			if ($check == 0 ) {
				if ($email_check == 0) {
					if (strlen($_POST['password']) >4 ) {
						$d = date("Y-m-d"); //Year - Month - Day
						$_POST['username'] = ucwords($_POST['username']);
						
						// send email
						$msg = "
						
						Signup email: ".$_POST['email']."
						
						";

						$result = mysqli_query($conn,"INSERT INTO admin (username,email,password) VALUES ('$_POST[username]','$_POST[email]','$_POST[password]')");
						
						//success message
						$success_message = '
						<div class="signupform_content"><h2><span style ="color: white;"><font face="bookman">Admin Creation Successful!</span></font></h2>
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman"><span style ="color: white;">
							Email: '.$u_email.'<br>
							Account Successfully Created. <br>
						</span></font></div></div>';
						//}else {
						//	throw new Exception('Email is not valid!');
						//}
						
						
					}else {
						throw new Exception('Password must be 5 or more then 5 characters!');
					}
				}else {
					throw new Exception('Email already taken!');
				}
			}else {
				throw new Exception('Username already taken!');
			}
		}else {
			throw new Exception('Username must be 2-15 characters!');
		}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}

$search_value = "";
?>


<!doctype html>
<html>
	<head>
		<title>Ticket Exchange - New Admin Creation</title>
		<link rel="stylesheet" type="text/css" href="../admin/style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(../image/background.png);">
		<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">HI, '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="../index.php">
					<img style=" height: 75px; width: 130px;" src="../image/MusicNote.jpg">
				</a>
			</div>
			<!--<h1 style="text-align: center;"><strong><span style="color: white;">World Records Ticket Exchange</span></strong></h1> -->
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
		<?php 
			if(isset($success_message)) {echo $success_message;}
			else {
				echo '
					<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 20px;">
						<div class="container">
							<div>
								<div>
									<div class="signupform_content">
										<h2>
										    <span style="color: white;">
										        New Admin Form!
										    </span>
										</h2>
										<div class="signupform_text"></div>
										<div>
											<form action="" method="POST" class="registration">
												<div class="signup_form">
													<div>
														<td>
														    <span style="color: white;">
															<input name="username" id="username" placeholder="Enter Full Name" required="required" class="username signupbox" type="text" size="30" value="" >
														</span>
														</td>
													</div>
													
													<div>
														<td>
														    <span style="color: white;">
															<input name="email" placeholder="Enter email@te.com" required="required" class="email signupbox" type="email" size="30" value="">
														</span>
														</td
													</div>
													
										
													<div>
														<td>
														    <span style="color: white;">
															<input name="password" id="password-1" required="required"  placeholder="Enter New Password" class="password signupbox " type="password" size="30" value="">
														</span>
														</td>
													</div>
													
													<div>
													    <span style="color: white;">
														<input name="signup" class="uisignupbutton signupbutton" type="submit" value="Add Admin!">
													</span>
													</div>
													<div class="signup_error_msg">
														<?php 
															if (isset($error_message)) {echo $error_message;}
															
														?>
													</div>
												</div>
											</form>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			}

		 ?>
	</body>
</html>
