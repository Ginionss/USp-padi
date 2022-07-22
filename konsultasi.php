<?php include 'config/config.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bethany Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets1/img/pd2.png" rel="icon">
  <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets1/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets1/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets1/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets1/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.7.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light-center"><a href="index.php"><span class="text-center" >SISTEM PAKAR TANAMAN PADI</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.php"><img src="assets1/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="index.php#tentang">Tentang</a></li>
            <li><a class="nav-link scrollto" href="index.php#diagnosis">Diagnosis</a></li>
            <li><a class="nav-link scrollto" href="index.php#profil">Profil Pakar</a></li>
            <li><a class="nav-link scrollto" href="index.php#kontak">kontak</a></li>
            <li><a class="getstarted scrollto" href="admin/login.php">Login</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <!-- .navbar -->

      </div><!-- End Header Container -->
       
    </div>

  </header><!-- End Header -->
 <main id="main">
    <br><br><br><br><br><br><h3 align="center" >Silahkan Pilih Gejala Yang Terlihat Pada Tanaman Padi</h3><br><br><br><br>
    <!-- ======= Team Section ======= -->
    
    <table class="table align-items-center table-flush" style="margin-top:-100px">
                        <thead class="thead-light">
                         <div class="row">
                         </div>
                        <div class="table-responsive" class="table table-bordered" ><br>
                          <tr align="center" >
                            <th scope="col">No</th>
                            <th scope="col">Kode Gejala</th>
                            <th scope="col" >Nama Gejala</th>
                            <th scope="col" >Pilih Kondisi</th>
                          </tr>

                          <?php 
                          $no = 1;

                          if(isset($_GET['id_gejala'])){
                            $tgl = $_GET['id_gejala'];
                            $sql = mysqli_query($conn,"select * from gejala where id_gejala='$tgl'");
                          }else{
                            $sql = mysqli_query($conn,"select * from gejala");
                          }
                          ?>
                          <form method="POST" action="hasil-konsultasi.php">
                            <?php
                            $index = 0;
                            while($data = mysqli_fetch_array($sql)){
                              ?>
                              <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['id_gejala']; ?></td>
                                <input type="hidden" name="selected[]" value="<?php echo $data['id_gejala']; ?>" >
                                <td align="center"><?php echo $data['nama_gejala']; ?></td>
                                <div class = "row">

                                 <td>
                                  <select name="nilai_gejala[]" >
                                    <option  value=""  selected />-</option>
                                    <option  value="0.4" />Kurang Yakin</option>
                                    <option value="0.6" />Cukup Yakin</option>
                                    <option  value="0.8" />Yakin</option>
                                    <option  value="1" />Sangat Yakin</option>
                                  </select>
                                </td>
                              </div>

                            <?php } ?>
                          </tr>
                          <td ><input class="btn btn-success" type="submit" name="Submit" value="Simpan"></td>
                        </form>
                   </table>
                 </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SISTEM PAKAR DIAGNOSIS HAMA & PENYAKIT TANAMAN PADI</span></strong>
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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

</html>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets1/vendor/purecounter/purecounter.js"></script>
  <script src="assets1/vendor/aos/aos.js"></script>
  <script src="assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets1/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets1/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets1/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets1/js/main.js"></script>

</body>

</html>