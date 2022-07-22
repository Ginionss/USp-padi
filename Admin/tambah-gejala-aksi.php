<?php 

include '../config/config.php'; 
if(isset($_POST['Submit'])){

$sql3 = "SELECT count(*) as jumlah FROM gejala";
                $query3 = mysqli_fetch_array(mysqli_query($conn, $sql3));
                $idbaru = $query3['jumlah'] +1;
                if ($idbaru < 10) {
                    $idbaru = 'G0'.$idbaru;
                }else{
                    $idbaru = 'G'.$idbaru;

                }
$id = $idbaru;
$nama = $_POST['nama_gejala'];
$sub = substr($id, 0, 1);
if ($sub == 'G') {
	$data = mysqli_query($conn,"select * from gejala where id_gejala = '$id' or nama_gejala = '$nama'");
$jmlh = mysqli_num_rows($data);
if ($jmlh == 0) {
	mysqli_query($conn,"INSERT INTO gejala (id_gejala, nama_gejala) values ('$id', '$nama')");

header('gejala.php');

echo '<script>alert("Data Berhasil Ditambahkan."); document.location="gejala.php";</script>';
}else{
	header('gejala.php');

echo '<script>alert("Data yang anda tambahkan sudah ada!!"); document.location="gejala.php";</script>';

}
}else{
	header('gejala.php');

echo '<script>alert("Inputan harus dimulai dengan huruf G!!"); document.location="gejala.php";</script>';
}
}

// $kode = $_POST['id_gejala'];
// $nama = $_POST['nama_gejala'];
// //d

// $sql = mysqli_query($conn,"select nama_gejala from gejala where id_gejala='$kode' or nama_gejala='$nama'");
// $data = mysqli_num_rows($sql);
// if ($data > 0)
// {
// 	header('gejala.php');
// 	echo '<script>alert("Data Sudah ada"); document.location="tambah-gejala.php";</script>';
// }
// else{
// 	mysqli_query($conn,"INSERT INTO gejala (id_gejala, nama_gejala) values ('$kode', '$nama')");
// 	header('gejala.php');
// 	echo '<script>alert("Data Berhasil Ditambahkan"); document.location="gejala.php";</script>';}
// }



// mysqli_query($conn,"INSERT INTO gejala (id_gejala, nama_gejala) values ( '$kode', '$nama')");

// header('gejala.php');

// echo '<script>alert("Data Berhasil Ditambahkan."); document.location="gejala.php";</script>';
// } 