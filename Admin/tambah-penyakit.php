<?php include '../config/config.php' ?>

<<head>
  <link rel="stylesheet" type="text/css"  href="assets/datatables.css">
  <script src="assets/jquery.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hama dan Penyakit Padi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php include 'sitbar.php' ?>

  <main id="main" class="main">

    <div class="container-fluid mt--7">

    <!-- Table -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header border-">
            <h3 class="mb-0">Tambah Data Hama dan Penyakit</h3>
          </div>
          <div class="table-responsive">
            
             </div>
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
    <div class="container mt--7">
        <form method="POST" action="tambah-penyakit-aksi.php">

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kode penyakit</label>
                <?php 
                $sql3 = "SELECT count(*) as jumlah FROM penyakit";
                $query3 = mysqli_fetch_array(mysqli_query($conn, $sql3));
                $idbaru = $query3['jumlah'] +1;
                if ($idbaru < 10) {
                    $idbaru = 'P0'.$idbaru;
                }else{
                    $idbaru = 'P'.$idbaru;

                }
                ?>
                <input type="text" class="form-control" disabled= "true"  name="id_penyakit" value="<?php echo $idbaru; ?>" >
               <!--  <input type="text" class="form-control" name="id_penyakit" placeholder="id penyakit"> -->
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Nama Penyakit</label>
                <input type="text" class="form-control" name="nama_penyakit" placeholder="nama Penyakit">
            </div>
            
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Pengendalian</label>
                <input type="text" class="form-control" name="pengendalian" placeholder="pengendalian">
            </div>
            <input type="submit" name="Submit" value="Simpan">
        </form>
    </div>
</div>


            <!-- <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kode Hama dan Penyakit</label>
                <input type="text" class="form-control" name="id_penyakit" placeholder="kode penyakit">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Nama Hama dan Penyakit</label>
                <textarea type="text" class="form-control" name="nama_penyakit" placeholder="nama penyakit"></textarea> 
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Pengendalian</label>
                <textarea type="text" class="form-control" name="pengendalian" placeholder="pengendalian"></textarea> 
            </div>
            <input type="submit" name="Submit" value="Simpan">
        </form>
    </div>
</div> -->
</div>
</div>
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