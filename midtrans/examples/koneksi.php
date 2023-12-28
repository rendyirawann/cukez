<?php
session_start();
require_once "base.php";

date_default_timezone_set('Asia/Jakarta');
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "cukez";

//create connection
$conn = new mysqli($serverName, $username, $password, $dbName);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $conn->close();

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function signup($data)
{
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $nomor_handphone = htmlspecialchars($data["nomor_handphone"]);
    $password = htmlspecialchars($data["password"]);
    $passwordConfirmation = htmlspecialchars($data["passwordConfirmation"]);


    //cek apakah username sudah ada di database sebelumnya atau belum
    $result = mysqli_query($conn, "SELECT username,email FROM user WHERE (username = '$username') OR (email = '$email')");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
              alert('Username atau Email yang anda pilih telah terdaftar!<br>Silahkan Pilih Username atau Email Yang Lain');
              document.location.href = 'signup.php';
            </script>";
        return false;
    } else {
        mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password', '$email', 'user')");
    }
    return mysqli_affected_rows($conn);
}

function find($keyword)
{
    $query = "SELECT * FROM user
                WHERE
            username LIKE '%$keyword%' OR
            level LIKE '%$keyword%'
            ";
    return query($query);
}


// function find($keyword)
// {
//     $query = "(SELECT username, level, 'user' as type FROM user WHERE username LIKE '%" . 
//            $keyword . "%' OR level LIKE '%" . $keyword ."%') 
//            UNION
//            (SELECT atas_nama, jenis_mobil, 'riwayat' as type FROM riwayat WHERE atas_nama LIKE '%" . 
//            $keyword . "%' OR jenis_mobil LIKE '%" . $keyword ."%') 
//            UNION
//            (SELECT name, email, 'contact' as type FROM contact WHERE name LIKE '%" . 
//            $keyword . "%' OR email LIKE '%" . $keyword ."%')";
//     return query($query);
// }

function tambah($data)
{
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);

    //cek apakah username sudah ada di database sebelumnya atau belum
    $result = mysqli_query($conn, "SELECT username,email FROM user WHERE (username = '$username') OR (email = '$email')");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
              alert('Username Or Email is Already Taken!<br>Please Choose Another Username Or Email');
            </script>";
        return false;
    } else {
        mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password', '$email', 'admin')");
        return mysqli_affected_rows($conn);
    }

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data["email"]);
    $level = htmlspecialchars($data["level"]);

    $query = "UPDATE user SET
                username = '$username',
                password = '$password',
                email = '$email',
                level = '$level'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    mysqli_query($conn, "UPDATE user set id = id-1 WHERE id > $id");
    mysqli_query($conn, "ALTER TABLE user AUTO_INCREMENT = 1");

    return mysqli_affected_rows($conn);
}

function confirm_riwayat($data)
{
    global $conn;
    $id = $data["id"];
    $atas_nama = htmlspecialchars($data["atas_nama"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $nomor_plat = htmlspecialchars($data["nomor_plat"]);
    $tipe_mobil = htmlspecialchars($data["tipe_mobil"]);
    $jenis_mobil = htmlspecialchars($data["jenis_mobil"]);
    $total = htmlspecialchars($data["total"]);
    $tipe_pembayaran = htmlspecialchars($data["tipe_pembayaran"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal_reservasi = htmlspecialchars($data["tanggal_reservasi"]);
    $waktu_reservasi = htmlspecialchars($data["waktu_reservasi"]);
    $tanggal_pesan = htmlspecialchars($data["tanggal_pesan"]);
    $waktu_pesan = htmlspecialchars($data["waktu_pesan"]);
    $order_id = htmlspecialchars($data["order_id"]);
    $transaction_id = htmlspecialchars($data["transaction_id"]);

    $query = "UPDATE riwayat SET
                status = '$status'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_reserve($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM riwayat WHERE id = $id");
    // mysqli_query($conn, "UPDATE riwayat set id = id-1 WHERE id > $id");
    // mysqli_query($conn, "ALTER TABLE riwayat AUTO_INCREMENT = 1");

    return mysqli_affected_rows($conn);
}

function kirim_pesan($data)
{
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars($data["username"]);
    $subject = htmlspecialchars($data["subject"]);
    $message = htmlspecialchars($data["message"]);

    $query = "INSERT INTO contact VALUES (NULL, '$name', '$email', '$username', '$subject', '$message')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update_profile ($data)
{
    global $conn;
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $email = htmlspecialchars($data["email"]);

    $query = "UPDATE user SET
                password = '$password'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete_message($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM contact WHERE id = $id");
    mysqli_query($conn, "UPDATE contact set id = id-1 WHERE id > $id");
    mysqli_query($conn, "ALTER TABLE contact AUTO_INCREMENT = 1");

    return mysqli_affected_rows($conn);
}

function confirm_service($data)
{
    global $conn;
    $id = $data["id"];
    $atas_nama = htmlspecialchars($data["atas_nama"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $nomor_plat = htmlspecialchars($data["nomor_plat"]);
    $nama_item = htmlspecialchars($data["tipe_mobil"]);
    $jenis_kendaraan = htmlspecialchars($data["jenis_kendaraan"]);
    $total = htmlspecialchars($data["total"]);
    $tipe_pembayaran = htmlspecialchars($data["tipe_pembayaran"]);
    $status = htmlspecialchars($data["status"]);
    $tanggal_reservasi = htmlspecialchars($data["tanggal_reservasi"]);
    $waktu_reservasi = htmlspecialchars($data["waktu_reservasi"]);
    $tanggal_pesan = htmlspecialchars($data["tanggal_pesan"]);
    $waktu_pesan = htmlspecialchars($data["waktu_pesan"]);
    $order_id = htmlspecialchars($data["order_id"]);
    $transaction_id = htmlspecialchars($data["transaction_id"]);

    $query = "UPDATE riwayat_se SET
                status = '$status'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_service($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM services WHERE id = $id");
    // mysqli_query($conn, "UPDATE services set id = id-1 WHERE id > $id");
    // mysqli_query($conn, "ALTER TABLE services AUTO_INCREMENT = 1");

    return mysqli_affected_rows($conn);
}

function edit_service($data)
{
    global $conn;
    $id = $data["id"];
    $nama_item = htmlspecialchars($data["nama_item"]);
    $harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $kendaraan = htmlspecialchars($data["kendaraan"]);
    $img = $_FILES['img']['name'];
    $source = $_FILES['img']['tmp_name'];
    $folder = './upload/';

    $query = "UPDATE services SET
                nama_item = '$nama_item',
                harga = '$harga',
                kategori = '$kategori',
                kendaraan = '$kendaraan',
                img = '$img'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}