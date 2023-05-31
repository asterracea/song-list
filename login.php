<?php
$con = new mysqli("localhost", "root", "", "dbregis");
// check connection
if ($con->connect_error){
    die("Connection failed: ". $con->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/title.jpg" sizes="16/16"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Form Login</title>
</head>
<body class="body-login">
    <div class="container-login" data-tilt>
        <div class="right">
            <img src="teach.png" alt="">
        </div>
        <div class="login">
            <!-- form -->
            <form action="proseslogin.php" method="post">
                <h2>Sign In</h2>
                <div class="input-box">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" id="username" class="box" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <i class="fa fa-key" ></i>
                    <input type="password" name="password" id="password" class="box" placeholder="Password" required>
                    <span class="eye" onclick="show()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2"class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <!--button-->
                <div class="signlog">
                    <button type="submit" name="login"  value="simpan"  id="login"  class="btn-login" >login</button>
                    <p style="font-size:13px;text-align:center;">dont have an account? <a href="register.php" class="a-login" style="font-size:13px;">Create Account</a></p>    
                </div>
            </form>
        </div>
    </div>
    <script>
        <!--lihat password-->
        function show() {
            var x = document.getElementById("password");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");
            if(x.type === 'password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>
</html>