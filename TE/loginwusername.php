<?php include ( "connect.php" ); ?>
<?php session_start(); ?>
<?php
ob_start();
if (!isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}
$username = "";
$passs = "";
if (isset($_POST['login'])) {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$user_login = mysqli_real_escape_string($conn,$_POST['username']);
		$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
		$password_login = mysqli_real_escape_string($conn,$_POST['password']);
		$num = 0;
		$result = mysqli_query($conn,"SELECT * FROM user WHERE (username='$user_login') AND password='$password_login' AND activation='yes'");
		$num = mysqli_num_rows($result);
		$get_user_username = mysqli_fetch_assoc($result);
			$get_user_uname_db = $get_user_username['id'];
		if ($num>0) {
			$_SESSION['user_login'] = $get_user_uname_db;
			setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");

			if (isset($_REQUEST['ono'])) {
				$ono = mysqli_real_escape_string($conn,$_REQUEST['ono']);
				header("location: orderform.php?poid=".$ono."");
			}else {
				header('location: index.php');
			}
			exit();
		}
		else {
			$result1 = mysqli_query($conn,"SELECT * FROM user WHERE (username='$user_login') AND password='$password_login' AND activation='no'");
		$num1 = mysqli_num_rows($result1);
		$get_user_username1 = mysqli_fetch_assoc($result1);
			$get_user_uname_db1 = $get_user_username1['id'];
		if ($num1>0) {
			$username = $user_login;
			$activacc ='';
		}else {
			$username = $user_login;
			$passs = $password_login;
			$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">username or Password incorrect.<br>
				</font></div>';
		}

		}
	}

}
$acusernames = "";
$acccode = "";
if(isset($_POST['activate'])){
	if(isset($_POST['actcode'])){
		$user_login = mysqli_real_escape_string($conn,$_POST['acusername']);
		$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
		$user_acccode = mysqli_real_escape_string($conn,$_POST['actcode']);
		$result2 = mysqli_query($conn,"SELECT * FROM user WHERE (username='$user_login') AND confirmCode='$user_acccode'");
		$num3 = mysqli_num_rows($result2);
		echo $user_login;
		if ($num3>0) {
			$get_user_username = mysqli_fetch_assoc($result2);
			$get_user_uname_db = $get_user_username['id'];
			$_SESSION['user_login'] = $get_user_uname_db;
			setcookie('user_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
			mysqli_query($conn,"UPDATE user SET confirmCode='0', activation='yes' WHERE username='$user_login'");
			if (isset($_REQUEST['ono'])) {
				$ono = mysqli_real_escape_string($conn,$_REQUEST['ono']);
				header("location: orderform.php?poid=".$ono."");
			}else {
				header('location: index.php');
			}
			exit();
		}else {
			$username = $user_login;
			$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Code not matched!<br>
				</font></div>';
		}
	}else {
		$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Activation code not matched!<br>
				</font></div>';
	}

}

?>

<!doctype html>
<html>
	<head>
		<title>Welcome to Ticket Exchange</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="home-welcome-text" style="background-image: url(image/background.png);">
		<div class="homepageheader">
			<div class="RegisterButton loginButton">
				<div class="uiloginbutton RegisterButton loginButton" style="margin-right: 40px;">
					<a style="text-decoration: none; color: #fff;" href="Register.php">SIGN IN</a>
				</div>
				<div class="uiloginbutton RegisterButton loginButton" style="">
					<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/jewelrybaylogo.jpg">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="search.php">
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="holecontainer" style="float: right; margin-right: 36%; padding-top: 110px;">
			<div class="container">
				<div>
					<div>
						<div class="signupform_content">
							<?php
							 	if (isset($activacc)){
							 		echo '<h2>Activation Form</h2>';
							 	}else {
							 		echo '<h2>Login Form</h2>';
							 	}
							?>
							<div class="signupform_text"></div>
							<div>
								<form action="" method="POST" class="registration">
									<div class="signup_form">
										<?php
											if (isset($activacc)) {

												echo '
													<div class="signup_error_msg">
														<div class="maincontent_text" style="text-align: center; font-size: 18px;">
													<font face="bookman">Check your username!<br>
													</font></div>
													</div>
													<div>
														<td>
															<input name="acusername" placeholder="Enter Your username" required="required" class="username signupbox" type="username" size="30" value="'.$username.'">
														</td>
													</div>
													<div>
														<td>
															<input name="actcode" placeholder="Activation Code" required="required" class="username signupbox" type="text" size="30" value="'.$acccode.'">
														</td>
													</div>
													<div>
														<input name="activate" class="uisignupbutton signupbutton" type="submit" value="Active Account">
													</div>
													';
											}else{
												echo '
										<div>
											<td>
												<input name="username" placeholder="Enter Your username" required="required" class="username signupbox" type="username" size="30" value="'.$username.'">
											</td>
										</div>
										<div>
											<td>
												<input name="password" id="password-1" required="required"  placeholder="Enter Password" class="password signupbox " type="password" size="30" value="'.$passs.'">
											</td>
										</div>
										<div>
											<input name="login" class="uisignupbutton signupbutton" type="submit" value="Log In">
										</div>
										';
											}
										  ?>
										<div style="float: right;">
											<a class="forgetpass" href="forgetpass.php">
												<span>forget your password???</span>
											</a>
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
	</body>
</html>
