<?php
$con = new mysqli("localhost", "root", "", "dbregis");
// check connection
if ($con->connect_error){
    die("Connection failed: ". $con->connect_error);
}
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/title.jpg" sizes="16/16"/>
    <title>view</title>
    </head>
    <body class="body-view">
        <nav>
            <label class="menu">Halo</label>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="view.php">Show List</a></li>
                <li><a href="inputsong.php">Add Music</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
        }
        ?>
        <form class="carii" action="view.php" class="cari">
            <input type="text" name="cari" id="cari" placeholder="type here">
            <button type="submit" value="cari" class="btn-cari" >search</button>
            <a button href="view.php" type="button" style="color: red; text-align: center;">Reset</a>
        </form>
        <div class="tambah">
            <a href="inputsong.php" class="add-song">Add Song</a>
        </div>
        <main class="table">
            <section class="table-header">
                <h1>Your List Song</h1>
            </section>
            <section class="table-body">
                <table>
                    <tr class="tb">
                        <th>KODE</th>
                        <th>SONG</th>
                        <th>ALBUM</th>
                        <th>SINGER</th>
                        <th>PILIHAN</th>
                    </tr>
        <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $query = "SELECT * FROM t_song where song='$cari'";
        }else{
            $query= "SELECT * FROM t_song  Order BY kode ASC";
        }
            $stmt = $con->prepare($query);
            if( $stmt->execute()) {
                $result = $stmt->get_result();
                while( $row = $result->fetch_assoc() ) {
                    echo "<tr>";
                    echo "<td>$row[kode]</td>"; 
                    echo "<td>$row[song]</td>"; 
                    echo "<td>$row[album]</td>"; 
                    echo "<td>$row[singer]</td>";
                    echo '<td>
                        <a class="link-edt" href="editsong.php?kode='.$row['kode'].'">Edit</a> /
                        <a class="link-hps" href="hapus.php?kode='.$row['kode'].'" 
                            onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
                        </td>';
                    echo "</tr>";
                }
            } 
            $stmt->close();
            $con->close();
        ?>
                 </table>
            </section>
        </main>
</body>
</html>