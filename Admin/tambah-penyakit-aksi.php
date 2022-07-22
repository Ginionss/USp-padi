<?php 

include '../config/config.php'; 
if(isset($_POST['Submit'])){

$sql3 = "SELECT count(*) as jumlah FROM penyakit";
                $query3 = mysqli_fetch_array(mysqli_query($conn, $sql3));
                $idbaru = $query3['jumlah'] +1;
                if ($idbaru < 10) {
                    $idbaru = 'P0'.$idbaru;
                }else{
                    $idbaru = 'P'.$idbaru;

                }
$id = $idbaru;
$penyakit = $_POST['nama_penyakit'];
$pengendalian = $_POST['pengendalian'];
    $data = mysqli_query($conn,"select * from penyakit where id_penyakit = '$id' or nama_penyakit = '$penyakit'");
$jmlh = mysqli_num_rows($data);
if ($jmlh == 0) {
    mysqli_query($conn,"INSERT INTO penyakit (id_penyakit, nama_penyakit, pengendalian) values ('$id', '$penyakit', '$pengendalian')");

header('penyakit.php');

echo '<script>alert("Data Berhasil Ditambahkan."); document.location="penyakit.php";</script>';
}else{
    header('penyakit.php');

echo '<script>alert("Data yang anda tambahkan sudah ada!!"); document.location="penyakit.php";</script>';


// $kode = $_POST['id_penyakit'];
// $nama = $_POST['nama_penyakit'];
// $pengendalian = $_POST['pengendalian'];

// $sql =mysqli_query($conn,"SELECT * FROM `penyakit` WHERE nama_penyakit = '$nama' or id_penyakit='$kode'");
//  echo mysqli_num_rows($sql);
//  $data=mysqli_num_rows($sql);
//  echo $data;
//  if ($data > 0) {
//  	header('penyakit.php');
//  		echo '<script>alert("Kode atau penyakit telah ada"); document.location="tambah-penyakit.php";</script>';

//  }else{

//  		mysqli_query($conn,"INSERT INTO penyakit (id_penyakit, nama_penyakit, pengendalian) values ('$kode', '$nama', '$pengendalian')");
//  		header('penyakit.php');
//  		echo '<script>alert("Data Berhasil Ditambahkan."); document.location="penyakit.php";</script>';

	
 }


 } 

// mysqli_query($conn,"INSERT INTO penyakit (id_penyakit, nama_penyakit, pengendalian) values ('$kode', '$nama' , '$pengendalian')");

// 	header('penyakit.php');

// 	 echo '<script>alert("Data Berhasil Ditambahkan."); document.location="penyakit.php";</script>';
// 	 } 
//  