<?php
        include 'db.php';
?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <!-- header -->
        <header>
            <div class="container">
            <h1><a href="index.php">WEB GALERI FOTO</a></h1>
            <ul>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="registrasi.php">Registrasi</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            </div>
        </header>

        <!-- content -->
        <div class="section">
            <div class="container">
                <h3>Registrasi Akun</h3>
                <div class="box">
                    <from action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama User" class="input-control" required>
                        <input type="text" name="user" placeholder="Username" class="input-control" required>
                        <input type="text" name="pass" placeholder="Password" class="input-control" required>
                        <input type="text" name="tlp" placeholder="Nomor Telepon" class="input-control" required>
                        <input type="text" name="email" placeholder="E-mail" class="input-control" required>
                        <input type="text" name="almt" placeholder="Alamat" class="input-control" required>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </from>
    <?php
        if(isset($_POST['submit'])){
            $nama = ucwords($_POST['nama']);
            $username = $_POST['user'];
            $password = $_POST['pass'];
            $telpon   = $_POST['tlp'];
            $mail     = $_POST['email'];
            $alamat   = ucwords($_POST['almt']);

            $insert = mysqli_query($conn, "INSERT INTO tbuser VALUES (
                    null,
                    '".$nama."',
					'".$username."',
					'".$password."',
					'".$telpon."',
					'".$mail."',
					'".$alamat."')

                    ");
        if($insert){
            echo '<script>alert("Registrasi berhasil")</script>';
            echo '<script>window.location="login.php"</script>';
        }else{
            echo 'gagal '.mysqli_error($conn);
        }
        }
    ?>
                </div>
            </div>
        </div>
    </body>
</html>