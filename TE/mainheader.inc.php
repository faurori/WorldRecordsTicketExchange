<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #ffffff;" href="./logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #ffffff;" href="./signin.php">REGISTER</a>';
						}
					 ?>
					x
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #ffffff;" href="./profile.php?user_id='.$user.'">HI, '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #ffffff;" href="./login.php">LOG IN</a>';
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