<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }

///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='inputpasien'){
	mysqli_query($koneksi,"insert into pasien (nama_pasien,nama_suami,umur_pasien,alamat_pasien) values ('$_POST[nama_pasien]','$_POST[nama_suami]','$_POST[umur_pasien]','$_POST[alamat_pasien]')");  
	echo "<script>window.location=('index.php?aksi=pasien')</script>";
}
elseif($_GET['aksi']=='inputbmi'){
	$tb=$_POST['tb']/100;
	$kuadrat_tb = $tb * $tb;
	$bb=$_POST['bb'];
	$total=$bb/$kuadrat_tb;

	mysqli_query($koneksi,"insert into bmi (id_pasien,bb,tb,total_bmi) values ('$_POST[id_pasien]','$bb','$_POST[tb]','$total')");  
echo "<script>window.location=('index.php?aksi=bmi')</script>";
}
elseif($_GET['aksi']=='inputmap'){
	$diastole=$_POST['diastole'];
	$plus_diastole = $diastole + $diastole;
	$sistole=$_POST['sistole'];
	$total=($sistole + $plus_diastole) / 3;

	mysqli_query($koneksi,"insert into map (id_pasien,sistole,diastole1,diastole2,total_map) values ('$_POST[id_pasien]','$sistole','$diastole','$diastole','$total')");  
echo "<script>window.location=('index.php?aksi=bmi')</script>";
}
elseif($_GET['aksi']=='inputkecamatan'){
	mysqli_query($koneksi,"insert into kecamatan (nama_kecamatan) values ('$_POST[nama_kecamatan]')");  
echo "<script>window.location=('index.php?aksi=kecamatan')</script>";
}
//////////////////////////////tps/////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputtps'){
	mysqli_query($koneksi,"insert into tps (id_kecamatan,id_desa,no_tps) values ('$_POST[id_kecamatan]','$_POST[id_desa]','$_POST[no_tps]')");  
echo "<script>window.location=('index.php?aksi=tps')</script>";
}
elseif ($_GET['aksi'] == 'inputsuarapasien') {
    // Validasi combo box
    if (!isset($_POST['id_kecamatan']) || empty($_POST['id_kecamatan']) ||
        !isset($_POST['id_desa']) || empty($_POST['id_desa']) ||
        !isset($_POST['id_tps']) || empty($_POST['id_tps']) ||
        !isset($_POST['id_pasien']) || empty($_POST['id_pasien']) ||
        !isset($_POST['suara_sah']) || empty($_POST['suara_sah']) ) {
        // Redirect jika ada data yang kosong
        echo "<script>alert('Harap lengkapi semua data');</script>";
        echo "<script>window.location=('index.php?aksi=tps');</script>";
        exit; // Menghentikan eksekusi kode selanjutnya
    }

    // Eksekusi query SQL untuk menambahkan data
    mysqli_query($koneksi, "INSERT INTO suara (id_kecamatan, id_desa, id_tps, id_pasien, suara_sah, suara_rusak) VALUES ('$_POST[id_kecamatan]', '$_POST[id_desa]', '$_POST[id_tps]', '$_POST[id_pasien]', '$_POST[suara_sah]', '$_POST[suara_rusak]')");

    // Redirect ke halaman index.php?aksi=tps setelah berhasil menambahkan data
    echo "<script>window.location=('index.php?aksi=tps');</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputmenu'){
	mysqli_query($koneksi,"insert into menu (nama_menu,link,link_b,status,icon_menu,aktif) values ('$_POST[nama_menu]','$_POST[link]','$_POST[link_b]','$_POST[status]','$_POST[icon_menu]','$_POST[aktif]')");  
echo "<script>window.location=('index.php?aksi=menu')</script>";
}
elseif($_GET['aksi']=='inputsubmenu'){
	mysqli_query($koneksi,"insert into submenu (id_menu,nama_sub,link_sub,icon_sub) values ('$_POST[id_menu]','$_POST[nama_sub]','$_POST[link_sub]','$_POST[icon_sub]')");  
echo "<script>window.location=('index.php?aksi=submenu')</script>";
}
elseif($_GET['aksi']=='inputgolongan'){
	mysqli_query($koneksi,"insert into golongan (nama_gol) values ('$_POST[nama_gol]')");  
echo "<script>window.location=('index.php?aksi=golongan')</script>";
}
elseif($_GET['aksi']=='inputjabatan'){
	mysqli_query($koneksi,"insert into jabatan (nama_jabatan) values ('$_POST[nama_jabatan]')");  
echo "<script>window.location=('index.php?aksi=jabatan')</script>";
}
elseif($_GET['aksi']=='inputprofesi'){
	mysqli_query($koneksi,"insert into profesi (nama_profesi) values ('$_POST[nama_profesi]')");  
echo "<script>window.location=('index.php?aksi=profesi')</script>";
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