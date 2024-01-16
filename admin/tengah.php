<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
echo"
 <div class='row'>
                   <div class='col-lg-12'>
			<div class='panel panel-default'>
                            <div class='panel-heading'>
                           Sambutan
                            </div>
                            <div class='panel-body'>                         
				<p>Selamat Datang Di halaman Admin, Silahkan Pilih menu untuk pengaturan data yang di butuhkan guna mendapatkan hasil yang maksimal sesuai keinginan.</p>
                            </div>
			</div>
                   </div>
</div>";
include "grafik.php";
echo"<div class='row'>
                    <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI</h3>
                </div>
                <div class='box-header'>
				</div>
     <div class='box-body'>";
     $main=mysqli_query($koneksi,"SELECT * FROM submenu");

     while($r=mysqli_fetch_array($main)){           
     echo"<a href='$r[link_sub]' class='btn btn-app'>
                    <span class='badge bg-yellow'>3</span>
                    <i class='fa $r[icon_sub] fa-5x'></i> $r[nama_sub]
                  </a>";
                }           
                echo "

            </div>
			</div>
 </div>
			</div>
";
}
elseif($_GET['aksi']=='ikon'){
include "../ikon.php";
}
elseif($_GET['aksi']=='pasien'){
    echo"
    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                Data pasien
                            </div>
                            <div class='panel-body'>
                                <ul class='nav nav-pills'>
                                    <li class='active'><a href='#home-pills' data-toggle='tab'>Data pasien</a>
                                    </li>
                                    <li><a href='#profile-pills' data-toggle='tab'>Input pasien</a>
                                    </li>
                                   
                                </ul>
    
                                <div class='tab-content'>
                                    <div class='tab-pane fade in active' id='home-pills'>
                                        <h4>Data pasien </h4>
                                       
                       <div class='panel-body'>
                                <div class='table-responsive'>
                                    <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>BMI</th>
                                                <th>MAP</th>
                                                <th>ROT</th>
                                                <th>Nama Suami</th>
                                            </tr>
                                        </thead>
                        ";
                        $no=0;
                    $tebaru=mysqli_query($koneksi," SELECT * FROM pasien ORDER BY id_pasien DESC ");
    while ($t=mysqli_fetch_array($tebaru)){
                  
    $no++;    
                                        echo"<tbody>
                                            <tr>
                                                <td>$no</td>
                                                <td>$t[nama_pasien]</td> 
                                                <td>";
                                                if ($t['bmi'] === "sudah") {
                                                    echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>Data BMI</button>"; 
                                                } else {
                                                    echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#bmi$t[id_pasien]'>BMI</button>";  
                                                }
                                                echo"</td> 
                                                <td>";
                                                if ($t['map'] === "sudah") {
                                                    echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#datamap$t[id_pasien]'>Data MAP</button>"; 
                                                } else {
                                                    echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#map$t[id_pasien]'>MAP</button>";  
                                                }
                                                echo"</td> 
                                                <td>";
                                                if ($t['rot'] === "sudah") {
                                                    echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#datarot$t[id_pasien]'>Data ROT</button>"; 
                                                } else {
                                                    echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#rot$t[id_pasien]'>ROT</button>";  
                                                }
                                                echo"</td> 
                                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>ubah</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editpasien&id_pasien=$t[id_pasien]'>edit</a></li>
                            <li><a href='hapus.php?aksi=hapuspasien&id_pasien=$t[id_pasien]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\">hapus</a></li>
                          </ul>
                        </div></td>
                        </tr>

                        <div class='modal fade' id='bmi$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                    <h4 class='modal-title' id='H3'>Input Data $t[id_pasien]</h4>
                                </div>

                                <div class='modal-body'>
                                    <div class='form-group'>
                                         <form role='form' method='post' action='input.php?aksi=inputbmi'>
                                         <label>Berat Badan</label>
                                         <input type='hidden' class='form-control' value='$t[id_pasien]' name='id_pasien'/><br>
                                         <input type='text' class='form-control' name='bb'/><br>
                                         <label>Tinggi Badan</label>
                                         <input type='text' class='form-control' name='tb'/><br>
                                         <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                         <button type='submit' class='btn btn-primary'>Save </button>
                                         </form>
                                     </div>                                            
                                 </div>

                             </div>
                         </div>
                         </div>

                         <div class='modal fade' id='map$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                    <h4 class='modal-title' id='H3'>Input Data $t[id_pasien]</h4>
                                </div>

                                <div class='modal-body'>
                                    <div class='form-group'>
                                         <form role='form' method='post' action='input.php?aksi=inputmap'>
                                         <label>Sistole </label>
                                         <input type='hidden' class='form-control' value='$t[id_pasien]' name='id_pasien'/><br>
                                         <input type='text' class='form-control' name='sistole'/><br>
                                         <label>Diastole </label>
                                         <input type='text' class='form-control' name='diastole'/><br>
                                         <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                         <button type='submit' class='btn btn-primary'>Save </button>
                                         </form>
                                     </div>                                            
                                 </div>

                             </div>
                         </div>
                         </div>


                         <div class='modal fade' id='rot$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                    <h4 class='modal-title' id='H3'>Input Data $t[id_pasien]</h4>
                                </div>

                                <div class='modal-body'>
                                    <div class='form-group'>
                                         <form role='form' method='post' action='input.php?aksi=inputrot'>
                                    
                                         <input type='hidden' class='form-control' value='$t[id_pasien]' name='id_pasien'/><br>
                                         <label>Diastole Terlentang</label>
                                         <input type='text' class='form-control' name='terlentang'/><br>
                                         <label>Diastole Miring</label>
                                         <input type='text' class='form-control' name='miring'/><br>
                                         <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                         <button type='submit' class='btn btn-primary'>Save </button>
                                         </form>
                                     </div>                                            
                                 </div>

                             </div>
                         </div>
                         </div>

                                           
                                        </tbody>";
    }
                                    echo"</table>
                                </div>
                            </div>
                     </div>
                     
                     
                                    <div class='tab-pane fade' id='profile-pills'>
                                        <h4>Input pasien</h4>
                                       
    <form id='form1' method='post' enctype='multipart/form-data' action='input.php?aksi=inputpasien'>
             <div class='form-grup'>
            <label>Nama pasien</label>
            <input type='text' class='form-control'  name='nama_pasien'/><br>
            <label>Nama suami</label>
            <input type='text' class='form-control'  name='nama_suami'/><br>
            <label>Umur pasien</label>
            <input type='text' class='form-control'  name='umur_pasien'/><br>
            <label>alamat pasien</label>
            <input type='text' class='form-control'  name='alamat_pasien'/><br>
            
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> 
        </form>  
    
                    </div></div>
                                </div>
                            </div>
                        </div>
    "; 
}
elseif($_GET['aksi']=='editpasien'){
        $tebaru=mysqli_query($koneksi," SELECT * FROM pasien WHERE id_pasien=$_GET[id_pasien] ");
        $t=mysqli_fetch_array($tebaru);
        echo"
        <div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>EDIT
                                </div>
                                <div class='panel-body'>
        <form id='form1'  method='post' enctype='multipart/form-data' action='edit.php?aksi=proseseditpasien&id_pasien=$_GET[id_pasien]'>
               <div class='form-grup'>
                <label>Nama pasien</label>
                <input type='text' class='form-control' value='$t[nama_pasien]' name='nama_pasien'/><br>
                <label>Nama suami</label>
                <input type='text' class='form-control'  value='$t[nama_suami]' name='nama_suami'/><br>
                <label>Umur pasien</label>
                <input type='text' class='form-control' value='$t[umur_pasien]'  name='umur_pasien'/><br>
                <label>alamat pasien</label>
                <input type='text' class='form-control' value='$t[alamat_pasien]'  name='alamat_pasien'/><br>
                <a href='index.php?aksi=kategori' class='btn btn-default' data-dismiss='modal'>kembali</a>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div> </div>
            </form></div> </div></div> 
        ";	
}

