<?php
	
	session_start();
	$username = $_POST['username'];
	$password = $_POST['pw'];
	$bool = true;

	$servername = "localhost";
	$pass = "";
	$dbname = "blog";

    $conn = mysqli_connect($servername, "root", $pass,$dbname);

    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        echo "connected";
    }

    mysqli_select_db($conn ,"blog") or die ("Cannot connect to database");

	$query = mysqli_query($conn ," select * from users where username = '$username'");

	$exists = mysqli_num_rows($query);

	$table_user = "";
	$table_password = "";

	if($exists>0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$table_user = $row['Username'];
			$table_password = $row['Password'];
		}

		if(($username = $table_user) && ($password == $table_password) )
		{
			if($password = $table_password)
			{
				$_SESSION["user"] = $username;
				header("location:publichomepage.php");
			}
			else
			{
				print '<script>alert("Incorrect password!")</script>;';
				print '<script>window.location.assign("login.php");</script>;';
			}
		}
		else
		{
			print '<script>alert("Incorrect username!")</script>;';
			print '<script>window.location.assign("login.php");</script>;';
		}
	}
	else
	{
				print '<script>alert("First you must register")</script>;';
				print '<script>window.location.assign("login.php");</script>;';
	}


?>