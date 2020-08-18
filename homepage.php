<?php 
  session_start();
    if($_SESSION["user"]){
    }
    else{
      header("location: adminlogin.php");
    }
  
  $admin = $_SESSION["user"];
?>



<!DOCTYPE html>
<html>
<head>
	<title>BLOG</title>
		<meta charset="utf-8">
		<meta name = "viewport" content="width=device-witdh, intial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie+edge">
		

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function()
		{
			$(".toggle").click(function()
			{	

				$(".slider").toggle("slow");
				$(".po").css("display","none");
				$(".right").css("display","none");
				$(".ap1").css("display","none");
				$(".da1").css("display","none");
				$(".greeting").show();
			});

			$("#ap").click(function()
			{	
				$(".po").css("display","none");
				$(".greeting").css("display","none");
				$(".right").css("display","none");
				$(".da1").css("display","none");
				$(".ap1").show();
			

			});

			$("#aa").click(function()
			{
				$(".po").css("display","none");
				$(".greeting").css("display","none");
				$(".ap1").css("display","none");
				$(".da1").css("display","none");
				$(".right").show();
				
			});
			$("#post").click(function()
			{

				$(".right").css("display","none");
				$(".greeting").css("display","none");
				$(".ap1").css("display","none");
				$(".da1").css("display","none");
				$(".po").show();

			});
			$("#da").click(function()
			{

				$(".right").css("display","none");
				$(".po").css("display","none");
				$(".greeting").css("display","none");
				$(".ap1").css("display","none");
				$(".da1").show();

			});
		});

		function myfunction(id){
			var r = confirm("Are you aure you want to delet this post");
			if(r==true)
			{
				window.location.assign("delete.php?id=" + id);
			}
		}
		function deleteadmin(id){
			var r = confirm("Are you aure you want to remove this admin");
			if(r==true)
			{
				window.location.assign("deleteadmin.php?id=" + id);
			}
		}
			$('#insert').click(function(){
				var image_name = $('#image').val();
				if(image_name =='')
				{
					alert("please select the file");
					return false;
				}
				else{
					var extension = $('#image').val().split('.').pop().toLowerCase();
					if(jquery.inArray(extension,['gif','png','jpg','jpeg']) == -1)
					{
						alert('Invalid Image file');
						$('#image').val('');
						return false;
					}
				}
			});
		
</script>
		

		<script src="https://kit.fontawesome.com/029b5571a0.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
<link rel="stylesheet"  href="css/style.css">
</head>
<body>

	<header>
		<div class="toggle" >
			<div class="inner">
			<div class="toggle1"></div>
			<div class="toggle1"></div>
			<div class="toggle1"></div>
			</div>
		</div>

		<div class="logo">
			<h1 class="logo-text"><span>BLO</span>ggers</h1>
		</div>
		
		<ul class="nav">
			
			<li><a href="">
					<i class="fa fa-user"></i>
					<?php echo $admin; ?>
					<i class="fa fa-chevron-down" style="font-size: 0.8em;"></i>
				</a>
				<ul>
					<li><a href="">Dashboard</a></li>
					<li><a href="adminlogout.php" class="logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>
	
	<div class="slider" >
				<div class="op1" id="ap">Add post</div>
				<div class="op1" id="aa">Add admin</div>
				<div class="op1" id="da">Delete admin</div>
				<div class="op1" id="post">post</div>
				<div class="op1"><a href="adminlogout.php" class="logout1" style="color: red;">Logout</a></div>
	</div>
	<div class="greeting" align="center">
		<P><span class="sp">Welcome</span> to our blog<br>This is admin pannel</P>
	</div>
	<div class="ap1" align="center">
			<h3 align="center">Add new <span class="sp">BLOG</span></h3>
		<table >
			<form action='add.php' method="POST">
				<tr>
					<td><h3>Title</h3></td>
					<td>:</td>
					<td>
						<input type="text" name="title">
					</td>	
				</tr>
				<tr>
					<td><h3>image</h3></td>
					<td>:</td>
					<td>
					<input type="file" name="image">
					</td>	
				</tr>
				<tr>
					<td><h3>Description</h3></td>
					<td>:</td>
						<td>
							<textarea type="text" name="descr"></textarea> 
						</td>	
				</tr>
				<tr>
					<td>
						<h3>public post</h3>
					</td>
					<td>:</td>
					<td>
						<input type="checkbox" name="public[]" value="yes">
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center">
						<input id="insert" type="Submit" name="submit1"  value="ADD blog">
					</td>
				</tr>
			</form>
		</table>
	</div>

	<div class="right" align="center">
	<table >	
		<h3 align="center">add new admin</h3>
		<form action="add.php" method="POST">
			<tr>
				<td><h3>Username:</h3></td>
				<td>:</td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td><h3>Password:</h3></td>
				<td>:</td>
				<td><input type="text" name="pw" required></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit" name="submit2" value="add admin"></td>
			</tr>
		</form>
	</table>
</div>
<div class="da1" >
<table border="1px" width="100%" cellpadding="3px" cellspacing="3px">

			<tr>
				<th>Admin name</th>
				<th>Delete</th>
			</tr>

			<?php
				$conn = mysqli_connect("localhost","root","","blog") or die (mysql_error());
				
				$result= mysqli_query($conn,"Select * from admin");
				while( $row = mysqli_fetch_array($result))
				{
					print "<tr>";
						print '<td align="center">'. $row['adminname'] .'</td>';
						print '<td align="center"><a href="#" onclick="deleteadmin('.$row['id'].')">delete</a></td>';
						
					echo "</tr>";
				}
			?>
</table>
</div>

<div class="po" >
<table border="1px" width="100%" cellpadding="3px" cellspacing="3px">

			<tr>
				
				<th>Title</th>
				<th>image</th>
				<th>Description</th>
				<th>post time</th>
				<th>edit time</th>
				<th>edit</th>
				<th>Delete</th>
				<th>public post</th>
			</tr>

			<?php

				 $conn = mysqli_connect("localhost","root","","blog") or die (mysql_error());
				
				$result= mysqli_query($conn,"Select * from blogpost");
				while( $row = mysqli_fetch_array($result))
				{

					
					 
					print "<tr>";
						print '<td align="center">'. $row['title'] .'</td>';
						print '<td align="center">
								<img src="C:\xampp\htdocs\BLOG\image'.$row['image'].'"></td>';
						print '<td align="center">'. $row['description'] .'</td>';
						print '<td align="center">'. $row['date_posted'] ."-". $row['time_posted'].'</td>';
						print '<td align="center">'. $row['date_edited'] ."-". $row['time_edited'].'</td>';
						print '<td align="center"><a href="edit.php?id='.$row['id'].'">edit</td>';
						print '<td align="center"><a href="#" onclick="myfunction('.$row['id'].')">delete</a></td>';
						print '<td align="center">'.$row['public'].'</td>';
					echo "</tr>";
				}
			?>
		
</table>
</div>
<footer>
	<div>
		<div style="float: left; margin-top: 22px;">@Copyright</div>
		<div align="center" style="margin-top: 22px;">designed by lay sheth</div>
		<div style="float: right; overflow: auto;">All rights Reserved.</div>
	</div>
</footer>
</body>
</html>