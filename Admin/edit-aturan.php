<?php include '../config/config.php' ?>
<?php print_r($_POST) ?>
<head>
  <link rel="stylesheet" type="text/css"  href="assets/datatables.css">
  <script src="assets/jquery.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Aturan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php include 'sitbar.php' ?>

  <main id="main" class="main">

    <div class="container-fluid mt--7">
<body>
    
    <h3>Edit aturan</h3>
 
     <?php include '../config/config.php';
     
      
        $id = $_GET['id'];
        $sql = mysqli_query($conn,"select * from aturan where id_aturan='$id'");
      
      
      while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
      ?>
   
    <form  method="post">        
        <table>
            <tr>
                 <td>Kode Gejala</td>
               
                <td><?php 
                $sql2 = "SELECT * FROM gejala";
                $query = mysqli_query($conn, $sql2);?>
                <select name="id_gejala" class="form-control"  id= "id_gejala">
                   <?php $kode = $data['id_gejala'];
                    $a = "SELECT * FROM gejala where id_gejala= '$kode'";
                $b = mysqli_query($conn, $a); 
                while($f = mysqli_fetch_array($b, MYSQLI_ASSOC)){?>
                    <option value="<?php echo $f['id_gejala']?>"><?php echo $f['id_gejala'].' '.$f['nama_gejala']?></option>
                    <?php } 
                     while ($fetch = mysqli_fetch_array($query, MYSQLI_ASSOC)) { 
                        if ($fetch['id_gejala'] != $data['id_gejala']) {
                         
                    ?>
                    <option value="<?php echo $fetch['id_gejala']; ?>"><?php echo $fetch['id_gejala'].' '.$fetch['nama_gejala']; ?></option>
                <?php  }
                 }?>
            </select></td>                    
            </tr> 
             <tr>
                <td>Kode Penyakit</td>
                <td><?php 
                $sql1 = "SELECT * FROM penyakit";
                $query1 = mysqli_query($conn, $sql1);?>
                <select name="id_penyakit" class="form-control"  id= "id_penyakit">
                      <?php $kode1 = $data['id_penyakit'];
                    $a1 = "SELECT * FROM penyakit where id_penyakit= '$kode1'";
                $b1 = mysqli_query($conn, $a1); 
                while($f1 = mysqli_fetch_array($b1, MYSQLI_ASSOC)){?>
                    <option value="<?php echo $f1['id_penyakit']?>"><?php echo $f1['id_penyakit'].' '.$f1['nama_penyakit']?></option>
                    <?php } 
                    while ($fetch1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                        if ($fetch1['id_penyakit'] != $data['id_penyakit']) {
                          
                    ?>
                    <option value="<?php echo $fetch1['id_penyakit']; ?>"><?php echo $fetch1['id_penyakit'].' '.$fetch1['nama_penyakit']; ?></option>
                <?php   }
            }?>
            </select></td>                    
            </tr> 
            
            <tr>
                <td>Nilai CF</td>
                <td><input type="text" name="nilai_cf" value="<?php echo $data['nilai_cf'] ?>"></td>                    
            </tr> 
               
            <tr>
                <td></td>
                <td><button class="btn btn-primary" name='ubah'><i class="fa fa-save"></i> ubah</button></td>                 
            </tr>               
        </table>
    </form>
    <?php } ?>
</body>
<?php 


if(isset($_POST['ubah']))
{
    $cf = $_POST['nilai_cf'];
    if (($cf >= 0) and ($cf <= 1)) {
        $data = mysqli_query($conn,"select * from aturan where id_penyakit = '$_POST[id_penyakit]' and id_gejala = '$_POST[id_gejala]'");
$jmlh = mysqli_num_rows($data);
if ($jmlh == 0) {
   mysqli_query($conn,"UPDATE aturan SET id_penyakit='$_POST[id_penyakit]' , id_gejala ='$_POST[id_gejala]', nilai_cf ='$_POST[nilai_cf]' WHERE id_aturan='$_GET[id]' ");


echo '<script>alert("Data Berhasil Ditambahkan."); document.location="aturan.php";</script>';
}else{

echo '<script>alert("Data sudah ada!!"); document.location="aturan.php";</script>';
}
}else{

echo '<script>alert("Nilai CF harus lebih besar sama dengan 0 dan lebih kecil sama dengan 1!!"); document.location="aturan.php";</script>';

}

}
    // mysqli_query($conn,"UPDATE aturan SET id_penyakit='$_POST[id_penyakit]' , id_gejala ='$_POST[id_gejala]', nilai_cf ='$_POST[nilai_cf]' WHERE id_aturan='$_GET[id]' ");

    // echo '<script>alert("Data Berhasil Diubah.");</script>';
    // echo '<script>document.location="aturan.php";</script>';
    

?>

</div>
</div>
</div>
</div>
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>