<?php
session_start();
echo "<pre>";
print_r($_POST);
echo "</pre>";
include 'config/config.php';
if(isset($_POST['Submit'])){
      
      // tabel rekammedis
        $idrm    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id_rekammedis) as 'ID' FROM rekammedis"));
        $id = $idrm['ID'] + 1;
        $_SESSION['log_id'] = $id;
echo "string";
echo $id;
        //$idpasien = $_SESSION['id'];
        $tgl = date('y-m-d');

        $rm = mysqli_query($conn, "INSERT INTO rekammedis (id_rekammedis, tgl) VALUES ('$id', '$tgl')");

        ///////////////////(FC)/////////////////////////////////
        //tabel true
        //Proses Memasukkan Gejala Ke Dalam tbl_gtrue
        //PGS = POST Gejala yang true (singular)
        $x = 0;
        $a = 0;
        foreach ($_POST['gejala'] as $NU ) {
            $gjl = $NU; 
            echo $gjl;
            if (isset($_POST['nama_gejala'][$gjl])) {

                // echo $_POST['id_gejala'][$x]; echo "f<br>";
                $NUT[] = $_POST['nama_gejala'][$gjl];
                $IDT[] = $NU;
              
            echo "<br>";
            }
             $x++;
        }
        $xx=0;
      foreach ($NUT as $PGS) 
        {
            $tbltrue  = mysqli_query($conn, "INSERT INTO `true`(`id_rekammedis`, `id_gejala`, `nilai_user`) VALUES ('$id',
             '$IDT[$xx]',
              '$NUT[$xx]')");

            $xx++;
        }

        //Proses Menampilkan Gejala True
        //AGT   = Array Penampung Gejala True
        //J_AGT = Jumlah Elemen pada AGT_ida
        $q2_tgtrue   = mysqli_query($conn, "SELECT * FROM `true` WHERE id_rekammedis = '$id'");

        while ($AGT_row = mysqli_fetch_array($q2_tgtrue)) 
        {
            $AGT[]   = $AGT_row["id_gejala"];
            $AGT_cfu[] = $AGT_row["nilai_user"];
        }

        $q2_atr   = mysqli_query($conn, "SELECT * FROM aturan");
        while ($ATT = mysqli_fetch_array($q2_atr)) 
        {
            $ATR[]   = $ATT["id_cf"];
            $ATR_idg[] = $ATT["id_gejala"];
            $ATR_cf[] = $ATT["nilai_cf"];
            $ATR_idp[] = $ATT['id_penyakit'];
        }
        /////////////////////////(CF (H,e))////////////////////////////
        // $J_Aturan = jumlah data pada tabel aturan
        // $J_true = jumlah data pada tabel true
        //$i = perulangan data pada tabel aturan dari 0 - 79
        //$j = perulangan pada tabel true 0 - jumlah geala yang dipilih (n-1)
        //$den = hasil nilai pakar * nilai user
        $J_Aturan = count($ATR);
       echo $J_Aturan ; echo "<br>";
        $J_true = count($AGT);
     for ($k=0; $k < $J_Aturan ; $k++) { 
        for ($i=0; $i < $J_true ; $i++) { 
            if ($ATR_idg[$k] == $AGT[$i] ) {  
             $den[$k] = $AGT_cfu[$i] * $ATR_cf[$k]; 
             echo $k . ") " .   $AGT_cfu[$i] . "*" . $ATR_cf[$k] . " = " .  $den[$k] ; echo "<br>";
            }   
            
        }
             echo "Nilai Den [" . $k . "] = " .  $den[$k] ; echo "<br>";
             echo "=================================="; echo "<br>";
    }
        $J_den = count($den); // jumalh nilai $den
        /////////////////////////(CF Combine)////////////////////////////
        $pen   = mysqli_query($conn, "SELECT id_penyakit FROM penyakit ");
       $jum_pen = mysqli_num_rows($pen);
       echo "jum pen =" .$jum_pen;echo "<br>";
       while ($AGT_pen = mysqli_fetch_assoc($pen)) 
        {
            $idpen[]   = $AGT_pen["id_penyakit"];
        }
        $idpenya = 0;
        $PK = 0;

        for ($i=0; $i < $jum_pen ; $i++) { 
            $CFc[$i] = 0;
            echo "========================"; echo "<br>"; 
            echo $idpen[$i];echo "<br>"; 
            echo "--------------------------"; echo "<br>"; echo $i;
            
            $idpa = mysqli_query($conn, "SELECT id_cf FROM aturan WHERE id_penyakit = '$idpen[$i]' ");
            while ($AAA_idpa = mysqli_fetch_assoc($pen)) 
            {
            $AAA_idpc[]   = $AAA_idpa["id_cf"];
             }
            echo "<br>";
            for ($j=0; $j < $J_den ; $j++) { 
                    if ( ) {
                       
                        if ($CFc[$i] == 0) {
                             $CFc[$i] = $den[$j];
                        }else{
                             $CFc[$i]= $CFc[$i];
                         }
                    echo $CFc[$i]; 
                     $CFc[$i] = $CFc[$i] + $den[$j+1] * (1- $CFc[$i]);
                    echo "+";
                    echo $den[$j+1];
                    echo "*";
                    echo (1- $den[$j+1]);
                        echo "=";
                    echo $CFc[$i];   
                    echo "<br>"; 
                    }
                }     

          
            // $pk [$i] = $CFc[$i]* (100);
             //   if ($PK < $pk[$i]) {
              //      $PK = $pk[$i];
              //      $idpenya = $idpen[$i];
             //   }
    //echo "++++++++++++++++++++++";
   //echo $PK;
   //echo "=";
     //   echo $idpenya;
     //   echo "<BR>";
        
            
        }

     
            $kep = mysqli_query($conn, "INSERT INTO keyakinan (id_rekammedis,
             id_penyakit, 
             presentasi) VALUES 
             ('$id',
             '$idpenya', 
             '$PK')");
        


        // header('hasil-konsultasi.php');

        // echo '<script>alert("Data Berhasil Ditambahkan."); 
        // document.location="hasil-konsultasi.php";</script>';

    
}
