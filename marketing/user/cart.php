<?php
include "../config/koneksi.php";
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['kode_barang'])) {
                $kode_barang = $_GET['kode_barang'];
                if (isset($_SESSION['items'][$kode_barang])) {
                    $_SESSION['items'][$kode_barang] += 1;
                } else {
                    $_SESSION['items'][$kode_barang] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['kode_barang'])) {
                $barang_id = $_GET['kode_barang'];
                if (isset($_SESSION['items'][$kode_barang])) {
                    $_SESSION['items'][$kode_barang] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['kode_barang'])) {
                $kode_barang = $_GET['barang_id'];
                if (isset($_SESSION['items'][$kode_barang])) {
                    $_SESSION['items'][$kode_barang] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['kode_barang'])) {
                $kode_barang = $_GET['kode_barang'];
                if (isset($_SESSION['items'][$kode_barang])) {
                    unset($_SESSION['items'][$kode_barang]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }
?>