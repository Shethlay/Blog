<?php
 
	$servername = "localhost";
	$usrname = "root";
	$password = "";

	$conn = mysqli_connect($servername,$usrname,$password);



	if(!$conn)
	{
		echo "connection failed";
	}
	else
	{ 
		echo "connect successfuly";
	}

	$sql = "CREATE DATABASE blog";

	if(mysqli_query($conn,$sql)==true)
	{
		echo "database userdata created successfuly";
	}
	else{
		echo "database is not created";
	}

	mysqli_close($conn);

	echo "<br>";	


	$servername1 = "localhost";
	$username = "root";
	$password1 = "";
	$dbname = "blog";

	$conn1 = mysqli_connect($servername1,$username,$password1,$dbname);

	if(!$conn1)
	{
		echo "connection failed";
	}
	else
	{ 
		echo "connect successfuly";
	}
	echo "<br>";

	$sql1 = "CREATE TABLE users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Username VARCHAR(50),
	Password VARCHAR(50),
	email VARCHAR(50)
	)";

	if(mysqli_query($conn1,$sql1)==true)
	{
		echo "table created successfuly"; 
	}
	else{
		echo "table created successfuly";
	}
echo "<br>";

	$sql2 = "CREATE TABLE admin(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Username VARCHAR(50),
	Password VARCHAR(50),
	email VARCHAR(50)
	)";


	if(mysqli_query($conn1,$sql2)==true)
	{
		echo "table created successfuly"; 
	}
	else{
		echo "table created successfuly";
	}

mysqli_close($conn1);

?>