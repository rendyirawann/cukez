<?php
require "../base/koneksi.php";

$id = $_GET['id'];
$quantity = $_GET['quantity'];
$nama_tamu = $_GET['nama_tamu'];

$query = $conn->query("SELECT * FROM pricelist WHERE id = '$id'")->fetch_object();

//inisialiasi session product
$_SESSION["cart"][$id] = [
    'tipe_mobil' => $query->tipe_mobil,
    'harga' => $query->harga,
    'jumlah' => $quantity,
    'nama_tamu' => $nama_tamu
];

header("Location: ../order.php");
