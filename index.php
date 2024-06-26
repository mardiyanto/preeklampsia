<!doctype html>
<html lang="en" class="purple-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Signin · preeklampsia</title>

    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="tema/vendor/materializeicon/material-icons.css">

    <!-- Roboto fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="tema/vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link href="tema/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="tema/css/style.css" rel="stylesheet">
    <style>
        /* Gaya untuk membuat modal di tengah */
        .modal {
            text-align: center;
            padding: 0!important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="tema/img/logo.png" alt="logo">
            <h1><span class="font-weight-light">Go</span>preeklampsia</h1>
            <div class="laoderhorizontal"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
    <div class="row no-gutters vh-100 proh bg-template">
        <img src="tema/img/image-4.png" alt="logo" class="apple right-image align-self-center">
        <div class="col align-self-center px-3 text-center">
            <img src="tema/img/logo.png" alt="logo" class="logo-small">
            <h2 class="text-white "><span class="font-weight-light">preeklampsia Sign</span>In</h2>
            <form class="form-signin shadow" action="periksa_login.php" method="POST">
                <div class="form-group float-label">
                <input type="hidden" value="administrator" class="form-control" name="sebagai" placeholder="user nama">
                    <input type="text" id="inputEmail" name="username" class="form-control" required autofocus>
                    <label for="inputEmail" class="form-control-label">User Name</label>
                </div>

                <div class="form-group float-label">
                    <input type="password" id="inputPassword" name="password" class="form-control" required>
                    <label for="inputPassword" class="form-control-label">Password</label>
                </div>

                

                <div class="row">
                    <div class="col-auto">
                       <button type="submit" class="btn btn-lg btn-default btn-rounded shadow"><span>Sign in</span><i class="material-icons">arrow_forward</i></button>
                    </div>
                    <div class="col align-self-center text-right pl-0">
                        <a href="tentang.php" class="btn btn-lg btn-default btn-rounded shadow">Tentang</a>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                Don't have account yet?<br>
                <a href="signup.php">Sign Up</a> here.
            </p>
            <h4 class="text-white "><span class="font-weight-light">By.Fatmah Indriana Fuaida</span></h4>
        </div>
    </div>
    
       
<!-- Modal Gagal Login -->
<div class="modal fade" id="loginFailedModal" tabindex="-1" role="dialog" aria-labelledby="loginFailedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginFailedModalLabel">Login Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger">Username dan password salah. Silakan coba lagi.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal loguot -->
<div class="modal fade" id="logoutFailedModal" tabindex="-1" role="dialog" aria-labelledby="loginFailedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginFailedModalLabel">Login Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger">ANDA TELAH BERHASIL LOGOUT</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal login -->
<div class="modal fade" id="loginFailedModal" tabindex="-1" role="dialog" aria-labelledby="loginFailedModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginFailedModalLabel">Login Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger">ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery, popper and bootstrap js -->
    <script src="tema/js/jquery-3.3.1.min.js"></script>
    <script src="tema/js/popper.min.js"></script>
    <script src="tema/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>

    <!-- swiper js -->
    <script src="tema/vendor/swiper/js/swiper.min.js"></script>

    <!-- template custom js -->
    <script src="tema/js/main.js"></script>
    <?php 
        if(isset($_GET['alert'])){
            if($_GET['alert'] == "gagal"){
                echo "<script>$('#loginFailedModal').modal('show');</script>";
            } else if($_GET['alert'] == "logout"){
                echo "<script>$('#logoutFailedModal').modal('show');</script>";
            } else if($_GET['alert'] == "belum_login"){
                echo "<script>$('#loginFailedModal').modal('show')";
            }
        }
    ?>
</body>

</html>
