<?php include ( "connect.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
		$get_user_firstname = mysqli_fetch_assoc($result);
			$uname_db = $get_user_firstname['firstName'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to Ticket Exchange!</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head> 
	
	<body  style="min-width: 980px;"> 
		<div class="homepageheader" style="position: relative;">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="signin.php">REGISTER</a>';
						}
					 ?>

				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="profile.php?user_id='.$user.'">HI, '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>

				<?php
					if ($user=="") {
						echo '<div class="uiloginbutton signinButton loginButton" style=""><a style="text-decoration: none; color: #fff;" href="admin/login.php">ADMIN LOGIN</a></div>';
					}
				 ?>

			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="index.php">
					<img style=" height: 75px; width: 130px;" src="image/MusicNote.jpg">
				</a>
			</div>
		    <h1 style="text-align: center;"><strong><span style="color: white;">World Records Ticket Exchange</span></strong></h1>
			</div>
		</div>
		<div class="home-welcome">
			<div class="home-welcome-text" style="background-image: url(image/RedRocks.jpg); height: 380px; ">
				<h1 style="margin: 0px;"><span style="color: white;">Welcome To Ticket Exchange!</h1> 
			</div>
		</div>
		<div class="home-prodlist">
			<div>
			    <body bgcolor="#000000">
				<h3 style="text-align: center;"><span style="color: white;">Featured Artists for Summer 2020 Season</span></h3>
			</div>

            </body>

			<div style="padding: 20px 30px; width: 85%; margin: 0 auto;">
			    
                <!--Option 1: 4767853729- Ariana Grande -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="ArianaGrande.php">
							<img src="./image/ArianaGrande.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Ariana Grande</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 2: 4542475094- Alison Wonderland -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="AlisonWonderland.php">
							<img src="./image/AlisonWonderland.png" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Alison Wonderland</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 3: 9063632865- Blink 182 -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="Blink182.php">
							<img src="./image/Blink182.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Blink 182</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 4: 2406782670- Ed Sheeran -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="EdSheeran.php">
							<img src="./image/EdSheeran.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Ed Sheeran</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 5: 8045739514- Elton John-->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="EltonJohn.php">
							<img src="./image/EltonJohn.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Elton John</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 6: 4767853729- Imagine Dragons -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="ImagineDragons.php">
							<img src="./image/ImagineDragons.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Imagine Dragons</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 7: 2449238758- J. Cole -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="JCole.php">
							<img src="./image/JCole.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">J. Cole</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 8: 4767853729- Justin Bieber -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="JustinBieber.php">
							<img src="./image/JustinBieber.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Justin Bieber</span></div>
						</div>
					</li>
				</ul>
				
				<!-- Option 9: 4521598690- Martin Garrix -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="MartinGarrix.php">
							<img src="./image/MartinGarrix.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Martin Garrix</span></div>
						</div>
					</li>
				</ul>

				<!--Option 10: 7124720629- Panic at the Disco!-->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="PanicAtTheDisco!.php">
							<img src="./image/PATD.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Panic at the Disco!</span></div>
						</div>
					</li>
				</ul>

				<!--Option 11: 8294694701- Rezz -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="Rezz.php">
							<img src="./image/Rezz.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Rezz</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 12: 8260306802- Rolling Stones -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="RollingStones.php">
							<img src="./image/RollingStones.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Rolling Stones</span></div>
						</div>
					</li>
				</ul>

				<!--Option 13: 7613476004- Shakira -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="Shakira.php">
							<img src="./image/Shakira.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Shakira</span></div>
						</div>
					</li>
				</ul>

                <!--Option 14: 2077624950- Shawn Mendes -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="ShawnMendes.php">
							<img src="./image/ShawnMendes.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Shawn Mendes</span></div>
						</div>
					</li>
				</ul>
				
				<!--Option 15: 6423194701- Tiesto -->
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a href="Tiesto.php">
							<img src="./image/Tiesto.jpg" class="home-prodlist-imgi">
							</a>
							<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px; color: white;">Tiesto</span></div>
						</div>
					</li>
				</ul>

		</div>
		</div>
	</body>
</html>
