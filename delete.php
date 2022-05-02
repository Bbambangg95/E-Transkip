<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<?php include('config.php'); ?>
<?php
if (isset($_GET['nisn'])) {
    $nisn=$_GET["nisn"];
    $query = "DELETE FROM data_nisn WHERE nisn='$nisn'";
    $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    if($sql) { 
		$input= mysqli_query($koneksi, "DELETE FROM transkip_nilai_sem_1 WHERE id_nisn='$nisn'");
        $input= mysqli_query($koneksi, "DELETE FROM transkip_nilai_sem_2 WHERE id_nisn='$nisn'");
        $input= mysqli_query($koneksi, "DELETE FROM transkip_nilai_sem_3 WHERE id_nisn='$nisn'");
        $input= mysqli_query($koneksi, "DELETE FROM transkip_nilai_sem_4 WHERE id_nisn='$nisn'");
        $input= mysqli_query($koneksi, "DELETE FROM transkip_nilai_sem_5 WHERE id_nisn='$nisn'");
        $input= mysqli_query($koneksi, "DELETE FROM transkip_nilai_sem_6 WHERE id_nisn='$nisn'");
    
        echo '<script> document.location="deleted_page.php"</script>';
    }
}
?>
<!--<>alert(); document.location="tables.php?nisn='.$nisn.'";</>'-->