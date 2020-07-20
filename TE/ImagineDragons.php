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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Imagine Dragons</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:black;">
	<?php include ( "mainheader.inc.php" ); ?>
	<div class="categolis">
		<table>
			<tr>
				    <th><a href="ImagineDragons.php" style="text-decoration: none;color: #ffffff;padding: 4px 12px;font-size: 15px;
			  			  ">Imagine Dragons</a></th>
			  			  
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
	<div style="padding: 30px 120px; font-size: 25px; margin: 0 auto; display: table; width: 98%;">
		<div>
		<?php
			$getposts = mysqli_query($conn,"SELECT * FROM products WHERE SEATCAPACITY >='1' AND ARTIST ='IMAGINE DRAGONS'  ORDER BY CONCERTID") or die(mysql_error());
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['CONCERTID'];
						$pName = $row['ARTIST'];
						$venue = $row['CONCERTVENUE'];
						$price = $row['TICKETPRICE'];
						$description = $row['CONCERTDTE'];
						$picture = $row['PICTURE'];

						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?product_id='.$id.'">
										<img src="./image/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 20px; color: #fff;">'.$pName.'<br> '.$venue.'<br> Date: '.$description.'<br> Price: $'.$price.' </span></div>
									</div>

								</li>
							</ul>
						';

						}
				}
		?>

		</div>
	</div>
</body>
</html>
