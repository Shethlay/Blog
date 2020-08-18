<?php
	session_start();
	if(!$_SESSION['user'])
	{
		header("location:login.php");
	}
if(!empty($_POST['submit1']))
{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
				$title = $_POST['title'];
				$details = $_POST['descr'];
				$time = strftime("%x");
				$date = strftime("%B %d,%y");
				$public = "yes";

				$name = $_FILES['file']['name'];
  				$target_dir = "C:\xampp\htdocs\BLOG\image";
  				$target_file = $target_dir . basename($_FILES["file"]["name"]);

  
  				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));




				$conn = mysqli_connect("localhost","root","") or die(mysql_error()); //Connect to server
		       mysqli_select_db($conn,"blog") or die("Cannot connect to database"); //Conect to database

				foreach ($_POST['public'] as $list)
			 	{
					if($list = null)
					{
						$public = "no";
					}
				}

		       mysqli_query($conn,"INSERT INTO blogpost (title, image, description, date_posted, time_posted, public) 
		       						VALUES ('$title','$name','$details','$date','$time','$public')"); //SQL query
		       header("location:homepage.php");

		       move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

		}

		else
		{
			header("location:homepage.php");
		}
}
else if(!empty($_POST['submit2']))
{


$servername = "localhost";
$pass = "";
$dbname = "blog";

	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         	$username = $_POST['username'];
         	$Password = $_POST['pw'];
         	$bool = true;

        	$conn = mysqli_connect($servername, "root", $pass,$dbname);
        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
        	echo "connected";
        }

        $query = mysqli_query($conn,"select * from admin");
        if($query)
        {
            while($row = mysqli_fetch_array($query))
            {
        	   $table_user = $row['adminname'];
        	   if($username == $table_user)
        	   {
        		  $bool = false;
        		  print '<script>alert("Username is already taken");</script>';
        		  header("location:homepage.php");

        	   }
            }
        }
        if($bool)
        {
	       mysqli_query($conn,"INSERT INTO admin (adminname,adminpassword) VALUES ('$username','$Password')");
	       
	       header("location:homepage.php");



        }
    }

}
?>

