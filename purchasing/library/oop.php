<?php
class oop{

function login($con, $table, $username, $password, $redirect) {
        $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
        $query = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($query);
        if ($cek > 0) {
            echo "<script>alert('Login Berhasil');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Login gagal cek username dan password !!');</script>";
        }
    }

function daftar($con, $table, $isi,$form){
        $sql = "INSERT INTO $table SET $isi";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<script>
                    alert('Pendaftaran Berhasil');
                    document.location.href='$form'
                  </script>";
        }else{
            echo "<script>
                    alert('Pendaftaran Gagal');
                    document.location.href='daftarakun.php'
                  </script>";
        }
    }
}

?>
