<?php
    $con = new mysqli("localhost", "root", "", "dbregis");
    if ($con->connect_error){
        die("Connection failed: ". $con->connect_error);
    }
    $input=$con->escape_string($_GET['kode']);
 if (isset($_GET['kode'])) { 
    $kode = ($_GET["kode"]);
    $query = "SELECT * FROM t_song WHERE kode = ?"; 
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $kode);
    if( $stmt->execute()) {
        $result = $stmt->get_result();
        while( $row = $result->fetch_assoc() ) {
            $kode = $row['kode'];
            $song = $row['song'];
            $album = $row['album'];
            $singer = $row['singer'];}
} else {
header("location : view.php"); }
}
    $stmt->close();
    $con->close();
    ?>
    <!DOCTYPE html> 
    <html>
        <head>
            <link rel="stylesheet" href="style.css">
            <title>update</title>
            <link rel="icon" href="img/title.jpg" sizes="16/16"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
        <body class="body-edit">
            <div class="container-edt"> 
                <h3 class="heady" style="color: white;">Update Song</h3>
                    <form id="form_song" action="prosesedit.php" method="post">    
                           <div class="edit-details">
                            <p class="edit">  
                                <label >Code</label> 
                                <input type="hidden" name="kode" value="<?php echo $kode; ?>">
                                <input type="text" class="box" name="kodedisabled" id="kode" value="<?php echo $kode ?>"> 
                            </p> 
                            <p class="edit">  
                                <label >Music</label> 
                                <input type="text" class="box" name="song" id="song" value="<?php echo $song ?>"> 
                            </p> 
                            <p class="edit">  
                                <label >Album</label>
                                <input type="text" class="box" name="album" id="album" value="<?php echo $album ?>"> 
                            </p> 
                            <p class="edit">  
                                <label >Singer</label> 
                                <input type="text" class="box" name="singer" id="singer" value="<?php echo $singer ?>"> 
                            </p> 
                        <div class="edit-btn"> 
                            <input type="submit" class="btn-edit" name="edit" value="update here"> 
                        </div> 
                    </div>
                    </form> 
                </div>
            </div> 
        </body>
        </html>