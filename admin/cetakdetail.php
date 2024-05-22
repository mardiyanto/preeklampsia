<?php
include "../koneksi.php";
include "../config/fungsi_indotgl.php";
date_default_timezone_set('Asia/Jakarta');
session_start();
if($_SESSION['status'] != "administrator_logedin"){
  header("location:../login.php?alert=belum_login");
}
//menentukan hari
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $a_hari[date("N")];
//menentukan tanggal
$tanggal = date ("j");
//menentukan bulan
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $a_bulan[date("n")];
//menentukan tahun
$tahun = date("Y");
//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../tema/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Swiper CSS -->
<link href="../tema/vendor/swiper/css/swiper.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../tema/css/style.css" rel="stylesheet">
</head>
<body onLoad="window.print()">
<h1>Laporan Detail data Pasien</h1>
<?php $tebaru=mysqli_query($koneksi," SELECT * FROM pasien WHERE id_pasien=$_GET[id_pasien] ");
    $t=mysqli_fetch_array($tebaru); ?>
        <table class='table table-bordered table-striped'>
          <tr>
            <td >Nama Pasien </td>
            <td ><?php echo"$t[nama_pasien]"; ?></td>
            <td >Nik</td>
            <td ><?php echo"$t[nik]"; ?></td></td>
          </tr>
          <tr>
            <td>Umur</td>
            <td><?php echo"$t[umur_pasien]"; ?></td>
            <td>Nama Suami </td>
            <td><?php echo"$t[nama_suami]"; ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td colspan="3"><?php echo"$t[alamat_pasien]"; ?></td>
          </tr>
        </table>
        <h3>Data BMI Pasien <?php echo"$t[nama_pasien]"; ?></h3>
        <table id='example1' class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
<?php  $lite1=mysqli_query($koneksi," SELECT * FROM bmi WHERE id_pasien=$t[id_pasien] ");
           while ( $s1 = mysqli_fetch_array($lite1)) { 
            $s1['total_bmi'] = number_format($s1['total_bmi'], 1);
            $no++;  ?>
            <tbody>
            <tr><?php echo"   
                        <td>$no</td>
                        <td>$s1[tgl]</td>
                        <td>$s1[tb]</td>
                        <td>$s1[bb]</td>
                        <td>"; if ($t['bmi'] === "sudah") {
                           if ($s1['total_bmi'] >= 28.8) {
                               // echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#databmi$t[id_pasien]'>Preeklampsia</button>
                               // <button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>$s1[total_bmi]</button>";
                               echo"<a href='index.php?aksi=detailbmi&id_bmi=$s1[id_bmi]' class='btn btn-danger'>Preeklampsia</a>
                               <a href='index.php?aksi=detailbmi&id_bmi=$s1[id_bmi]' class='btn btn-danger'>$s1[total_bmi]</a>";
                               
                           } else {
                               // echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>Normal</button>
                               //      <button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>$s1[total_bmi]</button>";
                                    echo"<a href='index.php?aksi=detailbmi&id_bmi=$s1[id_bmi]' class='btn btn-success' >Normal</a>
                                    <a href='index.php?aksi=detailbmi&id_bmi=$s1[id_bmi]' class='btn btn-success' >$s1[total_bmi]</a>";
                           }
                         } else {
                            
                         } echo"</td>
                        <td>$s1[ket_bmi]</td> ";
                        ?>
            </tbody>
            </tr>
        <?php } ?>
        </table>

        <h3>Data MAP Pasien <?php echo"$t[nama_pasien]"; ?></h3>
        <table id='example1' class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl</th>
                    <th>Sistole</th>
                    <th>Distole</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
<?php  $lite2=mysqli_query($koneksi," SELECT * FROM map WHERE id_pasien=$t[id_pasien] ");
           while ( $s2 = mysqli_fetch_array($lite2)) {
            $s2['total_map'] = number_format($s2['total_map'], 1);
            $no++;  ?>
            <tbody>
            <tr><?php echo"   
                        <td>$no</td>
                        <td>$s2[tgl]</td>
                        <td>$s2[sistole]</td>
                        <td>$s2[diastole1]</td>
                        <td>"; if ($t['map'] === "sudah") {
                            if ($s2['total_map'] >= 90) {
                                // echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datamap$t[id_pasien]'>Preeklampsia</button>
                                // <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datamap$t[id_pasien]'>$s2[total_map]</button>";
                                echo"<a href='index.php?aksi=detailmap&id_map=$s2[id_map]' class='btn btn-danger'>Preeklampsia</a>
                                <a href='index.php?aksi=detailmap&id_map=$s2[id_map]' class='btn btn-danger'>$s2[total_map]</a>";
                            } else {
                                // echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#datamap$t[id_pasien]'>Normal</button>
                                // <button type='button' class='btn btn-success' data-toggle='modal' data-target='#datamap$t[id_pasien]'>$s2[total_map]</button>";
                                echo"<a href='index.php?aksi=detailmap&id_map=$s2[id_map]' class='btn btn-success' >Normal</a>
                                <a href='index.php?aksi=detailmap&id_map=$s2[id_map]' class='btn btn-success' >$s2[total_map]</a>";
                            }
                         } else {
                            
                         } echo"</td>
                        <td>$s2[ket_map]</td> ";
                        ?>
            </tbody>
            </tr>
        <?php } ?>
        </table>

        <h3>Data ROT Pasien <?php echo"$t[nama_pasien]"; ?></h3>
        <table id='example1' class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl</th>
                    <th>Diastole Terlentang</th>
                    <th>Diastole Miring</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
<?php   $lite3=mysqli_query($koneksi," SELECT * FROM rot WHERE id_pasien=$t[id_pasien] ");
       while ( $s3 = mysqli_fetch_array($lite3)) {
        $s3['total_rot'] = number_format($s3['total_rot'], 1);
            $no++;  ?>
            <tbody>
            <tr><?php echo"   
                        <td>$no</td>
                        <td>$s3[tgl]</td>
                        <td>$s3[terlentang]</td>
                        <td>$s3[miring]</td>
                        <td>";
                        if ($t['rot'] === "sudah") {
                      
                            if ($s3['total_rot'] >= 15) {
                                // echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datarot$t[id_pasien]'>Preeklampsia</button>
                                // <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datarot$t[id_pasien]'>$s3[total_rot]</button>";
                                echo"<a href='index.php?aksi=detailrot&id_rot=$s3[id_rot]' class='btn btn-danger'>Preeklampsia</a>
                                <a href='index.php?aksi=detailrot&id_rot=$s3[id_rot]' class='btn btn-danger'>$s3[total_rot]</a>";
                            } else {
                                // echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#datarot$t[id_pasien]'>Normal</button>
                                // <button type='button' class='btn btn-success' data-toggle='modal' data-target='#datarot$t[id_pasien]'>$s3[total_rot]</button>";
                                echo"<a href='index.php?aksi=detailrot&id_rot=$s3[id_rot]' class='btn btn-success' >Normal</a>
                                    <a href='index.php?aksi=detailrot&id_rot=$s3[id_rot]' class='btn btn-success' >$s3[total_rot]</a>";
                            }
                         
                          } else {
                           
                          }
                        echo"</td>
                        <td>$s2[ket_rot]</td> ";
                        ?>
            </tbody>
            </tr>
        <?php } ?>
        </table>
        
</body>
</html>
