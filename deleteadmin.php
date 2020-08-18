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
  		$conn = mysqli_connect("localhost","root","","blog") or die(mysql_error()); 

  		$query = "Select id from admin";
  		$result = mysqli_query($conn,$query);
  		$row = mysqli_num_rows($result);

  		if($row == 1)
  		{
  			print '<script>
  						alert("you cant delete this admin");
  						window.location.assign("homepage.php");
  					</script>';

  		}
  		else
  		{
	        $id = $_GET['id'];

	        mysqli_query($conn,"DELETE FROM admin WHERE id='$id'");
	        header("location:homepage.php");
  		}
  }

?>