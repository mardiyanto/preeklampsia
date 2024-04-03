<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='inputpasien'){
	mysqli_query($koneksi,"insert into pasien (nama_pasien,nama_suami,umur_pasien,alamat_pasien,id_user) 
	values ('$_POST[nama_pasien]','$_POST[nama_suami]','$_POST[umur_pasien]','$_POST[alamat_pasien]','$_SESSION[id]')");  
	$id_pasien_baru = mysqli_insert_id($koneksi);
	
	$tb=$_POST['tb']/100;
	$kuadrat_tb = $tb * $tb;
	$bb=$_POST['bb'];
	$total1=$bb/$kuadrat_tb;
	 mysqli_query($koneksi,"insert into bmi (id_pasien,bb,tb,total_bmi) values ('$id_pasien_baru','$bb','$_POST[tb]','$total1')");  

	$terlentang=$_POST['terlentang'];
	$miring=$_POST['miring'];
	$total2=$terlentang-$miring;
	mysqli_query($koneksi,"insert into rot (id_pasien,terlentang,miring,total_rot) values ('$id_pasien_baru','$terlentang','$miring','$total2')"); 
	
	$diastole=$_POST['diastole'];
	$plus_diastole = $diastole + $diastole;
	$sistole=$_POST['sistole'];
	$total3=($sistole + $plus_diastole) / 3;
	mysqli_query($koneksi,"insert into map (id_pasien,sistole,diastole1,diastole2,total_map) values ('$id_pasien_baru','$sistole','$diastole','$diastole','$total3')");   
	mysqli_query($koneksi,"UPDATE pasien SET bmi='sudah',map='sudah',rot='sudah'  WHERE id_pasien='$id_pasien_baru'");

	echo "<script>window.location=('index.php?aksi=detailpasien&id_pasien=$id_pasien_baru')</script>";
}
elseif($_GET['aksi']=='inputbmi'){
	$tb=$_POST['tb']/100;
	$kuadrat_tb = $tb * $tb;
	$bb=$_POST['bb'];
	$total=$bb/$kuadrat_tb;

	mysqli_query($koneksi,"insert into bmi (id_pasien,bb,tb,total_bmi) values ('$_POST[id_pasien]','$bb','$_POST[tb]','$total')");  
	mysqli_query($koneksi,"UPDATE pasien SET bmi='sudah' WHERE id_pasien='$_POST[id_pasien]'");
echo "<script>window.location=('index.php?aksi=detailpasien&id_pasien=$_POST[id_pasien]')</script>";
}
elseif($_GET['aksi']=='inputmap'){
	$diastole=$_POST['diastole'];
	$plus_diastole = $diastole + $diastole;
	$sistole=$_POST['sistole'];
	$total=($sistole + $plus_diastole) / 3;

	mysqli_query($koneksi,"insert into map (id_pasien,sistole,diastole1,diastole2,total_map) values ('$_POST[id_pasien]','$sistole','$diastole','$diastole','$total')");  
	
	mysqli_query($koneksi,"UPDATE pasien SET map='sudah' WHERE id_pasien='$_POST[id_pasien]'");
echo "<script>window.location=('index.php?aksi=detailpasien&id_pasien=$_POST[id_pasien]')</script>";
}

elseif($_GET['aksi']=='inputrot'){
	$terlentang=$_POST['terlentang'];
	$miring=$_POST['miring'];
	$total=$terlentang-$miring;
	mysqli_query($koneksi,"insert into rot (id_pasien,terlentang,miring,total_rot) values ('$_POST[id_pasien]','$terlentang','$miring','$total')");  

	mysqli_query($koneksi,"UPDATE pasien SET rot='sudah' WHERE id_pasien='$_POST[id_pasien]'");
echo "<script>window.location=('index.php?aksi=detailpasien&id_pasien=$_POST[id_pasien]')</script>";
}

elseif($_GET['aksi']=='inputadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','')");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		echo "<script>alert('Gagal ');</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','$file_gambar')");
		echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}
}
if($_GET['aksi']=='inputpegawai'){
	$kalimat = $_POST['nip'];
    $sub_kalimat = substr($kalimat,0,8);
	$username = $sub_kalimat;
    $password = md5($sub_kalimat);	
mysqli_query($koneksi,"insert into pegawai (nama_pegawai,nip,tgl_lahir,status,tingkat,jenis_kelamin,jurusan,gol,username,password,status_pg,status_kk) 
values ('$_POST[nama_pegawai]','$_POST[nip]','$_POST[tgl_lahir]','$_POST[status]','$_POST[tingkat]','$_POST[jenis_kelamin]','$_POST[jurusan]','$_POST[gol]','$username','$password','baru','baru')");  
echo "<script>window.location=('index.php?aksi=pegawai')</script>";
}
elseif($_GET['aksi']=='inputkeluarga'){
	mysqli_query($koneksi,"insert into keluarga (id_pegawai,nama_keluarga,jk_keluarga,tempatlahir_keluarga,tgllahir_keluarga,status_keluarga,pekejaan_keluarga,pendidikan_keluarga,penghasilan_keluarga,ket_keluarga,tunjang_status,tgl_mati,status_nikah,status_beasiswa,anak_angkat_status,status_sekolah,status_aktif) 
	values ('$_POST[id_pegawai]','$_POST[nama_keluarga]','$_POST[jk_keluarga]','$_POST[tempatlahir_keluarga]','$_POST[tgllahir_keluarga]','$_POST[status_keluarga]','$_POST[pekejaan_keluarga]','$_POST[pendidikan_keluarga]','$_POST[penghasilan_keluarga]','$_POST[ket_keluarga]','$_POST[tunjang_status]','$_POST[tgl_mati]','$_POST[status_nikah]','$_POST[status_beasiswa]','$_POST[anak_angkat_status]','$_POST[status_sekolah]','$_POST[status_aktif]')");  
	mysqli_query($koneksi,"UPDATE pegawai SET status_pg='ada' WHERE id_pegawai='$_POST[id_pegawai]'");
	echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$_POST[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='inputtunjangan'){
	mysqli_query($koneksi,"insert into tunjangan (id_pegawai,t_status) 
	values ('$_GET[id_pegawai]','baru')");
	mysqli_query($koneksi,"UPDATE pegawai SET status_pg='kk ada' WHERE id_pegawai='$_GET[id_pegawai]'"); 
echo "<script>window.location=('index.php?aksi=tunjangan')</script>";
}
elseif($_GET['aksi']=='inputpangku'){
	mysqli_query($koneksi,"insert into pemangku (nama_pkjab) 
	values ('$_POST[nama_pkjab]')");
echo "<script>window.location=('index.php?aksi=pangku')</script>";
}
elseif($_GET['aksi']=='inputpangkujabatan'){
	mysqli_query($koneksi,"insert into pemangkujabatan (id_pegawai,id_pkjab,nomor_surat,tanggal_surat) 
	values ('$_POST[id_pegawai]','$_POST[id_pkjab]','$_POST[nomor_surat]','$_POST[tanggal_surat]')");
echo "<script>window.location=('index.php?aksi=pangkujabatan')</script>";
}
?>