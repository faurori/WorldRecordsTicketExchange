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
			$username_db = $get_user_email['username'];
			$upass = $get_user_email['password'];

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

if (isset($_POST['changesettings'])) {
//declere veriable
$username = $_POST['username'];
$opass = $_POST['opass'];
$npass = $_POST['npass'];
$npass1 = $_POST['npass1'];
//triming name
	try {
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty');
			
		}
			if(isset($opass) && isset($npass) && isset($npass1) && ($opass != "" && $npass != "" && $npass1 != "")){
				if( $opass == $upass){
					if($npass == $npass1){
						$npass = $npass;
						mysqli_query($conn,"UPDATE user SET password='$npass' WHERE id='$user'");
						$success_message = '
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman">
							Password changed.
						</font></div>';
					}else {
					$success_message = '
						<div class="signupform_text" style=" color: white; font-size: 18px; text-align: center;">
						<font face="bookman">
							New password not matched!
						</font></div>';
					}
				}else {
				$success_message = '
					<div class="signupform_text" style=" color: white; font-size: 18px; text-align: center;">
					<font face="bookman">
						Passwords do not match.
					</font></div>';
				}
			}else {
				$success_message = '
					<div class="signupform_text" style=" color: white; font-size: 18px; text-align: center;">
					<font face="bookman">
						Passwords do not match.
					</font></div>';
				}

			if($username_db != $username) {
				if(mysqli_query($conn,"UPDATE user SET  username='$username_db' WHERE id='$user'")){
					//success message
					$success_message = '
					<div class="signupform_text" style="font-size: 18px; text-align: center; color: #ffffff;">
					<font face="bookman">
						Username and password have been successfully changed.
					</font></div>';
				}
			}

	}
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
	<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fffff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #ffffff;" href="signin.php">REGISTER</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #ffffff;" href="profile.php?user_id='.$user.'">HI, '.$uname_db.'</a>';
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
		<div style="width: 901px; margin: 0 auto;">
		
			<ul>
				<li style="float: left;">
					<div class="settingsleftcontent">
						<ul>
							<li><?php echo '<a href="profile.php?user_id='.$user.'" >My Orders</a>'; ?></li>
							<li><?php echo '<a href="settings.php?user_id='.$user.'" style=" background-color: #A92A2A; border-radius: 4px; color: #ffffff;">Settings</a>'; ?></li>
						</ul>
					</div>
				</li>
				<li style="float: right;">
					<div class="holecontainer" style=" padding-top: 20px; padding: 0 20%">
						<form action="" method="POST" class="registration">
							<div class="container signupform_content ">
								<div style="text-align: center;font-size: 20px;color: #ffffff;margin: 0 0 5px 0;">
									<td >Change Password:</td>
								</div>
								<div>
									<td><input class="email signupbox" type="password" name="opass" placeholder="Old Password"></td>
								</div>
								<div>
									<td><input class="email signupbox" type="password" name="npass" placeholder="New Password"></td>
								</div>
								<div>
									<td><input class="email signupbox" type="password" name="npass1" placeholder="Repeat Password"></td>
								</div>
								<div style="text-align: center;font-size: 20px;color: #fff; margin: 0 0 5px 0;">
									<td >Enter Username to Confirm:</td>
								</div>
								<div>
									<td><?php echo '<input class="email signupbox" required type="text" name="username" placeholder="Current username" value="'.$username_db.'">'; ?></td>
								</div>
								<div>
									<td><input class="uisignupbutton signupbutton" type="submit" name="changesettings" value="Update Settings"></td>
								</div>
								<div>
									<?php if (isset($success_message)) {echo $success_message;} ?>
								</div>
							</div>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>

	
</body>
</html>