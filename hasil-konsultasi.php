<!DOCTYPE <?php  ?>>
<html lang="en">
<?php include 'config/config.php'; 


$selected = $_POST['selected'];
$nilaiuser = $_POST['nilai_gejala'];
$jumlah = count($selected);
$q=0;
if (mysqli_query($conn,"TRUNCATE TABLE temp"))
{
  for ($i=0; $i <$jumlah ; $i++)
  {
    if ($nilaiuser[$i] > 0)
    {
      mysqli_query($conn,"INSERT INTO temp (id_gejala, nilai_user) values ('$selected[$i]','$nilaiuser[$i]')");
      $q++;
    }
  }
}
if ($q <= 1 ) {
   echo '<script>alert("Silahkan Pilih minimal 2 Gejala!!");</script>';
    echo '<script>document.location="konsultasi.php";</script>';
}
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bethany Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->  
  <link href="assets1/img/pd2.png" rel="icon">
  <link href="assets1/img/logopadi.png" rel="apple-touch-icon">

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
</head><!-- ======= Header ======= -->
<body>
<br><br>
<br><br>

  <?php

  //mendapatkan nilai probabilitas gejala terhadap penyakit
  function get_data($selected = array(), $nilaiuser = array())
  {
    include 'config/config.php' ;
    $rows1 = mysqli_query($conn,"SELECT id_gejala, nilai_user FROM temp");
    $rows = mysqli_query($conn,"SELECT a.id_penyakit, a.id_gejala,  a.nilai_cf, t.id_gejala, t.nilai_user
      FROM aturan a INNER JOIN temp t WHERE a.id_gejala = t.id_gejala ORDER BY a.id_penyakit, a.id_gejala");
    $data = array();
    
    foreach($rows as $row)
    {
      $data[$row['id_penyakit']][$row['id_gejala']] = ($row['nilai_cf']*$row['nilai_user']);
    }
    return $data;
  }


  //perhitungan certainty factor
  function certainty($data = array(), $bobot = array())
  {
    //menghitung CF(H,E)
    $result = array();
    $CFHE = array();
    foreach($data as $key => $val)
    {
      $result['cf'][$key] = 0;
      foreach($val as $k => $v)
      {
        $result['cf'][$key] = ($v + ($result['cf'][$key] * (1-$v)));
      }
      $result['total'][$key] = $result['cf'][$key];
    }

    foreach($result['total'] as $key => $val)  
    {
      $result['hasil'][$key] = $val;
    }
    return $result;
  }
  ?>
  <!-- ======= Contact Section ======= -->
  <div class="main-content" style="margin:20px 20px 0px 20px">
    <div class="section-title text-success" align="">
        <h2>Hasil Konsultasi</h2>
    </div>
    <div class="col">
      <div class="card shadow">
        <div class="" style="margin : 20px">
          <div class="panel-heading">        
            <h3 class="panel-title text-success" >Gejala Terpilih</h3>
          </div>
          <table class="table table-bordered table-striped">
            <thead style="background: #3CB371 ;">
              <tr>
                <th>No</th>
                <th>Nama Gejala</th>
              </tr>
            </thead>
           <?php
            $no=1;
            $rows = mysqli_query($conn,"SELECT g.id_gejala, g.nama_gejala, t.id_gejala, t.nilai_user
              FROM gejala g INNER JOIN temp t WHERE g.id_gejala = t.id_gejala ORDER BY g.id_gejala");
            foreach($rows as $row):
              $gejala[$row['id_gejala']] = $row['nama_gejala'];
              ?>
              <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['nama_gejala']?></td>
              </tr>
            <?php endforeach;?>
          </table>
        </div>
      </div></div></div>
      <?php

      $rows = mysqli_query($conn,"SELECT * FROM penyakit ORDER BY id_penyakit");
      foreach($rows as $row){
        $penyakit[$row['id_penyakit']] = $row;
      }

      $data = get_data($selected);
      $certainty = certainty($data, $penyakit);

      ?>
      <div class="main-content" style="margin:10px 20px 20px 20px">
        <div class="col">
          <div class="card shadow">
            <div class="" style="margin : 20px">
              <div class="panel-heading">        
                <h3 class="panel-title">Hasil Diagnosis</h3>
              </div>
              <table class="table table-bordered table-striped">
                <thead style="background: #3CB371;">
                  <tr>
                    <th>Nama Penyakit</th>
                    <th>Gejala Dipilih</th>
                    <th>CF(H,E)</th>
                    <th>Presentase</th>
                  </tr>
                </thead>
                <?php foreach($data as $key => $val):?>
                  <tr>
                    <td style="vertical-align: middle;" rowspan="<?php echo count($val)?>"><?php echo $penyakit[$key]['nama_penyakit']?></td>       
                    <td><?php echo $gejala[key($val)]?></td>
                    <td><?php echo current($val)?></td>
                    <td rowspan="<?php echo count($val)?>"><?php echo round($certainty['cf'][$key]*100,3)?>%</td>
                  </tr>
                  <?php 
                  /** menghilangkan elemen pertama array tanpa menghilangkan key */
                  unset($val[key($val)]);

                  foreach($val as $k => $v):?>
                    <tr>
                      <td><?php echo $gejala[$k]?></td>
                      <td><?php echo $v?></td>
                    </tr>    
                  <?php endforeach?>      
                <?php endforeach?>
              </table>
              <div class="panel-body">     
                <p>
                  <?php
                  arsort($certainty['hasil']);
                  $persen = round(current($certainty['hasil'])*100,3);
                  ?>
                  Hasil Terbesar Didapatkan oleh Penyakit <strong><?php echo $penyakit[key($certainty['hasil'])]['nama_penyakit']?></strong> dengan Presentase <strong><?php echo $persen ?>%</strong>
                  <?php if($persen < 70){?>
                    <br><span class="text-danger"> SILAHKAN KONSULTASI KE PAKAR UNTUK MENDAPATKAN HASIL YANG LEBIH AKURAT!!!</span>
                  <?php }?>
                </p>   
                <p>
                  <?php
                  arsort($certainty['hasil']);
                  ?>
                  <!-- <strong>Deskripsi :</strong> <br><?php $penyakit[key($certainty['hasil'])]['deskripsi']?> <br><br> -->
                  <strong>Pengendalian :</strong> <br><?php echo $penyakit[key($certainty['hasil'])]['pengendalian']?>
                </p>        
                <p>
                  <a class="btn btn-success" href="Konsultasi.php"><span class="glyphicon glyphicon-refresh"></span> Konsultasi Lagi</a>
                  <a class="btn btn-warning" href="cetak.php?<?php http_build_query(array('selected'=>$selected))?>" target="_BLANK"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </p>       
              </div>
            </div></div></div></div>
          </div>
          <?php mysqli_query($conn,"INSERT INTO rekammedis (id_rekammedis, tgl, rp) values (NULL,  '".date('y/m/d')."' , '".$penyakit[key($certainty['hasil'])]['nama_penyakit']."')");?>
        </body>
        
        </html>