<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <style>
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
    }
    html{
        height: 100%;
    }
    body{
        font-family: 'Segoe UI', sans-serif;;
        font-size: 1rem;
        line-height: 1.6;
        height: 100%;
        background-image: url("1.jpg");
        
    }
    .wrap {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fafafa;
        
    }
    .signup-form{
        width: 350px;
        margin: 0 auto;
        border: 1px solid #ddd;
        padding: 2rem;
        background: #ffffff;
       
    }
    .form-input{
        background: #fafafa;
        border: 1px solid #eeeeee;
        padding: 12px;
        width: 100%;
       
    }
    .form-group{
        margin-bottom: 1rem;
    }
    .form-button{
        background: #69d2e7;
        border: 1px solid #ddd;
        color: #ffffff;
        padding: 10px;
        width: 100%;
        text-transform: uppercase;
        cursor: pointer;
        
    }
    .form-button:hover{
        background: #69c8e7;
        cursor: pointer;
    }
    .form-header{
        text-align: center;
        margin-bottom : 2rem;
    }
    .form-footer{
        text-align: center;
        cursor: pointer;
    }

    </style>  
    
    <script>
           function check2() 
            {
                console.log("hello");
                var Name    = document.forms["form"]["username"];
                var pass    = document.forms["form"]["pw"];
                var mail    = document.forms["form"]["email"];

                var regex   = /^[a-zA-Z]+$/;
                var passw   = /^([a-zA-Z0-9]{0,12})+$/;
                
                    if(Name.value==""){
                        alert("name can't be empty");
                        Name.focus();
                        return false;
                    }   
                    if(regex.test(Name.value)==false)
                    {
                        alert("name is invalid");
                        Name.focus();
                        return false;
                    }
                    if(pass.value==""){
                        alert("password can't be empty");
                        pass.focus();
                        return false;
                    }
                    if(passw.test(pass.value)==false){
                        alert("password is invalid");
                        pass.focus();
                        return false;
                    }
                    if(mail.value==""){
                        alert("mail can't be empty");
                        mail.focus();
                        return false;
                    }   
            } 
    </script>
    
</head>
<body>
    <div class="wrap">
        <form class="signup-form" name="form" action="signup.php" method="POST">
            <div class="form-header">
                <h3>Signup</h3>
                <p>New user signup here</p>
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Username" name="username">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" class="form-input" placeholder="password" name="pw">
            </div>

            <div class="form-group">
                <input type="email" class="form-input" placeholder="E-mail" name="email">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit" name="login" onclick="check2()">SignUp</button>
            </div>
            <div class="form-footer">
            Back to login page <a href="login.php">Login Up</a>
            </div>
        </form>
    </div><!--/.wrap-->



</body>
</html>
<?php

$servername = "localhost";
$pass = "";
$dbname = "blog";

	if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         	$username = $_POST['username'];
         	$Password = $_POST['pw'];
         	$Email = $_POST['email'];
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

        $query = mysqli_query($conn,"select * from userdata");
        if($query)
        {
            while($row = mysqli_fetch_array($query))
            {
        	   $table_user = $row['username'];
        	   if($username == $table_user)
        	   {
        		  $bool = false;
        		  print '<script>alert("Username is already taken");</script>';
        		  print '<script>window.location.assign("signup.php");</script>';
        	   }
            }
        }
        if($bool)
        {
	       mysqli_query($conn,"INSERT INTO users (username,Password,email) VALUES ('$username','$Password','$Email')");
	       print '<script>alert("Successfully Registratered");</script>';
	       print '<script>window.location.assign("signup.php");</script>';


        }
    }
?>



