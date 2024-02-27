<?php 
    session_start();
        include 'db_php'
        if($_SESSION['status_login'] != true){
            echo '<script>window.location="login.php"</script>';
        }
            $query = mysqli_query($conn, "SELECT * FROM tbuser WHERE user_id ='".$_SESSION['id']."'");
            $d = mysqli_fetch_object($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-trantional.dtd">
<html  xmlns="https://www.w3.org/1999/xhtml">
    <head>
        <meta charseet="utf-8">
        <meta name="viewport" content="widt=device-width, initial-scale=1">
        <title>WEB GALERI FOTO</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <header>
            <div class="container">
                <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="data-image.php">Data Foto</a></li>
                    <li><a href="Keluar.php">Keluar</a></li>
                </ul>
            </div>
        </header>

        <div class="section">
            <div class="container">
                <h3>Profil</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->name_user ?>" required>
                        <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                        <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->user_telp ?>" required>
                        <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->user_email ?>" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->user_address ?>" required>
                    </form>
                    <?php
                        if(isset($_POST['submit'])){

                            $nama   = $_POST['nama'];
                            $user   = $_POST['user'];
                            $hp     = $_POST['hp'];
                            $email  = $_POST['email'];
                            $alamat = $_POST['alamat'];

                            $update = mysqli_query($conn, "UPDATE tbuser SET 
					                  name_user = '".$nama."',
									            username = '".$user."',
									            user_telp = '".$hp."',
									            user_email = '".$email."',
									            user_address = '".$alamat."'
									            WHERE user_id = '".$d->user_id."'");
                            if($update){
                                echo '<script>alert("Ubah data berhasil:)</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'gagal '. mysqli_error($conn);
                            }
                        }
                    ?>
                </div>

                <h3>Ubah password</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                        <input type="submit" name="ubah_password" placeholder="Ubah Password" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['ubah_password'])){

                            $pass1=  $_POST['pass1'];
                            $pass2=  $_POST['pass2'];

                            if($pass2 !=$pass1){
                                echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai")<script>';
                            }else{
                                $u_pass = mysqli_query($conn, "UPDATE tbuser SET
                                                        password = '".$pass1."'
                                                        WHERE user_id = '".$d->user_id."'");
                                if($u_pass){
                                    echo '<script>alert("Ubah data berhasil")</script>';
                                    echo '<script>window.location="profil.php"</script>';
                                }else{
                                    echo 'gagal '.mysqli_error($conn);
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - WEBSITE GALERY KELOMPOK 5</small>
        </div>
    </footer>
    </body>
</html>