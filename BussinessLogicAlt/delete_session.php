<?php
require "../base/koneksi.php";

$id = $_GET['id'];
unset($_SESSION['atas_nama']);
unset($_SESSION['no_hp']);
unset($_SESSION['nomor_plat']);
unset($_SESSION['jenis_kendaraan']);
unset($_SESSION['tanggal_reservasi']);
unset($_SESSION['waktu_reservasi']);
header("Location: ../order_se.php");
