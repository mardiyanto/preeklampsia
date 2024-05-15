<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
echo"
<div class='container'><div class='jumbotron mb-3 bg-white'>
<div class='text-center'>
<div class='figure-profile shadow my-4'>
    <figure><img src='../tema/img/user1.png' alt=''></figure>
    <div class='btn btn-dark text-white floating-btn'>
        <i class='material-icons'>camera_alt</i>
        <input type='file' class='float-file'>
    </div>
</div>
</div>
<form id='form1' method='post' enctype='multipart/form-data' action='input.php?aksi=inputpasien'>
<h6 class='subtitle'>Informasi Pasien</h6>
<div class='row'>
<div class='col-12 col-md-6'>
    <div class='form-group float-label active'>
        <input type='text' name='nama_pasien' class='form-control' required=''>
        <label class='form-control-label'>Nama Pasien</label>
    </div>
</div>
<div class='col-12 col-md-6'>
    <div class='form-group float-label active'>
        <input type='text' name='nik' class='form-control' required=''>
        <label class='form-control-label'>Nik</label>
    </div>
</div>
</div>
<div class='row'>
<div class='col-12 col-md-6'>
    <div class='form-group float-label active'>
    <input type='text' name='umur_pasien' class='form-control' required=''>
    <label class='form-control-label'>Umur</label>
    </div>
    
</div>
<div class='col-12 col-md-6'>
    <div class='form-group float-label active'>
    <input type='text' class='form-control' name='nama_suami' required='' >
    <label class='form-control-label'>Nama Suami</label>
    </div>
    
</div>
</div>
<div class='row'>
<div class='col-12 col-md-12'>
    <div class='form-group float-label active'>
        <input type='text' class='form-control' name='alamat_pasien' required='' >
        <label class='form-control-label'>Alamat</label>
    </div>
    
</div>
</div>
<h6 class='subtitle'>Data Preeklampsia</h6>

<div class='row'>
<div class='col-6 col-md-4'>
<label>Berat Badan</label>
<input type='text' class='form-control' name='bb'/><br>
<label>Tinggi Badan</label>
<input type='text' class='form-control' name='tb'/><br> 
</div>

<div class='col-6 col-md-4'>
<label>Sistole </label>
<input type='text' class='form-control' name='sistole'/><br>
<label>Diastole </label>
<input type='text' class='form-control' name='diastole'/><br>
</div>

<div class='col-6 col-md-4'>
<label>Diastole Terlentang</label>
<input type='text' class='form-control' name='terlentang'/><br>
<label>Diastole Miring</label>
<input type='text' class='form-control' name='miring'/><br>
</div>
</div>

