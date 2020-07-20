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
		$get_user_email = mysqli_fetch_assoc($result);
			$uname_db = $get_user_email['firstName'];
}
if (isset($_REQUEST['product_id'])) {
	
	$product_id = mysqli_real_escape_string($conn,$_REQUEST['product_id']);
}else {
	header('location: index.php');
}


$getposts = mysqli_query($conn,"SELECT * FROM products WHERE CONCERTID ='$product_id' ORDER BY CONCERTDTE") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
						$row = mysqli_fetch_assoc($getposts);
						$id = $row['CONCERTID'];
						$pName = $row['ARTIST'];
						$price = $row['TICKETPRICE'];
						$description = $row['CONCERTDTE'];
						$picture = $row['PICTURE'];
						$apicture= $row['APICTURE'];
						$venue = $row['CONCERTVENUE'];
						$available =$row['SEATCAPACITY'];
					}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Ticket</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:black;" >
	<?php include ( "mainheader.inc.php" ); ?>
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
	<div style="margin: 0 97px; padding: 50px">

		<?php 
			echo '
				<div style="float: left;">
				<div>
				    <img src="./image/'.$apicture.'" style="height: 500px; width: 400px; padding: 2px; border: 6px solid #A92A2A;">
					<img src="./image/'.$picture.'" style="height: 500px; width:  400px; padding: 2px; border: 2px solid #A92A2A;">
				</div>
				</div>
				
                <div style="float: right; height: 300px; width: 500px; color: #FFFFFF; background-color: #A92A2A; padding: 20px;">
					<div style="">
						<h3 style="font-size: 25px; font-weight: bold; "><center>'.$pName.'</center></h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 20px;"><center>Price: $'.$price.'</center></h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 22px; "><center>Concert Details:</center></h3>
						<p><center> Venue: '.$venue.'</center>
						<br><center>	Date: '.$description.' </center></br>
						</p>

						<div>
							<h3 style="padding: 20px 0 5px 0; font-size: 20px;"><center> Purchase your ticket to this event now. </center></h3>
							<div id="srcheader">
								<form id="" method="post" action="./orderform.php?poid='.$product_id.'">
								        <center><input type="submit" value="Purchase Now" class="srcbutton" ></center>
								</form>
								<div class="srcclear"></div>
							</div>
						</div>

					</div>
				</div>

			';
		?>


			
	
			
		</div>
	</div>
</body>
</html>
