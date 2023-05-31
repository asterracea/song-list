<?php
    $con = new mysqli("localhost", "root", "", "dbregis");
    // check connection
    if ($con->connect_error){
        die("Connection failed: ". $con->connect_error);
    }
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = $_POST['password'];

        $query = "SELECT * FROM t_user WHERE username = '$username' && password = '$password'";
        $result = mysqli_query($con, $query);

        // memeriksa username pada database
        if (mysqli_num_rows($result) > 0 ) {
                $_SESSION['username'] = $username;
                echo "<script>alert('Login berhasil');
                document.location='home.php'</script>";
            } else {
                // Password salah
                echo "<script>alert('incorrect password or username');
                    document.location='login.php'; 
                    </script>";
            }
        } 
?>