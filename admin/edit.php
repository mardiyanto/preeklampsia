<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='proseseditpasien'){
mysqli_query($koneksi,"UPDATE pasien SET nama_pasien='$_POST[nama_pasien]',nama_suami='$_POST[nama_suami]',umur_pasien='$_POST[umur_pasien]',
alamat_pasien='$_POST[alamat_pasien]' WHERE id_pasien='$_GET[id_pasien]'");
echo "<script>window.location=('index.php?aksi=pasien')</script>";
}
elseif($_GET['aksi']=='proseseditbmi'){
	$tb=$_POST['tb']/100;
	$kuadrat_tb = $tb * $tb;
	$bb=$_POST['bb'];
	$total=$bb/$kuadrat_tb;
	mysqli_query($koneksi,"UPDATE bmi SET bb='$_POST[bb]',tb='$_POST[tb]',total_bmi='$total' WHERE id_bmi='$_GET[id_bmi]'");
	echo "<script>window.location=('index.php?aksi=bmi')</script>";
}
elseif($_GET['aksi']=='proseseditmap'){
	$diastole=$_POST['diastole'];
	$plus_diastole = $diastole + $diastole;
	$sistole=$_POST['sistole'];
	$total=($sistole + $plus_diastole) / 3;
	mysqli_query($koneksi,"UPDATE map SET sistole='$_POST[sistole]',diastole1='$_POST[diastole]',diastole2='$_POST[diastole]',total_map='$total' WHERE id_map='$_GET[id_map]'");
echo "<script>window.location=('index.php?aksi=map')</script>";
}
elseif($_GET['aksi']=='proseseditrot'){
	$terlentang=$_POST['terlentang'];
	$miring=$_POST['miring'];
	$total=$terlentang-$miring;
	mysqli_query($koneksi,"UPDATE rot SET terlentang='$_POST[terlentang]',miring='$_POST[miring]', total_rot='$total' WHERE id_rot='$_GET[id_rot]'");
echo "<script>window.location=('index.php?aksi=rot')</script>";
}
elseif($_GET['aksi']=='proseseditpertanyaan'){
	mysqli_query($koneksi,"UPDATE pertanyaan SET nama_pertanyaan='$_POST[nama_pertanyaan]', keterangan='$_POST[keterangan]', status_pertanyaan='$_POST[status_pertanyaan]' WHERE id_pertanyaan='$_GET[id_pertanyaan]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('index.php?aksi=pertanyaan')</script>";
}
elseif($_GET['aksi']=='proseseditjawaban'){
	mysqli_query($koneksi,"UPDATE jawaban SET nama_jawaban='$_POST[nama_jawaban]', id_pertanyaan='$_POST[id_pertanyaan]', nilai_jawaban='$_POST[nilai_jawaban]' WHERE id_jawaban='$_GET[id_jawaban]'");
	echo "<script>window.alert('Data Berhasil di edit dan disimpan');
	window.location=('index.php?aksi=jawaban')</script>";
}
elseif($_GET['aksi']=='proseseditadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);
// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username' where user_id='$_GET[user_id]'");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
			echo "<script>window.location=('index.php?aksi=admin')</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_foto='$x' where user_id='$_GET[user_id]'");		
			echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_password='$password' where user_id='$_GET[user_id]'");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}
}

elseif($_GET['aksi']=='proseseditprofil'){
    mysqli_query($koneksi,"UPDATE profil SET nama='$_POST[nama]',alias='$_POST[alias]' WHERE id_profil ='$_GET[id_profil]'"); 
echo "<script>window.location=('index.php?aksi=kadis')</script>";
}

?>