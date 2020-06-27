<?php
class oop{

function login($con, $table, $username, $password, $redirect) {
        @session_start();
        $sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
        $query = mysqli_query($con, $sql);
        $tampil = mysqli_fetch_array($query);
        $cek = mysqli_num_rows($query);
        if ($cek > 0) {
            echo "<script>alert('Login Berhasil');document.location.href='$redirect'</script>";
        } else {
            echo "<script>alert('Login gagal cek username dan password !!');</script>";
        }
    }

function simpan($con, $table, $isi,$form){
        $sql = "INSERT INTO $table SET $isi";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<script>
                    alert('Success');
                    document.location.href='$form'
                  </script>";
        }else{
            echo "<script>
                    alert('Failed');
                    document.location.href='$form'
                  </script>";
        }
    }
function tampil($con, $table){
        $sql = "SELECT * FROM $table";
        $query = mysqli_query($con, $sql) or die( mysqli_error($con));
        while ($data = mysqli_fetch_array($query))
            $isi[] = $data;
        return $isi;
    }

function hapus($con, $table, $where, $form){
        $sql = "DELETE FROM $table WHERE $where";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<script>
                    alert('Success');
                    document.location.href='$form'
                  </script>";
        }else{
            echo "<script>
                    alert('Failed');
                    document.location.href='$form'
                  </script>";
        }
    }

    function edit($con, $table, $where){
        $sql = "SELECT * FROM $table WHERE $where";
        $query = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($query))
            $isi[] = $data;
        return $isi;
    }

    function ubah($con, $table,$isi, $where, $form){
        $sql = "UPDATE $table SET $isi WHERE $where";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "<script>
                    alert('Success');
                    document.location.href='$form'
                  </script>";
        }else{
            echo "<script>
                    alert('Failed');
                    document.location.href='$form'
                  </script>";
        }
    }

   function upload($gambar, $folder) {
        $tmp = $gambar['tmp_name'];
        $namafile = $gambar['name'];
        move_uploaded_file($tmp, "$folder/".$namafile);
        return $namafile;
    }
   
}

    ?>