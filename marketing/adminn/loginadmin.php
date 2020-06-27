<?php
session_start();
include "../config/koneksi.php";
include "library/controllers.php";
$perintah = new oop();
@$table = "tbl_admin";

@$username = $_POST['username'];
@$password = $_POST['password'];

@$redirect = "dashboard_admin.php?menu=home";


if (isset($_POST['login'])) {
    $sql = mysqli_query($con, "SELECT * FROM $table WHERE username = '$username' and password = '$password'");
    while($data = mysqli_fetch_array($sql)){
        $_SESSION['username'] = $data['username'];
    }
    $perintah->login($con, $table, $username, $password, $redirect);    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Tokol DistroIT">
    <meta name="author" content="Hakko Bio Richard">
    <link rel="icon" href="../../favicon.ico">

    <title>Silahkan Login Terlebih Dahulu</title>

    <!-- Bootstrap core CSS -->
    <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="css/dist/js/jquery-1.9.1.js"></script>
    <script src="css/dist/js/bootstrap.js"></script>

    <link href="signin.css" rel="stylesheet">

   
  </head>

  <body background="css/dist/login2.jpg" style="background-size: 100% no-repeat; ">

    <div class="container">
      <br>
      <br><br>
      <br><br>
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading" style="color: #0033cc"><center>Welcome Admin</center></h2>
        <h5 class="baru" style="color: #0033cc"><center>Login</center> </h5>
        <input name="username" id="user" type="input" class="form-control" placeholder="Username" required autofocus>
        <br>
        <input name="password" id="pass" type="password" class="form-control" placeholder="Password" required>
       <br>
        <input class="btn btn-lg btn-danger btn-block" name="login" type="submit" value="Masuk"></button>
      </form>
</div>
    </div>
    
    
      
  </body>
</html>
