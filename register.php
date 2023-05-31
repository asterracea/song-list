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
    <title>sign up</title>
</head>
<body class="body-regis">
    <div class="container-reg">
        <h2 class="head">REGISTRATION</h2>
            <form action="" method="post">
                <div class="regis-details">
                    <div class="regis-box">
                        <label class="details">Full Name</label>
                        <input type="text" name="fullname" id="fullname"  placeholder="Full Name" required>
                    </div>
                    <div class="regis-box">
                        <label class="details">User Name</label>
                        <input type="text" name="username" id="username"  placeholder="Username" required>
                    </div>
                    <div class="regis-box">
                        <label class="details">Password</label>
                        <input type="password" name="password" id="password"  placeholder="Enter Your Password " required>
                    </div>
                    <div class="regis-box">
                        <label class="details">Confirm Password</label>
                        <input type="password" name="passconfirm" id="passconfirm"  placeholder="Retype Password" required>
                    </div>
                    
                </div>
                <div class="regis-btn">
                    <input type="submit" name="signin" value="sign in" id="signin" class="btn-signin"></input>
                    <p>already have an account?<a href="login.php">login here</a></p>
                </div>
            </form>
    </div>
</body>
</html>
<?php
include 'koneksi.php';
session_start();
if(isset($_POST['signin'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conPass = $_POST['passconfirm'];

        // Cek apakah password dan konfirmasi password sama
        if ($password === $conPass) {
            // Buat prepared statement untuk melakukan registrasi
            $stmt = $con->prepare("INSERT INTO t_user (fullname,username,password) VALUES (?, ?, ?)");
            
            // Bind parameter ke prepared statement
            $stmt->bind_param("sss", $fullname, $username, $password);
            
            // Eksekusi prepared statement
            if ($stmt->execute()) {
                echo "<script>
                    alert('Registrasi berhasil!');
                    </script>";
                // Redirect ke halaman lain setelah registrasi sukses
                // header("Location: success.php");
                // exit;
            } else {
                echo "<script>
                    alert('Terjadi kesalahan saat melakukan registrasi.');
                    </script>";
            }
            // Tutup prepared statement
            $stmt->close();
        } else {
            echo "<script>
                    alert('Password dan konfirmasi password tidak cocok!');
                    </script>";
        }
    }

?>