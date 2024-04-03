  <?php 
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
  ?>
<!doctype html>
<html lang="en" class="purple-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Shop · GoFurniture</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="../tema/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../tema/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="../tema/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../tema/css/style.css" rel="stylesheet">
</head>

<body>
  
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="../tema/img/logo.png" alt="logo">
            <h1><span class="font-weight-light">Go</span>PreeKlampsia</h1>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <div class="text-center">
            <div class="figure-menu shadow">
                <figure><img src="../tema/img/user1.png" alt=""></figure>
            </div>
            <h5 class="mb-1 ">Kalkulator</h5>
            <p class="text-mute small">Preeklamsia By Fatmah Indriana Fuaida</p>
        </div>
        <br>
        <div class="row mx-0">
            <div class="col">

            <?php
    if ($_SESSION['user'] === 'admin' || $_SESSION['user_id'] == 1) {
// Mendapatkan aksi saat ini dari parameter aksi di URL
$current_action = isset($_GET['aksi']) ? $_GET['aksi'] : '';

// Daftar link
$links = array(
    'home' => 'BERANDA',
    'pasien' => 'PASIEN',
    'bmi' => 'BMI',
    'map' => 'MAP',
    'rot' => 'ROT',
    'profil' => 'Settings',
    'admin' => 'Admin'
); ?>
                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                  <?php foreach ($links as $aksi => $label) {
    $class = ($current_action == $aksi) ? 'active' : ''; 
    echo "<a href='index.php?aksi=$aksi' class='list-group-item list-group-item-action $class'>$label</a>";
}
} else {
    echo"<a href='index.php?aksi=home' class='list-group-item list-group-item-action' >BERANDA</a>
    <a href='index.php?aksi=pasien' class='list-group-item list-group-item-action '>PASIEN</a>
    <a href='index.php?aksi=admin' class='list-group-item list-group-item-action '>Admin</a>";  
}
?>
                    <!-- <a href="index.php?aksi=home" class="list-group-item list-group-item-action <?php echo"$class"; ?>" >BERANDA</a>
                    <a href="index.php?aksi=pasien" class="list-group-item list-group-item-action <?php echo"$class"; ?>">PASIEN</a>
                    <a href="index.php?aksi=bmi" class="list-group-item list-group-item-action <?php echo"$class"; ?>">BMI </a>
                    <a href="index.php?aksi=map" class="list-group-item list-group-item-action <?php echo"$class"; ?>">MAP</a>
                    <a href="index.php?aksi=rot" class="list-group-item list-group-item-action <?php echo"$class"; ?>">ROT</a>
                    <a href="index.php?aksi=profil" class="list-group-item list-group-item-action <?php echo"$class"; ?>">Settings</a>
                    <a href="index.php?aksi=admin" class="list-group-item list-group-item-action <?php echo"$class"; ?>">Admin</a> -->
                    <a href="logout.php" class="list-group-item list-group-item-action mt-4">Logout</a>
                </div>
            </div>
        </div>

    </div>
    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><img src="../tema/img/menu.png" alt=""><span class="new-notification"></span></button>
                </div>
                <div class="col text-center"><img src="../tema/img/logo-header.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="index.php?aksi=admin" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            </div>
        </div>
     
            <?php include "tengah.php"?>

    <!-- jquery, popper and bootstrap js -->
    <script src="../tema/js/jquery-3.3.1.min.js"></script>
    <script src="../tema/js/popper.min.js"></script>
    <script src="../tema/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- swiper js -->
    <script src="../tema/vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="../tema/js/main.js"></script>

    <!-- page level script -->
    <script>
        $(window).on('load', function() {
            /* swiper slider carousel */
            var swiper = new Swiper('.small-slide', {
                slidesPerView: 'auto',
                spaceBetween: 0,
            });

            var swiper = new Swiper('.news-slide', {
                slidesPerView: 5,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 0,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    },
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                    }
                }
            });

            /* notification view and hide */
            setTimeout(function() {
                $('.notification').addClass('active');
                setTimeout(function() {
                    $('.notification').removeClass('active');
                }, 3500);
            }, 500);
            $('.closenotification').on('click', function() {
                $(this).closest('.notification').removeClass('active')
            });
        });

    </script>
<!-- page level script -->
<script>
        $(window).on('load', function() {
            $(function() {
                $('[data-toggle="popover"]').popover()
            })
        });

    </script>
</body>

</html>
