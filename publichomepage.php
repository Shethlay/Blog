<?php 
  session_start();
    if($_SESSION["user"]){
	    $user = $_SESSION["user"];
    }
    else{
      header("location: login.php");
    }
  
  
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet"  href="css/style.css">
	<script src="https://kit.fontawesome.com/029b5571a0.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="logo">
			<h1 class="logo-text"><span>BLO</span>ggers</h1>
		</div>
		<ul class="nav">
			<li><a href="">Home</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Services</a></li>

			<li><a href="">
					<i class="fa fa-user"></i>
					<?php echo $user ?>
					<i class="fa fa-chevron-down" style="font-size: 0.8em;"></i>
				</a>
				
				<ul>
					<li><a href="logout.php" class="logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>
	
	
	

			<h2 align="center"><u>Public blog</u></h2>

	<table border="1px" width="100%" cellspacing="5px" cellpadding="5px">
			<tr>
				<th>Title</th>
				<th>image</th>
				<th>Description</th>
				<th>post time</th>
			</tr>

			<?php

				 $conn = mysqli_connect("localhost","root","","blog") or die (mysql_error());
				
			$result= mysqli_query($conn,"Select * from blogpost where public ='yes'");
				while( $row = mysqli_fetch_array($result))
				{
					print "<tr>";
						
						print '<td align="center">'. $row['title'] .'</td>';
						print '<td align="center">
								<img src="data:image/jpeg;base64'.base64_encode($row['image']).'"></td>';
						print '<td align="center">'. $row['description'] .'</td>';
						print '<td align="center">'. $row['date_posted'] ."-". $row['time_posted'].'</td>';
					echo "</tr>";
				}
			?>  
		

</table>
<footer>
	<div>
		<div style="float: left; margin-top: 22px;">@Copyright</div>
		<div align="center" style="margin-top: 22px;">designed by lay sheth</div>
		<div style="float: right; overflow: auto;">All rights Reserved.</div>
	</div>
</footer>
</body>
</html>  
