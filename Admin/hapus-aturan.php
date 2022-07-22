<?php 
include '../config/config.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$sqlDelete = "DELETE FROM aturan WHERE id_aturan = '$id'";
	mysqli_query($conn, $sqlDelete);

header('penyakit.php');
echo '<script>alert("Data Berhasil Dihapus."); document.location="aturan.php";</script>';
}
