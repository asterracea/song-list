<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/title.jpg" sizes="16/16"/>
    <title>add list</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body-input">
    <div class="container-inp">
            <h3 class="heady" style="color: white;">Add Music Title</h3>
            <form id="form_song" action="prosesinput.php" method="post">
                <div class="input-details">
                    <p class="inidetails">
                        <label class="lbl-input"> code</label>
                        <input type="text" name="kode" id="kode" class="box" placeholder="type here" required>
                    </p>
                    <p class="inidetails">
                        <label class="lbl-input">Music</label>
                        <input type="text" name="song" id="song" class="box" placeholder="type here" required>
                    </p>
                    <p class="inidetails">
                        <label class="lbl-input">Album</label>
                        <input type="text" name="album" id="album" class="box" placeholder="type here" required>
                    </p>
                    <p class="inidetails">
                        <label class="lbl-input" >Singer</label>
                        <input type="text" name="singer" id="singer" class="box" placeholder="type here" required>
                    </p>
                </div>    
                <div class="input-btn">
                    <button type="submit" name="input" value="simpan"  class="btn-input">Simpan</button>
                </div>
            </form>
    </div>
</body>
</html>