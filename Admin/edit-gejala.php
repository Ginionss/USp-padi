<?php include '../config/config.php' ?>

<<head>
  <link rel="stylesheet" type="text/css"  href="../assets/datatables.css">
  <script src="assets/jquery.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Gejala</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php include 'sitbar.php' ?>

  <main id="main" class="main">

    <div class="container-fluid mt--7">
<body>
    
    <h3>Edit Gejala</h3>
 
     <?php include '../config/config.php';
     
      
        $id = $_GET['id'];
        $sql = mysqli_query($conn,"select * from gejala where id_gejala='$id'");
      
      
      while($data = mysqli_fetch_array($sql)){
      ?>
   
    <form  method="post">        
        <table>
            <tr>
                <td>Kode Gejala</td>
                <td>
                    <input type="text" readonly name="id_gejala" value="<?php echo $data['id_gejala'] ?>">
                </td>                   
            </tr>
             <tr>   
            <tr>
                <td>Nama Gejala</td>
                <td><input type="text" name="nama_gejala" value="<?php echo $data['nama_gejala'] ?>"></td>                    
            </tr> 
            
             <tr>    
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
     $data = mysqli_query($conn,"select * from gejala where nama_gejala = '$_POST[nama_gejala]'");
$jmlh = mysqli_num_rows($data);
if ($jmlh == 0) {
    mysqli_query($conn,"UPDATE gejala SET nama_gejala ='$_POST[nama_gejala]'  WHERE id_gejala='$_GET[id]' ");

    echo '<script>alert("Data Berhasil Diubah.");</script>';
    echo '<script>document.location="gejala.php";</script>';
}else{


echo '<script>alert("Data sudah ada!!"); 
document.location="gejala.php";</script>';
}
}
?>

</div>
</div>
</div>
</div>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>