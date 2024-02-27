<?php
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT user_telp, user_email, user_address FROM tbuser WHERE user_id = 2");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB GALERI MUPA</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">WEB GALERI MUPA</a></h1>
        <ul>
            <li><a href="galeri.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>
    
    <!-- jurusan -->
    <div class="section">
        <div class="container">
            <h3>Jurusan</h3>
            <div class="box">
                <?php
                    $Jurusan = mysqli_query($conn, "SELECT * FROM tbjurusan ORDER BY Jurusan_id DESC");
					if(mysqli_num_rows($Jurusan) > 0){
						while($k = mysqli_fetch_array($Jurusan)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['jurusan_id'] ?>">
                        <div class="col-5">
                            <img src="foto/icon-Jurusan.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['jurusan_name'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Jurusan tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <!-- new product -->
    <div class="container">
       <h3>Foto Terbaru</h3>
       <div class="box">
          <?php
              $foto = mysqli_query($conn, "SELECT * FROM tbimage WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
              <p class="user">Nama User : <?php echo $p['user_name'] ?></p>
              <p class="nama"><?php echo $p['date_create']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
    </div>
    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - SMK Muhammadiyah Pakem.</small>
        </div>
    </footer>
</body>
</html>