elseif($_GET['aksi']=='bmi'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI DATA
                            </div>
                            <div class='panel-body'>	
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Tinggi</th>
                                                <th>Berat</th>	 
                                                <th>Total</th>	
                                                <th>Aksi</th>	
                                                 
                                            </tr>
                                        </thead><tbody>
                        ";  
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[nama_pasien]</td>
                                                <td>$t[tb]</td> 
                                                <td>$t[bb]</td> 
                                                <td>$t[total_bmi]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>ubah</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editbmi&id_bmi=$t[id_bmi]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusbmi&id_bmi=$t[id_bmi]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";		     
}                 	
elseif($_GET['aksi']=='editbmi'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and bmi.id_bmi=$_GET[id_bmi] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>$t[nama_pasien]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditbmi&id_bmi=$t[id_bmi]'>
    <div class='form-group'>
    <label>Berat Badan</label>
    <input type='hidden' class='form-control' value='$t[id_pasien]' name='id_pasien'/><br>
    <input type='text' class='form-control'value='$t[bb]' name='bb'/><br>
    <label>Tinggi Badan</label>
    <input type='text' class='form-control' value='$t[tb]' name='tb'/><br>
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='map'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI DATA
                            </div>
                            <div class='panel-body'>	
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Sistole</th>
                                                <th>Diastole</th>	 
                                                <th>Total</th>	
                                                <th>Aksi</th>	
                                                 
                                            </tr>
                                        </thead><tbody>
                        ";  
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM map,pasien WHERE map.id_pasien=pasien.id_pasien");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[nama_pasien]</td>
                                                <td>$t[sistole]</td> 
                                                <td>$t[diastole1] + $t[diastole2]</td> 
                                                <td>$t[total_map]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>ubah</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editmap&id_map=$t[id_map]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusmap&id_map=$t[id_map]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";		     
}                 	
elseif($_GET['aksi']=='editmap'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM map,pasien WHERE map.id_pasien=pasien.id_pasien and map.id_map=$_GET[id_map] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>$t[nama_pasien]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditmap&id_map=$t[id_map]'>
    <div class='form-group'>
    <label>Sistole </label>
    <input type='hidden' class='form-control' value='$t[id_pasien]' name='id_pasien'/><br>
    <input type='text' class='form-control' value='$t[sistole]' name='sistole'/><br>
    <label>Diastole </label>
    <input type='text' class='form-control' value='$t[diastole1]' name='diastole'/><br>
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='rot'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI DATA
                            </div>
                            <div class='panel-body'>	
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Diastole Terlentang</th>
                                                <th>Diastole Miring</th>	 
                                                <th>Total</th>	
                                                <th>Aksi</th>	
                                                 
                                            </tr>
                                        </thead><tbody>
                        ";  
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM rot,pasien WHERE rot.id_pasien=pasien.id_pasien");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[nama_pasien]</td>
                                                <td>$t[terlentang]</td> 
                                                <td>$t[miring]</td> 
                                                <td>$t[total_rot]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>ubah</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editrot&id_rot=$t[id_rot]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusrot&id_rot=$t[id_rot]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";		     
}                 	
elseif($_GET['aksi']=='editrot'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM rot,pasien WHERE rot.id_pasien=pasien.id_pasien and rot.id_rot=$_GET[id_rot] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>$t[nama_pasien]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditrot&id_rot=$t[id_rot]'>
    <div class='form-group'>
    <input type='hidden' class='form-control' value='$t[id_pasien]' name='id_pasien'/><br>
    <label>Diastole Terlentang</label>
    <input type='text' class='form-control' value='$t[terlentang]' name='terlentang'/><br>
    <label>Diastole Miring</label>
    <input type='text' class='form-control' value='$t[miring]' name='miring'/><br>
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='profil'){
echo"			
	<div class='row'>
	 <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI PROFIL</h3>
                </div>
                <div class='box-header'>
				</div>
                             <div class='box-body'>
		<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
	 <thead> 
	 <tr>
                                            <th>No</th>
                                            <th>Profil</th>
                                        </tr>
                                    </thead>
				   <tbody> ";
				$no=0;   
				$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil ='1'");
while ($t=mysqli_fetch_array($tebaru)){
                $isi_berita = strip_tags($t['isi']); 
                $isi = substr($isi_berita,0,70); 
                $isi = substr($isi_berita,0,strrpos($isi," ")); 
$no++;    
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nama]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editprofil&id_p=$t[id_profil]'>edit</a></li>
						<li><a href='index.php?aksi=viewprofil&id_p=$t[id_profil]'>view</a></li>
                        </ul>
                    </div></td>
                                       </tr>                                      
                                    ";
}
                                echo"</tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>	
	";
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT PROFIL
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' enctype='multipart/form-data' action='master/profil.php?act=editpro&id_p=$_GET[id_p]'>
       <div class='form-grup'>
        <label>Nama Aplikasi</label>
        <input type='text' class='form-control' value='$t[nama_app]' name='nama_app'/><br>
        <label>Nama</label>
        <input type='text' class='form-control' value='$t[nama]' name='jd'/><br>
		<label>Alias</label>
        <input type='text' class='form-control' value='$t[alias]' name='alias'/><br>
		<label>Tahun</label>
        <input type='text' class='form-control' value='$t[tahun]' name='tahun'/><br>
		<label>Alamat</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
        <label>Gambar Begroud Aplikasi</label>
        <input type='file' class='smallInput'  name='gambar'/><br>
		<label>Isi</label>
        <textarea id='text-ckeditor' class='form-control' name='isi'>$t[isi]</textarea></br>
		<script>CKEDITOR.replace('text-ckeditor');</script>
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div> </div>
";
}



