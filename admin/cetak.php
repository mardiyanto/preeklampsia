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
<?php echo"<h1>Laporan data Pasien</h1>
        <table id='example1' class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>BMI</th>
                    <th>MAP</th>
                    <th>ROT</th>
                </tr>
            </thead>
";
$no=0;
$tebaru = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC");
while ($t = mysqli_fetch_array($tebaru)) {
    $no++;    
    // Memeriksa apakah pengguna adalah admin atau memiliki id 1
    if ($_SESSION['user'] === 'admin' || $_SESSION['user_id'] == 1) {
        // Izinkan akses ke semua data
        // Lakukan sesuatu dengan data
        echo"<tbody>
        <tr>
            <td>$no</td>
            <td>$t[nama_pasien]</td> 
            <td>"; $lite1=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and pasien.id_pasien=$t[id_pasien] ");
            $s1=mysqli_fetch_array($lite1);

            if ($s1['total_bmi'] >= 28.8) {
                echo"<a class='btn btn-danger' href='index.php?aksi=editbmi&id_bmi=$s1[id_bmi]'>Preeklampsia</a>";
            } else {
                echo"<a class='btn btn-success' href='index.php?aksi=editbmi&id_bmi=$s1[id_bmi]'>Normal</a>";
            }
            echo"</td>
            <td>";  $lite2=mysqli_query($koneksi," SELECT * FROM map WHERE id_pasien=$t[id_pasien] ");
            $s2=mysqli_fetch_array($lite2);
            if ($s2['total_map'] >= 90) {
                echo"<a class='btn btn-danger' href='index.php?aksi=editmap&id_map=$s2[id_map]'>Preeklampsia</a>";
            } else {
                echo"<a class='btn btn-success' href='index.php?aksi=editmap&id_map=$s2[id_map]'>Normal</a>";
            }
            echo"</td>
            <td>";  $lite3=mysqli_query($koneksi," SELECT * FROM rot WHERE id_pasien=$t[id_pasien] ");
            $s3=mysqli_fetch_array($lite3);
            if ($s3['total_rot'] >= 15) {
                echo"<a  class='btn btn-danger' href='index.php?aksi=editrot&id_rot=$s3[id_rot]'>
                Preeklampsia
            </a>";
            } else {
                echo"<a  class='btn btn-success' href='index.php?aksi=editrot&id_rot=$s3[id_rot]' >Normal</a>";
            }
            echo"</td>
</tr> 
    </tbody>
    
    ";
    } else {
        // Jika bukan admin atau user dengan id 1,
        // maka periksa apakah id pengguna sama dengan id di data saat ini
        if ($_SESSION['id'] == $t['id_user']) {
            // Izinkan akses ke data yang sesuai dengan id pengguna
            // Lakukan sesuatu dengan data
            echo"<tbody>
            <tr>
                <td>$no</td>
                <td>$t[nama_pasien]</td> 
                <td>"; $lite1=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and pasien.id_pasien=$t[id_pasien] ");
                $s1=mysqli_fetch_array($lite1);

                if ($s1['total_bmi'] >= 28.8) {
                    echo"<a class='btn btn-danger' href='index.php?aksi=editbmi&id_bmi=$s1[id_bmi]'>Preeklampsia</a>";
                } else {
                    echo"<a class='btn btn-success' href='index.php?aksi=editbmi&id_bmi=$s1[id_bmi]'>Normal</a>";
                }
                echo"</td>
                <td>";  $lite2=mysqli_query($koneksi," SELECT * FROM map WHERE id_pasien=$t[id_pasien] ");
                $s2=mysqli_fetch_array($lite2);
                if ($s2['total_map'] >= 90) {
                    echo"<a class='btn btn-danger' href='index.php?aksi=editmap&id_map=$s2[id_map]'>Preeklampsia</a>";
                } else {
                    echo"<a class='btn btn-success' href='index.php?aksi=editmap&id_map=$s2[id_map]'>Normal</a>";
                }
                echo"</td>
                <td>";  $lite3=mysqli_query($koneksi," SELECT * FROM rot WHERE id_pasien=$t[id_pasien] ");
                $s3=mysqli_fetch_array($lite3);
                if ($s3['total_rot'] >= 15) {
                    echo"<a  class='btn btn-danger' href='index.php?aksi=editrot&id_rot=$s3[id_rot]'>
                    Preeklampsia
                </a>";
                } else {
                    echo"<a  class='btn btn-success' href='index.php?aksi=editrot&id_rot=$s3[id_rot]' >Normal</a>";
                }
                echo"</td>
</tr> 
        </tbody>
        ";
        } 
    }
}
        echo"</table>";
        ?>
</body>
</html>
