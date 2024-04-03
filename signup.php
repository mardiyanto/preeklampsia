<!doctype html>
<html lang="en" class="purple-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Register · GoFurniture</title>

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
</head>

<body>
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="tema/img/logo.png" alt="logo">
            <h1><span class="font-weight-light">Go</span>preeklampsia</h1>
            <div class="laoderhorizontal"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
    <?php
    include 'koneksi.php';
// Periksa apakah ada pengiriman formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui formulir
    $user_nama = $_POST['user_nama'];
    $user_username = $_POST['user_username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Anda harus mengenkripsi password sebelum menyimpannya ke database

    // Query SQL untuk menyimpan data ke dalam tabel user
    $query = "INSERT INTO user (user_nama, user_username, email, user_password,status) 
              VALUES ('$user_nama', '$user_username', '$email', '$password', 'user')";

    // Jalankan query
    if ($koneksi->query($query) === TRUE) {
        echo "<script>window.alert('Data berhasil disimpan Silahkan Login'); window.location=('index.php')</script>";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>

    <div class="row no-gutters vh-100 proh bg-template">
        <img src="tema/img/image-4.png" alt="logo" class="apple right-image align-self-center">
        <div class="col align-self-center px-3  text-center">
            <img src="tema/img/logo.png" alt="logo" class="logo-small">
            <h2 class="text-white"><span class="font-weight-light">Sign</span>In</h2>
            <form class="form-signin shadow" action="" method="POST">
                 <div class="form-group float-label active">
                    <input type="text" class="form-control" name='user_nama' required  autofocus>
                    <label class="form-control-label">Name Lengkap</label>
                </div>
                <div class="form-group float-label active">
                    <input type="text" class="form-control" name='user_username' required autofocus >
                    <label class="form-control-label">User Login</label>
                </div>
                <div class="form-group float-label active">
                    <input type="email" id="inputEmail" name='email' class="form-control"  required autofocus>
                    <label for="inputEmail" class="form-control-label">Email address</label>
                </div>

                <div class="form-group float-label">
                    <input type="password" id="inputPassword" name='password' class="form-control" required>
                    <label for="inputPassword" class="form-control-label">Password</label>
                </div>

                <div class="form-group my-4 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme" autofocus>
                        <label class="custom-control-label" for="rememberme">I accept <a href="#">Terms and Condition</a></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <button type="submit"  class="btn btn-lg btn-default btn-rounded shadow"><span>Sign Up</span><i class="material-icons">arrow_forward</i></button>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                Already have account?<br>
                <a href="index.php">Sign In</a> here.
            </p>
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

</body>

</html>
