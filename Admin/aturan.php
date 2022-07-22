<?php include '../config/config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="../assets/datatables.css">
  <script src="assets/jquery.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aturan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?php include 'sitbar.php' ?>
  <i class="bi bi-list toggle-sidebar-btn"></i>

  <main id="main" class="main">

    <div class="container-fluid mt--7">

      <!-- Table -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="text-center">

            <a href="tambah-aturan.php"><button type="button" class="btn btn-success my-2"><i class="fa fa-plus"></i>Tambah Data</button></a>
          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Aturan</h5>
          <table class="table table-bordered">
            <thead>
              <tr align="center">
                <th scope="col">NO</th>
                <th scope="col">Kode Penyakit | Nama Penyakit</th>
                <th scope="col">Kode Gejala | Nama Gejala</th>
                <th scope="col">Nilai CF</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
            <?php
            $no = 1;

            if (isset($_GET['id_aturan'])) {
              $tgl = $_GET['id_aturan'];
              $sql = mysqli_query($conn, "select * from aturan where id_aturan='$tgl'");
            } else {
              $sql = mysqli_query($conn, "select * from aturan");
            }

            while ($data = mysqli_fetch_array($sql)) {
            ?>
              <tr class="gradeC" align="center">
                <td><?php echo $no++; ?></td>
                <td><?php
                    $idp = $data['id_penyakit'];
                    $sql2 = mysqli_fetch_array(mysqli_query($conn, "select * from penyakit where id_penyakit='$idp'"));
                    echo $data['id_penyakit'] . "|" . $sql2['nama_penyakit']; ?></td>
                <td><?php
                    $idg = $data['id_gejala'];
                    $sql3 = mysqli_fetch_array(mysqli_query($conn, "select * from gejala where id_gejala='$idg'"));
                    echo $data['id_gejala'] . "|" . $sql3['nama_gejala']; ?></td>
                <td><?php echo $data['nilai_cf']; ?></td>
                <td>
                  <a href="edit-aturan.php?&id=<?php echo $data['id_aturan']; ?>" class="btn btn-success" id="delete_multiple"><img src="../assets/img/pencil.svg"></a>
                  <a href="hapus-aturan.php?&id=<?php echo $data['id_aturan']; ?>" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger" id="delete_multiple"><img src="../assets/img/trash.svg"></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </table>
          <!-- End Bordered Table -->


          </form>
        </div>
      </div>
      <!-- Header -->
      <div class="header bg-gradient-black pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
              <div class="col-xl-3 col-lg-6">
              </div>
              <div class="col-xl-3 col-lg-6">
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
            </div>
          </div>
          <div class="col-xl-3 col-lg-6">
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">


    </div>

    </div>
    </section>

  </main><!-- End #main -->

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