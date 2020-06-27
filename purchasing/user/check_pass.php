<?php require_once("../config/koneksi.php");
    session_start();
    
include "../config/koneksi.php";
include "library/controllers.php";
$perintah = new oop();
@$table = "tbl_user";

@$kode = '$_GET[kode]';
@$form = "login.php?menu=home";



if (isset($_POST['ganti'])) {

$sql=mysqli_query($con,"UPDATE $table SET password = '$_POST[password]' WHERE username='$_GET[kode]' "); 
if($sql){ 
 echo "<script>alert('Berhasil');document.location.href='https://eithree.000webhostapp.com/user/login.php'</script>";
}else{ 
 echo"Gagal"; 
}
              
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

    <title>Silahkan Ganti Password</title>

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
        <h2 class="form-signin-heading" style="color: #0033cc"><center> Welcome</center></h2>
        <?php 
        $sql = "select * from $table where username = '$_GET[kode]'";
        $query = mysqli_query($con, $sql);
        while($data = mysqli_fetch_array($query)){
          $usernameid = $data['username'];
          
        ?>
        <h5 class="baru" style="color: #0033cc"><center><?php echo $data['username']; ?></center> </h5>
        <input name="password" id="pass" type="password" class="form-control" placeholder="Password" required>
        <br>
       <br>
        <input class="btn btn-lg btn-danger btn-block" name="ganti" type="submit" value="Ganti"></button>
      </form>
        <?php } ?>
      
</div>
    </div>
    
    
      
  </body>
</html>
