<?php include ( "connect.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}

$u_fname = "";
$u_lname = "";
$u_email = "";
$u_phone = "";
$u_address = "";
$u_pass = "";

if (isset($_POST['signup'])) {
//declere veriable
$u_fname = $_POST['first_name'];
$u_lname = $_POST['last_name'];
$u_username = $_POST['username'];
$u_pass = $_POST['password'];
$u_email = $_POST['email'];
$u_phone = $_POST['phone'];


//triming name
$_POST['first_name'] = trim($_POST['first_name']);
$_POST['last_name'] = trim($_POST['last_name']);
	try {
		if(empty($_POST['first_name'])) {
			throw new Exception('Fullname can not be empty');
			
		}
		if (is_numeric($_POST['first_name'][0])) {
			throw new Exception('Please write your correct name!');

		}
		if(empty($_POST['last_name'])) {
			throw new Exception('Lastname can not be empty');
			
		}
		if (is_numeric($_POST['last_name'][0])) {
			throw new Exception('lastname first character must be a letter!');
			
		}
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
			
		}
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty');
			
		}
		
		if(empty($_POST['email'])) {
			throw new Exception('Email can not be empty');
			
		}
		if(empty($_POST['phone'])) {
			throw new Exception('phone can not be empty');
			
		}
		

		
		// Check if username already exists
		
		$check = 0;
		$u_check = mysqli_query($conn,"SELECT username FROM `user` WHERE username='$u_username'");
		$username_check = mysqli_num_rows($u_check);
		if (strlen($_POST['first_name']) >2 && strlen($_POST['first_name']) <16 ) {
			if ($check == 0 ) {
				if ($username_check == 0) {
					if (strlen($_POST['password']) >1 ) {
						$d = date("Y-m-d"); //Year - Month - Day
						$_POST['first_name'] = ucwords($_POST['first_name']);
						$_POST['last_name'] = ucwords($_POST['last_name']);
						$_POST['last_name'] = ucwords($_POST['last_name']);
						$_POST['username'] = mb_convert_case($u_username, MB_CASE_LOWER, "UTF-8");
							
						$result = mysqli_query($conn,"INSERT INTO user (firstName,lastName,username,password,email,phone) VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[phone]')");
						
					}else {
						throw new Exception('Make a stronger password!');
					}
				}else {
					throw new Exception('Username already taken!');
				}
			}else {
				throw new Exception('Username already taken!');
			}
		}else {
			throw new Exception('Firstname must be 2-15 characters!');
		}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>


<!doctype html>
<html>
	<head>
		<title>TE Registration</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(image/background.png);">
		<div class="homepageheader" style="position: inherit;">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<a style="text-decoration: none; color: #fff;" href="signin.php">REGISTER</a>
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/MusicNote.jpg">
				</a>
			</div>
			
			</div>
		</div>
		<?php 
			if(isset($success_message)) {echo $success_message;}
			else {
				echo '
					<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 26px;">
						<div class="container">
							<div>
								<div>
									<div class="signupform_content">
										<h2><span style="color: white;">Registration Form!</span></h2> 
										<div class="signupform_text"></div>
										<div>
											<form action="" method="POST" class="registration">
												<div class="signup_form">
													<div>
														<td >
															<input name="first_name" id="first_name" placeholder="First Name" required="required" class="first_name signupbox" type="text" size="30" value="'.$u_fname.'" >
														</td>
													</div>
													<div>
														<td >
															<input name="last_name" id="last_name" placeholder="Last Name" required="required" class="last_name signupbox" type="text" size="30" value="'.$u_lname.'" >
														</td>
													</div>
													<div>
															<td>
																<input name="username" placeholder="Enter your Username" required="required" class="username signupbox" type="text" size="30" value="'.$u_username.'">
															</td>
														</div> 
														<div>
															<td>
																<input name="password" id="password-1" required="required"  placeholder="Enter New Password" class="password signupbox " type="password" size="30" value="'.$u_pass.'">
															</td>
														</div>
													<div>
														<td>
															<input name="email" placeholder="Enter Your Email" required="required" class="email signupbox" type="email" size="30" value="'.$u_email.'">
														</td
			>										</div>
													<div>
														<td>
															<input name="phone" placeholder="Enter Your Phone Number" required="required" class="phone signupbox" type="text" size="30" value="'.$u_phone.'">
														</td>
													</div>
												
													
													<div>
														<input name="signup" class="uisignupbutton signupbutton" type="submit" value="Click here to Register!">
													</div>
													<div class="signup_error_msg">';
														
															if (isset($error_message)) {echo $error_message;}
															
														
													echo'</div>
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
