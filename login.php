<!DOCTYPE>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Web Galeri Foto</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Login</login>
        <form action="" method="POST"> 
        <input type="text" name="user" placeholder="Username" class="input-control">
             <input type="password" name="pass" placeholder="Password" class="input-control">
             <input type="submit" name="submit" value="Login" class="btn">
         </form>
         <?php 
 if(isset($_POST['submit'])){
    session_start();
    include 'db.php';

    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $cek = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '".$user."'AND password = '".$pass."'");
    if (mysqli_num_rows($cek)> 0){
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->user_id;
        echo '<script>window.location="dashboard.php"</script>';
    }else{
        echo '<script>alert("Username Atau password anda salah")</script>';
    }
}
?><br/>
    <p>Belum punya akun? daftar <a style="color:#00C;" href="registrasi.php">DISINI</a></p>
    <p>atau klik <a style="color:#00C;" href="index.php">Kembali</a></p>
      </div>

</body>
</html>