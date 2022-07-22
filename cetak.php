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


  //perhitungan naive certainty
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
  
<br>
<strong><h3 align="center">Hasil Diagnosis</h3></strong><br>
<?php
include 'config/config.php';
$selected = null;
$rows = mysqli_query($conn, "SELECT id_gejala, nama_gejala FROM gejala ");
?>
<br>
<h3>Gejala Terpilih</h3>
<table class="table table-bordered table-striped">
            <thead style="background: #3CB371;">
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
        <?php

$rows = mysqli_query($conn, "SELECT * FROM penyakit ORDER BY id_penyakit");
foreach($rows as $row){
    $penyakit[$row['id_penyakit']] = $row;
}

$data = get_data($selected);
$certainty = certainty($data, $penyakit);
   
?>
<head>
   <!-- Favicons -->
  <link href="assets1/img/favicon.png" rel="icon">
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

</head>
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
                    <td rowspan="<?php echo count($val)?>"><?php echo round($certainty['cf'][$key]*100,1)?>%</td>
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
<?php
    arsort($certainty['hasil']);
?>



<p>Hasil Terbesar Didapatkan oleh Penyakit <strong><?php echo $penyakit[key($certainty['hasil'])]['nama_penyakit']?></strong> dengan Presentase <strong><?php echo round(current($certainty['hasil'])*100,3)?>%</strong>
<p>
                <?php
                arsort($certainty['hasil']);
                ?>
                 <strong>Pengendalian :</strong> <br><?php echo $penyakit[key($certainty['hasil'])]['pengendalian']?>
            </p>  
<script>
    window.print();
</script>
