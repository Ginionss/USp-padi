<?php 

include '../config/config.php'; 
if(isset($_POST['Submit']))
{

$sql3 = "SELECT count(*) as jumlah FROM aturan";
                $query3 = mysqli_fetch_array(mysqli_query($conn, $sql3));
                $idbaru = $query3['jumlah'] +1;
                if ($idbaru < 10) {
                    $idbaru = 'A0'.$idbaru;
                }else{
                    $idbaru = 'A'.$idbaru;

                }
$id = $idbaru;
$penyakit = $_POST['id_penyakit'];
$gejala = $_POST['id_gejala'];
$cf = $_POST['nilai_cf'];
if ($cf >= 0 && $cf <= 1) {
		$data = mysqli_query($conn,"select * from aturan where id_penyakit = '$penyakit' and id_gejala = '$gejala'");
$jmlh = mysqli_num_rows($data);
if ($jmlh == 0) {
	mysqli_query($conn,"INSERT INTO aturan (id_penyakit, id_gejala, nilai_cf) values ('$penyakit', '$gejala', '$cf' )");

header('aturan.php');

echo '<script>alert("Data Berhasil Ditambahkan."); document.location="aturan.php";</script>';
}else{
	header('aturan.php');

echo '<script>alert("Data yang anda tambahkan sudah ada!!"); document.location="aturan.php";</script>';
}
}else{
	header('tambah-aturan.php');

echo '<script>alert("Nilai CF harus lebih besar sama dengan 0 dan lebih kecil sama dengan 1!!"); document.location="tambah-aturan.php";</script>';

}


}


// $penyakit = $_POST['id_penyakit'];
// $gejala = $_POST['id_gejala'];
// $nilai = $_POST['nilai_cf'];

// mysqli_query($conn,"INSERT INTO aturan (id_penyakit, id_gejala, nilai_cf) values ('$penyakit', '$gejala', '$nilai')");
 
// header('aturan.php');

// echo '<script>alert("Data Berhasil Ditambahkan."); document.location="aturan.php";</script>';
// } 
//  