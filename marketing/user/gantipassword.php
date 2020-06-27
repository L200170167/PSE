<?php require_once("../config/koneksi.php");
    session_start();
    
include "../config/koneksi.php";
include "library/controllers.php";
$perintah = new oop();
@$table = "tbl_user";

@$form = "login.php?menu=home";



if (isset($_POST['ganti'])) {
  
    $sql = "select * from $table where email = '$_POST[email]'";
  $query = mysqli_query($con, $sql);
  while($data = mysqli_fetch_array($query)){
  echo $data['username'];
  $kodeunik = $data['username'];
  }

    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer; 
    $mail->isSMTP(); 
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );
    $teruntuk = $_POST['email'];
    
    $mail->SMTPAuth = true; 
    $mail->Username = 'public.maulana@gmail.com'; 
    $mail->Password = 'eithree123'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; 
    $mail->setFrom($teruntuk, 'Eithree Shop');
    $mail->addAddress($teruntuk, 'Eithree Shop'); 
    $mail->isHTML(true);
    $mail->Subject = 'Silahkan Ganti Password';

    $message = 
    "
    <html>
    <head> 
    <title>Ganti Password</title> 
    </head> 
    <body> 
    <p>Silahkan Verifikasi Link Untuk Ganti Password <a href='http://eithree.000webhostapp.com/user/check_pass.php?kode=".$kodeunik."'>Aktiv<a></p> 
    </body>
    </html>
    ";
 
    $mail->Body = $message;
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo "<script>alert('Silahkan Cek Email yang didaftarkan');document.location.href='login.php'</script>";
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
        <h2 class="form-signin-heading" style="color: #0033cc"><center> Welcome</center></h2>
        <h5 class="baru" style="color: #0033cc"><center>Lupa Password ?</center> </h5>
        <input name="email" id="email" type="input" class="form-control" placeholder="Email Yang Didaftarkan" required autofocus>
        <br>
       <br>
        <input class="btn btn-lg btn-danger btn-block" name="ganti" type="submit" value="Masuk"></button>
      </form>
</div>
    </div>
    
    
      
  </body>
</html>
