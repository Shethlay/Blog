<?php
	session_start();
	if($_SESSION['user']){	
	}
	else
	{
		header("location:login.php");
	}

  if($_SERVER['REQUEST_METHOD']=="GET")
  {
  		$conn = mysqli_connect("localhost","root","") or die(mysql_error()); //Connect to server
        mysqli_select_db($conn,"blog") or die("Cannot connect to database"); 

        $id = $_GET['id'];

        mysqli_query($conn,"DELETE FROM blogpost WHERE id='$id'");
        header("location:homepage.php");
  }





?>