elseif($_GET['aksi']=='viewprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>$t[nama]
                        </div>
                        <div class='panel-body'>
<a href='javascript:history.go(-1)' class='btn btn-info'> Kembali</a></div>
";
echo"$t[isi] </div></div></div></div></div>";
}



elseif($_GET['aksi']=='admin'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data Admin
                            </button>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>User</th>		  
                                        </tr>
                                    </thead>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM user ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tbody>
                                        <tr>
                                            <td>$t[user_nama]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[user_username]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusadmin&user_id=$t[user_id]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>
                                    </tbody>";
}
                                echo"</table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input</h4>
                                        </div>
                                                  <div class='box-body'>
            <form action='input.php?aksi=inputadmin' method='post' enctype='multipart/form-data'>
              <div class='form-group'>
                <label>Nama</label>
                <input type='text' class='form-control' name='nama' required='required' placeholder='Masukkan Nama ..'>
              </div>
              <div class='form-group'>
                <label>Username</label>
                <input type='text' class='form-control' name='username' required='required' placeholder='Masukkan Username ..'>
              </div>
              <div class='form-group'>
                <label>Password</label>
                <input type='password' class='form-control' name='password' required='required' min='5' placeholder='Masukkan Password ..'>
              </div>
              <div class='form-group'>
                <label>Foto</label>
                <input type='file' name='foto'>
              </div>
              <div class='form-group'>
                <input type='submit' class='btn btn-sm btn-primary' value='Simpan'>
              </div>
            </form>
          </div>
									
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editadmin'){
$tebaru=mysqli_query($koneksi," SELECT * FROM user WHERE user_id=$_GET[user_id]");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[user_nama] $t[user_id]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditadmin&user_id=$t[user_id]'  enctype='multipart/form-data'>
    	<label>Nama Lengkap</label>
        <input type='text' class='form-control'  name='nama' value='$t[user_nama]'/>
	<label>User Name</label>
        <input type='text' class='form-control'  name='username' value='$t[user_username]'/>     
	<label>Password</label>
        <input type='text' class='form-control'  name='password'/> </br>
		 <label>Foto</label>
                  <input type='file' name='foto'></br>
	 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          <button type='submit' class='btn btn-primary'>Save </button>
    </form>  
</div> </div></div></div>
";
}

?>