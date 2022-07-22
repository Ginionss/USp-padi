<?php include '../config/config.php' ?>

<<head>
  <link rel="stylesheet" type="text/css"  href="assets/datatables.css">
  <script src="assets/jquery.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penyakit - Hama dan Penyakit Padi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php include 'sitbar.php' ?>

  <main id="main" class="main">

    <div class="container-fluid mt--7">
<body>
    
    <h3>Edit data Penyakit</h3>
 
     <?php include '../config/config.php';
     
      
        $id = $_GET['id'];
        $sql = mysqli_query($conn,"select * from penyakit where id_penyakit='$id'");
      
      
      while($data = mysqli_fetch_array($sql)){
      ?>
   
    <form  method="post">        
        <table>
            <tr>
                <td>kode </td>
                <td>
                    <input type="text" readonly name="id_penyakit" value="<?php echo $data['id_penyakit'] ?>">
                </td>                   
            </tr>
             <tr>   
            <tr>
                <td>Nama penyakit</td>
                <td><input type="text" name="nama_penyakit" value="<?php echo $data['nama_penyakit'] ?>"></td>                    
            </tr> 
             <tr>
                <td>Pengendalian</td>
                <td><textarea  name="pengendalian" style="width: 500px;" ><?php echo $data['pengendalian'] ?></textarea></td>                    
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
     $data = mysqli_query($conn,"select * from penyakit where nama_penyakit = '$_POST[nama_penyakit]'");
$jmlh = mysqli_num_rows($data);
if ($jmlh == 0) {
    mysqli_query($conn,"UPDATE penyakit SET id_penyakit='$_POST[id_penyakit]' , nama_penyakit ='$_POST[nama_penyakit]' , pengendalian ='$_POST[pengendalian]'  WHERE id_penyakit='$_GET[id]' ");

    echo '<script>alert("Data Berhasil Diubah.");</script>';
    echo '<script>document.location="penyakit.php";</script>';
}else{
    header('penyakit.php');

echo '<script>alert("Data yang anda tambahkan sudah ada!!"); document.location="penyakit.php";</script>';
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