<button type='submit' class='btn btn-lg btn-default text-white btn-block btn-rounded shadow' class='btn btn-primary'><span>Save</span><i class='material-icons'>arrow_forward</i> </button>
<br>
</form> 
</div></div> ";
include "bawah.php"; 
}
elseif($_GET['aksi']=='detailpasien'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pasien WHERE id_pasien=$_GET[id_pasien] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
<div class='container'>
  <div class='text-center'>
  <div class='figure-profile shadow my-4'>
      <figure><img src='../tema/img/user1.png' alt=''></figure>
  </div>
  <h3 class='mb-1 '>$t[nama_pasien]</h3>
  <p class='text-secondary'>$t[alamat_pasien]</p>
</div>
<br>
<div class='card mb-4 border-0 shadow-sm'>
  <div class='card-body'>
      <div class='row'>
          <div class='col-auto'>
              <span class='btn btn-default p-3 btn-rounded-15'>
                  <i class='material-icons'>build</i>
              </span>
          </div>
          <div class='col pl-0'>
              <p class='text-secondary mb-1'>Nama Suami</p>
              <h4 class='text-dark my-0'>$t[nama_suami]</h4>
          </div>
         
          <div class='col-auto pl-0 align-self-center'>
              <a href='index.php?aksi=home' class='btn btn-default button-rounded-36 shadow'><i class='material-icons'>add</i></a>
          </div>
      </div>
  </div>
</div>
<div class='card mb-4 border-0 shadow-sm'>
  <div class='card-body'>
      <div class='row'>
          
          <div class='col-auto'>
          <span class='btn btn-default p-3 btn-rounded-15'>
              <i class='material-icons'>camera_enhance</i>
          </span>
      </div>
      <div class='col pl-0'>
          <p class='text-secondary mb-1'>Umur</p>
          <h4 class='text-dark my-0'>$t[umur_pasien]</h4>
      </div>
          <div class='col-auto pl-0 align-self-center'>
              <a href='index.php?aksi=home' class='btn btn-default button-rounded-36 shadow'><i class='material-icons'>add</i></a>
          </div>
      </div>
  </div>
</div>
<nav> 
<h1 class='nav-item nav-link text-left active'>Riwayat Priksa $t[nama_pasien]</h1>
  <div class='nav nav-tabs nav-fill' id='nav-tab' role='tablist'>
      <a class='nav-item nav-link text-left active' id='nav-delivery-tab' data-toggle='tab' href='#nav-delivery' role='tab' aria-controls='nav-delivery' aria-selected='true'>
          <div class='row'>
              <div class='col-auto align-self-center pr-1'>
                  <span class='btn btn-success button-rounded-26'>
                      <i class='material-icons md-18 text-mute'>card_giftcard</i>
                  </span>
              </div>
              <div class='col pl-2'>
                  <p class='text-secondary mb-0 small text-truncate'>Data BMI</p>
                  <h6 class='text-dark my-0'>BMI</h6>
              </div>
          </div>
      </a>

      <a class='nav-item nav-link text-left' id='nav-booking-tab' data-toggle='tab' href='#nav-booking' role='tab' aria-controls='nav-booking' aria-selected='false'>
          <div class='row'>
              <div class='col-auto align-self-center pr-1'>
                  <span class='btn btn-warning button-rounded-26'>
                      <i class='material-icons md-18 text-mute'>payment</i>
                  </span>
              </div>
              <div class='col pl-2'>
                  <p class='text-secondary mb-0 small text-truncate'>Data MAP</p>
                  <h6 class='text-dark my-0'>MAP</h6>
              </div>
          </div>
      </a>

      <a  class='nav-item nav-link text-left' id='nav-booking-tab' data-toggle='tab' href='#nav-rot' role='tab' aria-controls='nav-booking' aria-selected='false'>
      <div class='row'>
          <div class='col-auto align-self-center pr-1'>
              <span class='btn btn-success button-rounded-26'>
                  <i class='material-icons md-18 text-mute'>card_membership</i>
              </span>
          </div>
          <div class='col pl-2'>
              <p class='text-secondary mb-0 small text-truncate'>Data ROT</p>
              <h6 class='text-dark my-0'>ROT</h6>
          </div>
      </div>
      
  </a>
  <a  class='nav-item nav-link text-left' >
      <div class='row'>
          <div class='col-auto align-self-center pr-1'>
              <span class='btn btn-success button-rounded-26'>
              <i class='material-icons md-18 text-mute'>print</i>
              </span>
          </div>
          <div class='col pl-2'>
              <p class='text-secondary mb-0 small text-truncate'>Print Data</p>
              <h6 class='text-dark my-0'>Print</h6>
          </div>
      </div>
      
  </a>
  </div>
  
</nav>
<div class='tab-content' id='nav-tabContent'>
  <div class='tab-pane fade show active' id='nav-delivery' role='tabpanel' aria-labelledby='nav-delivery-tab'>
      <ul class='list-items'>
          <li>    ";
          $lite1=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and pasien.id_pasien=$t[id_pasien] ");
           while ( $s1 = mysqli_fetch_array($lite1)) {
           echo"
              <div class='row'>
          
                  <div class='col'>
                  ";
                  if ($t['bmi'] === "sudah") {
                     echo"<button type='button' class='btn btn-primary my-2'>$s1[tgl]</button> ";
                    if ($s1['total_bmi'] >= 28.8) {
                        echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#databmi$t[id_pasien]'>Preeklampsia</button>
                        <button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>$s1[total_bmi]</button>";
                    } else {
                        echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>Normal</button>
                             <button type='button' class='btn btn-success' data-toggle='modal' data-target='#databmi$t[id_pasien]'>$s1[total_bmi]</button>";
                    }
                     
                  } else {
                      echo" <button type='button' class='btn btn-primary my-2' data-toggle='modal' data-target='#inputbmi$t[id_pasien]'>INPUT DATA BMI</button>";  
                  }
                  echo"
                  </div>
                  <div class='col-auto pl-0 align-self-center'>
                  <button type='button' class='btn btn-default button-rounded-36 shadow' data-toggle='modal' data-target='#inputbmi$t[id_pasien]'><i class='material-icons'>add</i></button>
          </div> </div>

          
          ";
                }
             echo" 
          </li>
         
      </ul>
  </div>
  <div class='tab-pane fade' id='nav-booking' role='tabpanel' aria-labelledby='nav-booking-tab'>
      <ul class='list-items'>
          <li>  ";
          $lite2=mysqli_query($koneksi," SELECT * FROM map WHERE id_pasien=$t[id_pasien] ");
           while ( $s2 = mysqli_fetch_array($lite2)) {
           echo"
              <div class='row'>
                  <div class='col'>";
                  if ($t['map'] === "sudah") {
        
                    echo"<button type='button' class='btn btn-primary my-2'>$s2[tgl]</button> ";
                    if ($s2['total_map'] >= 90) {
                        echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datamap$t[id_pasien]'>Preeklampsia</button>
                        <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datamap$t[id_pasien]'>$s2[total_map]</button>";
                    } else {
                        echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#datamap$t[id_pasien]'>Normal</button>
                        <button type='button' class='btn btn-success' data-toggle='modal' data-target='#datamap$t[id_pasien]'>$s2[total_map]</button>";
                    }
                  } else {
                      echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#inputmap$t[id_pasien]'>INPUT DATA MAP</button>";  
                  }
                  echo"</div>
                  <div class='col-auto pl-0 align-self-center'>
                  <button type='button' class='btn btn-default button-rounded-36 shadow' data-toggle='modal' data-target='#inputmap$t[id_pasien]'><i class='material-icons'>add</i></button>
          </div>
              </div> ";
            }
         echo"
          </li>
      </ul>
  </div>

  <div class='tab-pane fade' id='nav-rot' role='tabpanel' aria-labelledby='nav-booking-tab'>
  <ul class='list-items'>
      <li>";
      $lite3=mysqli_query($koneksi," SELECT * FROM rot WHERE id_pasien=$t[id_pasien] ");
       while ( $s3 = mysqli_fetch_array($lite3)) {
       echo"
          <div class='row'>
              <div class='col'>";
              if ($t['rot'] === "sudah") {
                echo"<button type='button' class='btn btn-primary my-2'>$s3[tgl]</button> ";
                if ($s3['total_rot'] >= 15) {
                    echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datarot$t[id_pasien]'>Preeklampsia</button>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#datarot$t[id_pasien]'>$s3[total_rot]</button>";
                } else {
                    echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#datarot$t[id_pasien]'>Normal</button>
                    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#datarot$t[id_pasien]'>$s3[total_rot]</button>";
                }
              } else {
                  echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#rot$t[id_pasien]'>INPUT DATA ROT</button>";  
              }
              $hasil=$s1['total_bmi'] + $s2['total_map'] + $s3['total_rot']; 
               echo"</div>
               <div class='col-auto pl-0 align-self-center'>
                  <button type='button' class='btn btn-default button-rounded-36 shadow' data-toggle='modal' data-target='#rot$t[id_pasien]'><i class='material-icons'>add</i></button>
          </div>
          </div>
          ";
            }
         echo"
      </li>
  </ul>
 </div>

</div>
<br>";
// <div class='card mb-4 border-0 shadow-sm'>
//   <div class='card-body'>
//       <div class='row'>
          
//           <div class='col-auto'>
//           <span class='btn btn-default p-3 btn-rounded-15'>
//               <i class='material-icons'>camera_enhance</i>
//           </span>
//       </div>
//       <div class='col pl-0'> 
//           <p class='text-secondary mb-1'>Kesimpulan</p>";
//           if ($hasil >= 133) {
//             echo"<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#kesimpulan$t[id_pasien]'>
//             Preeklampsia
//         </button>";
//         } else {
//             echo"<button type='button' class='btn btn-success' data-toggle='modal' data-target='#normalkesimpulan$t[id_pasien]'>Normal</button>";
//         }
//           echo"
       
//       </div>
//           <div class='col-auto pl-0 align-self-center'>
//               <a href='index.php?aksi=home' class='btn btn-default button-rounded-36 shadow'><i class='material-icons'>add</i></a>
//           </div>
//       </div>
//   </div>
// </div>
echo"<button type='button' class='btn btn-lg btn-dark text-white btn-block btn-rounded shadow' data-toggle='modal' data-target='#edit$t[id_pasien]'><span>Edit Pasien</span><i class='material-icons'>arrow_forward</i></button>
<br>
</div>";
include "bawah.php"; 
echo"
<!-- Modal Kesimpulan normal-->
    <div class='modal fade' id='normalkesimpulan$t[id_pasien]' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Modal title $t[id_pasien]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>
               <img src='../tema/img/nonpreeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                <!-- Teks di dalam modal -->
                <p>Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan</p>
                <p>Nama: $t[nama_pasien]</p>
                <p>Umur: $t[umur_pasien]</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Kesimpulan-->
    <div class='modal fade' id='kesimpulan$t[id_pasien]' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Modal title $t[id_pasien]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>
                <img src='../tema/img/preeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                <!-- Teks di dalam modal -->
                <p>Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang</p>
                <p>Nama: $t[nama_pasien]</p>
                <p>Umur: $t[umur_pasien]</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal BMI-->
    <div class='modal fade' id='inputbmi$t[id_pasien]' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Modal title $t[id_pasien]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>
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
    <div class='modal fade' id='databmi$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>

          <div class='modal-header'><h4 class='modal-title' id='H3'>Data BMI $t[nama_pasien]</h4>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
              
          </div>
          <div class='modal-body'>
          ";
              $sql1=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and pasien.id_pasien=$t[id_pasien] ");
              $s=mysqli_fetch_array($sql1);
                   if ($s['total_bmi'] >= 28.8) {
                      echo"<img src='../tema/img/preeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                      <!-- Teks di dalam modal -->
                      <p>Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang</p>
                      <p>Nama: $t[nama_pasien]</p>
                      <p>Tinggi Badan: $s[tb] cm</p>
                      <p>Berat Badan: $s[bb] kg</p>
                      <p>Status:  <button type='button' class='btn btn-danger' data-container='body' data-trigger='hover' data-toggle='popover' data-placement='top' data-content='Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang' data-original-title='' title=''>
                      Preeklampsia
                  </button> ($s[total_bmi])</p>";
                  } else {
                    echo"<img src='../tema/img/nonpreeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                    <!-- Teks di dalam modal -->
                    <p>Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan</p>
                    <p>Nama: $t[nama_pasien]</p>
                    <p>Tinggi Badan: $s[tb] cm</p>
                    <p>Berat Badan: $s[bb] kg</p>
                    <p>Status:  <button type='button' class='btn btn-success' data-container='body' data-trigger='hover' data-toggle='popover' data-placement='top' data-content='Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan' data-original-title='' title=''>
                    Normal
                </button>   ($s[total_bmi])</p>";
                  }
                   echo"
                   <br><br>
                   <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                   <a href='index.php?aksi=editbmi&id_bmi=$s[id_bmi]' class='btn btn-primary'>Edit </a>                                          
           </div>

       </div>
     </div>
    </div>

    <!-- Modal map-->
    <div class='modal fade' id='inputmap$t[id_pasien]' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Modal title $t[id_pasien]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>
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
    <div class='modal fade' id='datamap$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                         <div class='modal-dialog'>
                           <div class='modal-content'>

                               <div class='modal-header'><h4 class='modal-title' id='H3'>Data MAP $t[nama_pasien]</h4>
                                   <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                   
                               </div>

                               <div class='modal-body'>";
                               $sql2=mysqli_query($koneksi," SELECT * FROM map WHERE id_pasien=$t[id_pasien] ");
                               $j=mysqli_fetch_array($sql2);
                                    if ($j['total_map'] >= 90) {
                                        echo"<img src='../tema/img/preeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                                        <!-- Teks di dalam modal -->
                                        <p>Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang</p>
                                        <p>Nama: $j[nama_pasien]</p>
                                        <p>Sistole: $j[sistole]</p>
                                        <p>Diastole: $j[diastole1]</p>
                                        <p>Status:  <button type='button' class='btn btn-danger' data-container='body' data-trigger='hover' data-toggle='popover' data-placement='top' data-content='Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang' data-original-title='' title=''>
                                        Preeklampsia
                                    </button>  ($j[total_map])</p>";
                                    } else {
                                        echo"<img src='../tema/img/nonpreeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                                        <!-- Teks di dalam modal -->
                                        <p>Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan</p>
                                        <p>Nama: $j[nama_pasien]</p>
                                        <p>Sistole: $j[sistole]</p>
                                        <p>Diastole: $j[diastole1]</p>
                                        <p>Status:  <button type='button' class='btn btn-success' data-container='body' data-trigger='hover' data-toggle='popover' data-placement='top' data-content='Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan' data-original-title='' title=''>
                                        Normal
                                    </button>   ($j[total_map])</p>";
                                    }
                                     echo"
                                    <br><br>
                                     
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <a href='index.php?aksi=editmap&id_map=$j[id_map]' class='btn btn-primary'>Edit </a>
                                                                           
                                </div>

                            </div>
                          </div>
                         </div>
    <!-- Modal ROT-->
    <div class='modal fade' id='rot$t[id_pasien]' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Modal title $t[id_pasien]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>
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
    <div class='modal fade' id='datarot$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                         <div class='modal-dialog'>
                           <div class='modal-content'>

                               <div class='modal-header'> <h4 class='modal-title' id='H3'>Data ROT $t[nama_pasien]</h4>
                                   <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                  
                               </div>

                               <div class='modal-body'>";
                               $sql3=mysqli_query($koneksi," SELECT * FROM rot WHERE id_pasien=$t[id_pasien] ");
                               $jx=mysqli_fetch_array($sql3);
                                    if ($jx['total_rot'] >= 15) {
                                        echo"<img src='../tema/img/preeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                                        <!-- Teks di dalam modal -->
                                        <p>Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang</p>
                                        <p>Nama: $t[nama_pasien]</p>
                                        <p>Diastole Miring: $jx[miring]</p>
                                        <p>Diastole Terlentang: $jx[terlentang]</p>
                                        <p>Status:  <button type='button' class='btn btn-danger' data-container='body' data-trigger='hover' data-toggle='popover' data-placement='top' data-content='Tindak lanjut penatalaksanaan kasus preeklampsia seperti : Konsultasi ke dokter Spesialis Obsgyn, Merujuk pasien, Kontrol tekanan darah dan Pencegahan Kejang' data-original-title='' title=''>
                                        Preeklampsia
                                    </button> ($jx[total_rot])</p>";
                                    } else {
                                        echo"<img src='../tema/img/nonpreeklamsia.jpg' alt='Gambar Modal' class='img-fluid'><br>
                                        <!-- Teks di dalam modal -->
                                        <p>Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan</p>
                                        <p>Nama: $t[nama_pasien]</p>
                                        <p>Diastole Miring: $jx[miring]</p>
                                        <p>Diastole Terlentang: $jx[terlentang]</p>
                                        <p>Status: <button type='button' class='btn btn-success' data-container='body' data-trigger='hover' data-toggle='popover' data-placement='top' data-content='Tindak lanjut pada kehamilan normal seperti : Istrirahat cukup, menjaga pola makan, rutin melakukan pemeriksaan kehamilan' data-original-title='' title=''>
                                        Normal
                                    </button>  ($jx[total_rot])</p>";
                                    }
                                     echo"
                                    <br><br>
                                     
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <a href='index.php?aksi=editrot&id_rot=$jx[id_rot]' class='btn btn-primary'>Edit </a>
                                                                          
                                </div>

                            </div>
                          </div>
                         </div>

<!-- Modal edit pasien-->
    <div class='modal fade' id='edit$t[id_pasien]' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>Modal title $t[id_pasien]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                    </button>
                </div>
                <div class='modal-body'>
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
             </form>
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
    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
    <form method='GET' action='index.php'>
    <div class='row'>
    <div class='col-6 col-md-4'>
    <input type='hidden' name='aksi' value='caripasien'>
    <input type='text' class='form-control' name='nama' placeholder='Masukkan Kata Kunci'>
    </div>
    <div class='col-6 col-md-4'>
    <button type='submit' class='btn btn-default'>Cari</button>
    <a href='cetak.php' target='_blank' class='btn btn-default'>PDF</a>
    </div>
    </form><br><br>
    <div class='table-responsive'>
        <table id='example1' class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Aksi</th>
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
            <td><a class='btn btn-primary' href='index.php?aksi=editpasien&id_pasien=$t[id_pasien]'>edit</a>
            <a class='btn btn-primary' href='index.php?aksi=detailpasien&id_pasien=$t[id_pasien]'>lihat</a>
            <a class='btn btn-danger' href='hapus.php?aksi=hapuspasien&id_pasien=$t[id_pasien]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\">hapus</a>
            </td>
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
                <td><a class='btn btn-primary' href='index.php?aksi=editpasien&id_pasien=$t[id_pasien]'>edit</a>
                <a class='btn btn-primary' href='index.php?aksi=detailpasien&id_pasien=$t[id_pasien]'>lihat</a>
                <a class='btn btn-danger' href='hapus.php?aksi=hapuspasien&id_pasien=$t[id_pasien]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\">hapus</a>
                </td>
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
        echo"</table>
    </div>
    </div></div> ";
    include "bawah.php";   
   
    
}
elseif($_GET['aksi']=='caripasien'){
    echo"
    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
    <form method='GET' action='index.php'>
    <div class='row'>
    <div class='col-6 col-md-4'>
    <input type='hidden' name='aksi' value='caripasien'>
    <input type='text' class='form-control' name='nama' placeholder='Masukkan Kata Kunci'>
    </div>
    <div class='col-6 col-md-4'>
    <button type='submit' class='btn btn-default'>Cari</button>
    <a href='cetak.php' target='_blank' class='btn btn-default'>PDF</a>
    </div>
    </form><br><br>
    <div class='table-responsive'>";
    if (isset($_GET['nama'])) {
        $keyword = $_GET['nama'];
        // Kueri SQL untuk mencari pasien berdasarkan nama
        $query = "SELECT * FROM pasien WHERE nama_pasien LIKE '%$keyword%'";
        $result = mysqli_query($koneksi, $query);
    } else { 
            // Tampilkan pesan jika tidak ada kata kunci yang dimasukkan
            echo "<p>Silakan masukkan kata kunci untuk melakukan pencarian.</p>";
        }
   

        echo"<table id='example1' class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Aksi</th>
                    <th>BMI</th>
                    <th>MAP</th>
                    <th>ROT</th>
                </tr>
            </thead>
";
while ($t = mysqli_fetch_assoc($result)) {
    $no++;    
    // Memeriksa apakah pengguna adalah admin atau memiliki id 1
    if ($_SESSION['user'] === 'admin' || $_SESSION['user_id'] == 1) {
        // Izinkan akses ke semua data
        // Lakukan sesuatu dengan data
        echo"<tbody>
        <tr>
            <td>$no</td>
            <td>$t[nama_pasien]</td> 
            <td><a class='btn btn-primary' href='index.php?aksi=editpasien&id_pasien=$t[id_pasien]'>edit</a>
            <a class='btn btn-primary' href='index.php?aksi=detailpasien&id_pasien=$t[id_pasien]'>lihat</a>
            <a class='btn btn-danger' href='hapus.php?aksi=hapuspasien&id_pasien=$t[id_pasien]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\">hapus</a>
            </td>
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
                <td><a class='btn btn-primary' href='index.php?aksi=editpasien&id_pasien=$t[id_pasien]'>edit</a>
                <a class='btn btn-primary' href='index.php?aksi=detailpasien&id_pasien=$t[id_pasien]'>lihat</a>
                <a class='btn btn-danger' href='hapus.php?aksi=hapuspasien&id_pasien=$t[id_pasien]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\">hapus</a>
                </td>
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
        echo"</table>
    </div>
    </div></div> ";
    include "bawah.php";   
   
    
}
elseif($_GET['aksi']=='pasien1'){
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
                                    <h4 class='modal-title' id='H3'>Input Data $t[nama_pasien]</h4>
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

                         <div class='modal fade' id='databmi$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>

                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                    <h4 class='modal-title' id='H3'>Data BMI $t[nama_pasien]</h4>
                                </div>

                                <div class='modal-body'>
                                    <div class='form-group'>";
                                    $sql1=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and pasien.id_pasien=$t[id_pasien] ");
                                    $s=mysqli_fetch_array($sql1);
                                    echo"
                                        
                                         <label>Berat Badan</label>
                                         <input type='text' class='form-control' value='$s[bb]'disabled readonly>
                                         <label>Tinggi Badan</label>
                                         <input type='text' class='form-control' value='$s[tb]' disabled readonly>
                                         <label>Total </label>
                                         <input type='text' class='form-control' value='$s[total_bmi]' disabled readonly><br>";
                                         if ($s['total_bmi'] >= 28.8) {
                                            echo"<a href='' class='btn btn-danger'>preeklampsia</a>";
                                        } else {
                                            echo"<a href='' class='btn btn-success'>Normal</a>";
                                        }
                                         echo"
                                         <br><br>
                                         <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                         <a href='index.php?aksi=editbmi&id_bmi=$s[id_bmi]' class='btn btn-primary'>Edit </a>
                                       
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
                                    <h4 class='modal-title' id='H3'>Input Data $t[nama_pasien]</h4>
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

                         <div class='modal fade' id='datamap$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                         <div class='modal-dialog'>
                           <div class='modal-content'>

                               <div class='modal-header'>
                                   <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                   <h4 class='modal-title' id='H3'>Data MAP $t[nama_pasien]</h4>
                               </div>

                               <div class='modal-body'>
                               <div class='form-group'>";
                               $sql2=mysqli_query($koneksi," SELECT * FROM map WHERE id_pasien=$t[id_pasien] ");
                               $j=mysqli_fetch_array($sql2);
                               echo"
                               
                                    <label>sistole</label>
                                    <input type='text' class='form-control' value='$j[sistole]'disabled readonly>
                                    <label>diastole</label>
                                    <input type='text' class='form-control' value='$j[diastole1]' disabled readonly>
                                    <label>Total </label>
                                    <input type='text' class='form-control' value='$j[total_map]' disabled readonly><br>";
                                    if ($j['total_map'] >= 90) {
                                       echo"<a href='' class='btn btn-danger'>preeklampsia</a>";
                                   } else {
                                       echo"<a href='' class='btn btn-success'>Normal</a>";
                                   }
                                    echo"
                                    <br><br>
                                     
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <a href='index.php?aksi=editmap&id_map=$j[id_map]' class='btn btn-primary'>Edit </a>
                                   
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
                                    <h4 class='modal-title' id='H3'>Input Data $t[nama_pasien]</h4>
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

                         <div class='modal fade' id='datarot$t[id_pasien]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                         <div class='modal-dialog'>
                           <div class='modal-content'>

                               <div class='modal-header'>
                                   <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                   <h4 class='modal-title' id='H3'>Data ROT $t[nama_pasien]</h4>
                               </div>

                               <div class='modal-body'>
                               <div class='form-group'>";
                               $sql3=mysqli_query($koneksi," SELECT * FROM rot WHERE id_pasien=$t[id_pasien] ");
                               $jx=mysqli_fetch_array($sql3);
                               echo"
                               
                                    <label>Diastole Miring</label>
                                    <input type='text' class='form-control' value='$jx[miring]'disabled readonly>
                                    <label>Diastole Terlentang</label>
                                    <input type='text' class='form-control' value='$jx[terlentang]' disabled readonly>
                                    <label>Total </label>
                                    <input type='text' class='form-control' value='$jx[total_rot]' disabled readonly><br>";
                                    if ($jx['total_rot'] >= 15) {
                                       echo"<a href='' class='btn btn-danger'>preeklampsia</a>";
                                   } else {
                                       echo"<a href='' class='btn btn-success'>Normal</a>";
                                   }
                                    echo"
                                    <br><br>
                                     
                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                        <a href='index.php?aksi=editrot&id_rot=$jx[id_rot]' class='btn btn-primary'>Edit </a>
                                   
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
        <div class='container'>
        <div class='jumbotron mb-3 bg-white'>
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
                <a href='index.php?aksi=pasien' class='btn btn-default' data-dismiss='modal'>kembali</a>
                                                    <button type='submit' class='btn btn-primary'>Save </button>
                                                </div> </div>
            </form></div> </div></div> 
        ";
        include "bawah.php"; 	
}

elseif($_GET['aksi']=='bmi'){
    echo"    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
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
                                <td><a class='btn btn-primary' href='index.php?aksi=editbmi&id_bmi=$t[id_bmi]' title='Edit'><i class='fa fa-pencil'></i>edit</a>
                            <a class='btn btn-primary' href='hapus.php?aksi=hapusbmi&id_bmi=$t[id_bmi]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</a>
                        </td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";	
                   include "bawah.php"; 	     
}                 	
elseif($_GET['aksi']=='editbmi'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM bmi,pasien WHERE bmi.id_pasien=pasien.id_pasien and bmi.id_bmi=$_GET[id_bmi] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
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
    include "bawah.php"; 
}
elseif($_GET['aksi']=='map'){
    echo"    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
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
                                <td>
                          <a class='btn btn-primary' href='index.php?aksi=editmap&id_map=$t[id_map]' title='Edit'><i class='fa fa-pencil'></i>edit</a>
                            <a class='btn btn-primary' href='hapus.php?aksi=hapusmap&id_map=$t[id_map]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</a>
                           </td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";	
                   include "bawah.php"; 	     
}                 	
elseif($_GET['aksi']=='editmap'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM map,pasien WHERE map.id_pasien=pasien.id_pasien and map.id_map=$_GET[id_map] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
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
    include "bawah.php"; 
}
elseif($_GET['aksi']=='rot'){
    echo"    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
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
                                <td><a class='btn btn-primary' href='index.php?aksi=editrot&id_rot=$t[id_rot]' title='Edit'><i class='fa fa-pencil'></i>edit</a>
                                <a class='btn btn-primary' href='hapus.php?aksi=hapusrot&id_rot=$t[id_rot]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pasien] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</a>
                                </td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";	
                   include "bawah.php"; 	     
}                 	
elseif($_GET['aksi']=='editrot'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM rot,pasien WHERE rot.id_pasien=pasien.id_pasien and rot.id_rot=$_GET[id_rot] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='container'>
    <div class='jumbotron mb-3 bg-white'>
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
    include "bawah.php"; 
}
elseif($_GET['aksi']=='profil'){
echo"			
<div class='container'>
<div class='jumbotron mb-3 bg-white'>
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
                                            <td><a class='btn btn-primary' href='index.php?aksi=editprofil&id_p=$t[id_profil]'>edit</a> 
                                            <a class='btn btn-primary' href='index.php?aksi=viewprofil&id_p=$t[id_profil]'>view</a>
                                            </td>
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
    include "bawah.php"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='container'>
<div class='jumbotron mb-3 bg-white'>
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
include "bawah.php"; 
}



elseif($_GET['aksi']=='viewprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"    <div class='container'>
<div class='jumbotron mb-3 bg-white'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>$t[nama]
                        </div>
                        <div class='panel-body'>
<a href='javascript:history.go(-1)' class='btn btn-info'> Kembali</a></div>
";
echo"$t[isi] </div></div></div></div></div>";
}



elseif($_GET['aksi']=='admin'){
    if ($_SESSION['user'] === 'admin' || $_SESSION['user_id'] == 1) {
        // Izinkan akses ke semua data
        // Lakukan sesuatu dengan data
        echo $t['nama_pasien'] . "<br>";
    } else {
        
    }
echo"    <div class='container'>
<div class='jumbotron mb-3 bg-white'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>";
                        if ($_SESSION['user'] === 'admin' || $_SESSION['user_id'] == 1) {
                            // Izinkan akses ke semua data
                            // Lakukan sesuatu dengan data
                            echo"	<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                            Tambah Data
                        </button><br> <br>";
                        } else {
                            
                        }	
		
                           echo"	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>User</th>		  
                                        </tr>
                                    </thead>
				    ";
if ($_SESSION['user'] === 'admin' || $_SESSION['id'] == 1) {			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM user ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tbody>
                                        <tr>
                                            <td>$t[user_nama]</td>
							<td><a class='btn btn-primary' href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a>
						<a class='btn btn-primary' href='hapus.php?aksi=hapusadmin&user_id=$t[user_id]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</a>
                    </td>
                                        </tr>
                                    </tbody>";
}
} else {
    $jo=0;
    $sql=mysqli_query($koneksi," SELECT * FROM user WHERE user_id=$_SESSION[id]");
    while ($t=mysqli_fetch_array($sql)){	
    $jo++;
                                        echo"<tbody>
                                            <tr>
                                                <td>$t[user_nama]</td>
                                <td><a class='btn btn-primary' href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a>
                            </td>
                                            </tr>
                                        </tbody>";
    }                           
}	                                echo"</table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			
include "bawah.php"; 
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
<div class='container'>
<div class='jumbotron mb-3 bg-white'>
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
include "bawah.php"; 
}

?>