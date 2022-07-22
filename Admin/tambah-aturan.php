<?php include '../config/config.php' ?>

<<head>
    <link rel="stylesheet" type="text/css" href="assets/datatables.css">
    <script src="assets/jquery.js"></script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tambah Aturan</title>
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
                            <h3 class="mb-0">Tambah Aturan</h3>
                        </div>
                        <div class="table-responsive">

                        </div>
                        <div class="main-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container mt--7">
                                        <form method="POST" action="tambah-aturan-aksi.php">

                                            <!-- <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kode Aturan</label>
                <?php
                $sql3 = "SELECT count(*) as jumlah FROM aturan";
                $query3 = mysqli_fetch_array(mysqli_query($conn, $sql3));
                $idbaru = $query3['jumlah'] + 1;
                if ($idbaru < 10) {
                    $idbaru = '0' . $idbaru;
                } else {
                    $idbaru = '' . $idbaru;
                }
                ?>
                <input type="text" class="form-control" disabled="true" name="id_cf" value="<?php echo $idbaru ?>">
            </div> -->
                                            <div class="search_select_box mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Kode Gejala</label>
                                                <?php
                                                $sql = "SELECT * FROM gejala";
                                                $query = mysqli_query($conn, $sql);
                                                ?>
                                                <select data-live-search="true" name="id_gejala" class="form-control" id="id_gejala">
                                                    <option value="">-PILIH-</option>
                                                    <?php
                                                    while ($fetch = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                                    ?>
                                                        <option value="<?php echo $fetch['id_gejala']; ?>"><?php echo $fetch['id_gejala'] . ' | ' . $fetch['nama_gejala']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <input type="text" class="form-control" name="id_gejala" placeholder="id Penyakit"> -->
                                            </div> <br>
                                            <div class="search_select_box mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Kode Penyakit</label>
                                                <?php
                                                $sql1 = "SELECT * FROM Penyakit";
                                                $query1 = mysqli_query($conn, $sql1);
                                                ?>
                                                <select data-live-search="true" name="id_penyakit" class="form-control" id="id_penyakit">
                                                    <option value="">-PILIH-</option>
                                                    <?php
                                                    while ($fetch1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                                                    ?>
                                                        <option value="<?php echo $fetch1['id_penyakit']; ?>"><?php echo $fetch1['id_penyakit'] . ' | ' . $fetch1['nama_penyakit']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!--  <input type="text" class="form-control" name="id_penyakit" placeholder="id Penyakit"> -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Nilai Cf</label>
                                                <input type="double" class="form-control" name="nilai_cf" placeholder="Nilai Cf">
                                            </div>
                                            <input type="submit" name="Submit" value="Simpan">
                                        </form>
                                    </div>
                                </div>

                                <!-- <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Kode Penyakit</label>
                <input type="text" class="form-control" name="id_penyakit" placeholder="kode penyakit">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Kode Gejala</label>
                <input type="text" class="form-control" name="id_gejala" placeholder="kode gejala">
            </div>
             <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Nilai CF</label>
                <input type="decimal" class="form-control" name="nilai_cf" placeholder="nilai cf">
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
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/chart.js/chart.min.js"></script>
        <script src="assets/vendor/echarts/echarts.min.js"></script>
        <script src="assets/vendor/quill/quill.min.js"></script>
        <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.search_select_box mb-3 select').selectpicker();
            })
        </script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

        </body>