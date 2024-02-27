<?php

    include 'db.php';

    if(isset($_GET['idp'])){
        $foto = mysqli_query($conn, "SELECT image FROM tbimage WHERE image_id = '".$_GET['idp']."' ");
	   $p = mysqli_fetch_object($foto);

       unlink('./foto/'.$p->image);
	   
       $delete = mysqli_query($conn, "DELETE FROM tbimage WHERE image_id = '".$_GET['idp']."' ");
       echo '<script>window.location="data-image.php"</script>';
    }

?>