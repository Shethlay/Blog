<!DOCTYPE html>
<html>
<head>
	<title>my webpage</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://kit.fontawesome.com/029b5571a0.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
</head>
<?php 
	session_start();
	if($_SESSION['user']){
		$admin = $_SESSION['user'];
		$id_exists = false;
	}
	else{
		header("location:homepage.php");
	}
	
?>
<body>
		<header>
		<div class="logo">
			<h1 class="logo-text"><span>BLO</span>ggers</h1>
		</div>
		
		<ul class="nav">
			<li><a href="homepage.php">Homepage</a></li>
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


		<h2 align="center">Currently selected</h2>
		<table border="1px" width="100%">
			<tr>
				
				<th>Title</th>
				<th>Description</th>
				<th>post time</th>
				<th>edit time</th>
				<th>public post</th>
			</tr>

			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;

					$conn = mysqli_connect("localhost","root","","blog") or die (mysql_error());

					$query = mysqli_query($conn,"Select * from blogpost where id='$id'");
					$count = mysqli_num_rows($query);
					if($count>0)
					{
						while($row = mysqli_fetch_array($query))
							{
								print "<tr>";
								print '<td align="center">'. $row['title'] .'</td>';
								print '<td align="center">'. $row['description'] .'</td>';
								print '<td align="center">'. $row['date_posted'] ."-". $row['time_posted'].'</td>';
								print '<td align="center">'. $row['date_edited'] ."-". $row['time_edited'].'</td>';
								print '<td align="center">'.$row['public'].'</td>';
								echo "</tr>";
							}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br>
		<?php
		if($id_exists){
			print '
				<div class="formdiv">
				<h3 align="center">Edit your blog here</h3>
				<form action="edit.php" method="POST" class="editform" >
					Enter new Title:<input type="text" name="title" class="formtitle"><br>
					Enter new Decsription:<textarea type="text" name="descr" class="formdescr"></textarea><br>
					Public post?<input type="checkbox" name="public[]" value="yes"/ class="formpublic"><br>
					<input type="submit" value="Update blog" class="formbtn">
				</form>
				</div>
			';}
			else
			{
				print '<h2>There is no data to be edited</h2>';
			}
		?>
<footer>
	<div>
		<div style="float: left; margin-top: 22px;">@Copyright</div>
		<div align="center" style="margin-top: 22px;">designed by lay sheth</div>
		<div style="float: right; overflow: auto;">All rights Reserved.</div>
	</div>
</footer>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$conn = mysqli_connect("localhost","root","") or die(mysql_error()); //Connect to server
       mysqli_select_db($conn,"blog") or die("Cannot connect to database");

	$title = $_POST['title'];
	$details = $_POST['descr'];
	$public = "no";
	$id = $_SESSION['id'];
	$time = strftime("%X");
	$date = strftime("%B %d, %Y");

	foreach ($_POST['public'] as $list)
	 {
		if($list != null)
		{
			$public = "yes";
		}
	}
      mysqli_query($conn,"UPDATE blogpost SET title='$title' ,description='$details', public = '$public',
      								date_edited ='$date', time_edited = '$time' WHERE id = '$id' ");
      
      header("location:homepage.php");
}
?>