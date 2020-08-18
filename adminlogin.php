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
                var passw   = /^([a-zA-Z0-9]{6,12})+$/;
                
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
               
            } 
    </script>
    
</head>
<body>
    <div class="wrap">
        <form class="signup-form" name="form" action="checkadmin.php" method="POST">
            <div class="form-header">
                <h3>admin login</h3>
                <p>admin  login here</p>
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" placeholder="Username" name="username">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" class="form-input" placeholder="password" name="pw">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit" name="login" onclick="check2()">SignUp</button>
            </div>
        </form>
    </div><!--/.wrap-->



</body>
</html>