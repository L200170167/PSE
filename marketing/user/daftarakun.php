
<?php require_once("../config/koneksi.php");
    error_reporting(0);
    session_start();
    
include "../config/koneksi.php";
include "library/controllers.php";
$perintah = new oop();
@$table = "tbl_user";
$length = 5;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$kodeunik = $randomString;
@$isi = "nama_user = '$_POST[nama_user]', username = '$_POST[username]', password = '$_POST[password]', no_telp = '$_POST[no_telp]', jenis_kelamin = '$_POST[jenis_kelamin]', alamat = '$_POST[alamat]',kode='$kodeunik',email='$_POST[email]',status='T'";

@$form = "login.php";



if (isset($_POST['daftar'])) {
  if (empty($_POST["nama_user"]) or empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["no_telp"]) or empty($_POST["jenis_kelamin"]) or empty($_POST["alamat"])) {
    echo "<script>
          alert('Silahkan Lengkapi Data!!');
          </script>";
  }else{ 
    $sql = mysqli_query($con,"insert into tbl_user set $isi");

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
    $teruntuk1 = $_POST['username'];
    
    $mail->SMTPAuth = true; 
    $mail->Username = 'public.maulana@gmail.com'; 
    $mail->Password = 'eithree123'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587; 
    $mail->setFrom($teruntuk, 'Eithree Shop');
    $mail->addAddress($teruntuk, 'Eithree Shop'); 
    $mail->isHTML(true);
    $mail->Subject = 'Silahkan verifikasi kode dibawah ini';

    $message = 
    "
    <html>
    <head> 
    <title>Verification Account</title> 
    </head> 
    <body> 
    <p>Terimakasih Telah Bergabung, aktivasi <a href='http://eithree.000webhostapp.com/user/check.php?kode=".$kodeunik."'>Aktiv<a></p> 
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
	<title>Login Admin</title>
</head>
<body>
	<link href="css/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="css/dist/js/jquery-1.9.1.js"></script>
    <script src="css/dist/js/bootstrap.js"></script>

    <link href="signin.css" rel="stylesheet">

   
  </head>

  <body background="css/dist/login2.jpg">
    <br>
    <br>
    <br>
    <div class="container">
    	
    		
    		
    			
    					<form class="form-signin" method="post">
                            <CENTER><h1>DAFTAR AKUN</h1></CENTER>
    						
    							<label>Nama Lengkap</label>
    							<input type="text" name="nama_user" class="form-control" required>
    						
    						
    							<label>Username</label>
    							<input type="text" name="username" class="form-control" required>
    						
    						
    							<label>Password</label>
    							<input type="password" name="password" class="form-control" required>
    						
                            
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" required>
                            
    						
    							<label>No_Telp</label>
    							<input type="number" name="no_telp" class="form-control" required>
    						
    						
    							<label>Jenis Kelamin</label>
    							<select name="jenis_kelamin" class="form-control" required> 
    							<option value="perempuan">PEREMPUAN</option>
    							<option value="laki-laki">LAKI-LAKI</option>	
    							</select>
    						
    						
    							<label>Alamat</label>
    							<textarea required name="alamat" class="form-control"></textarea><br>
    						
    						<input type="submit" name="daftar" value="DAFTAR" class="btn btn-primary btn-block">
    					</form>
                            
    		
    	
    </div>
</body>
</html>