<?php
error_reporting(1);
require "base/koneksi.php";
require_once __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
// use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Printer;

$message = "";
$messageError = "";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //inisialisasi username dari login
    // $quantity = $_POST['quantity'];
    $tanggalPesan = time();
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $atas_nama = $_SESSION['atas_nama'];
    $no_hp = $_SESSION['no_hp'];
    $nomor_plat = $_SESSION['nomor_plat'];
    $jenis_mobil = $_SESSION['jenis_mobil'];
    $tanggal_reservasi = $_SESSION['tanggal_reservasi'];
    $waktu_reservasi = $_SESSION['waktu_reservasi'];
    $tanggal = date("Y-m-d", $tanggalPesan);
    $waktuPesan = date("H:i:s", $tanggalPesan);
    $randomid = (rand(1,1000000));
    if (isset($_POST['bayar'])) {
        $tipe_pembayaran = $_POST['tipe_pembayaran'];
        if (empty($tipe_pembayaran)) {
            $messageError = "Tipe Pembayaran Harus Diisi";
        } else if (empty($atas_nama)) {
            $messageError = "Nama Pemesan Harus Diisi";
        } else {
            foreach ($_SESSION['cart'] as $cart => $value) {
                // $query .= "('$cart', '$value[nama]', '$value[harga]', '$value[jumlah]', '$value[total]', '$value[nama_tamu]', '$tanggalPesan')";
                $query = "INSERT INTO riwayat (username, email, atas_nama, no_hp, nomor_plat, tipe_mobil, jenis_mobil, jumlah, total, tipe_pembayaran, status, tanggal_reservasi, waktu_reservasi, tanggal_pesan, waktu_pesan, order_id, transaction_id) VALUES ('$username', '$email', '$atas_nama', '$no_hp', '$nomor_plat', '$value[tipe_mobil]', '$jenis_mobil', '$value[jumlah]', '$value[harga]', '$tipe_pembayaran', '1', '$tanggal_reservasi', '$waktu_reservasi', '$tanggal', '$waktuPesan', '$randomid', '$randomid')";
                $result = $conn->query($query);
            }
            if ($result) {
                $message = "Reservasi Berhasil Dibuat";
                unset($_SESSION['cart']);
                unset($_SESSION['atas_nama']);
                unset($_SESSION['no_hp']);
                unset($_SESSION['nomor_plat']);
                unset($_SESSION['jenis_mobil']);
                unset($_SESSION['tanggal_reservasi']);
                unset($_SESSION['waktu_reservasi']);
            } else {
                $messageError = "Gagal!";
            }
        }
    }
} else {
    header("Location: login.php");
}
include "pages/header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manage Reservation</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Form Reservation</li>

    </ol>
</div>

<div class="col-sm-4">
    <?php
    if (isset($_POST['submit'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['atas_nama'] = $_POST['atas_nama'];
        $_SESSION['no_hp'] = $_POST['no_hp'];
        $_SESSION['nomor_plat'] = $_POST['nomor_plat'];
        $_SESSION['jenis_mobil'] = $_POST['jenis_mobil'];
        $_SESSION['tanggal_reservasi'] = $_POST['tanggal_reservasi'];
        $_SESSION['waktu_reservasi'] = $_POST['waktu_reservasi'];
    } ?>
    <form action="" method="post">
        <div class="card">
            <h5 class="card-header">Reserver Details</h5>
            <div class="card-body">
            <input class="form-control" type="hidden" id="user" name="username" value="<?= $_SESSION['username'];?>">
            <input class="form-control" type="hidden" id="email" name="email" value="<?= $_SESSION['email'];?>">
                <input class="form-control" type="text" id="namaPemesan" name="atas_nama" placeholder="Nama Pemesan">
                <input class="form-control mt-2" type="text" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
                <input class="form-control mt-2" type="text" id="nomor_plat" name="nomor_plat" placeholder="Nomor Plat">
                <input class="form-control mt-2 mb-2" type="text" id="jenis_mobil" name="jenis_mobil"
                    placeholder="Jenis Kendaraan">
                <div id="simple-date1">
                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input name="tanggal_reservasi" type="text" class="form-control" value="Tanggal Reservasi"
                            id="simpleDataInput">
                    </div>
                </div>

                <div class="input-group clockpicker mt-2" id="clockPicker2">
                    <input name="waktu_reservasi" type="text" class="form-control" value="Waktu Reservasi">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-success mb-3 mt-3">Tambah</button>
            </div>
        </div>
    </form>
    <br>
</div>
<section class="section">
    <?php
    if ($message != null) { ?>
    <script>
        Swal.fire('Berhasil!', '<?= $message ?>', 'success');
    </script>
    <?php } else if ($messageError != null) { ?>
    <script>
        Swal.fire('Gagal!', '<?= $messageError ?>', 'error');
    </script>
    <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="mobil-tab" data-bs-toggle="tab" href="#mobil" role="tab"
                                aria-controls="mobil" aria-selected="true">Car Type</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="-tab" data-bs-toggle="tab" href="#motor" role="tab" aria-controls="motor" aria-selected="false">Bike Type</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="mobil" role="tabpanel" aria-labelledby="mobil-tab">
                            <div class="row">
                                <?php
                                $mobil = $conn->query("SELECT * FROM pricelist WHERE kategori = 'mobil'");
                                while ($row = $mobil->fetch_assoc()) { ?>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="mt-5 card border mb-3" style="max-width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= $row['tipe_mobil']; ?>
                                            </h5>
                                            <p class="card-text">
                                                <?= rupiah($row['harga']); ?>
                                            </p>
                                            <input class="form-control form-control-sm quantity" name="quantity"
                                                type="hidden" id="input_<?= $row['id']; ?>" placeholder=" Jumlah"
                                                value="1"><br>
                                            <button class="btn btn-primary add-order" id="<?= $row['id']; ?>"
                                                onclick="addOrder(<?= $row['id']; ?>);">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <p>Didn't know your Car Type? here, click button bellow to look your Car's Type</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="#modalScroll">What's Your Car Type?</button>

                    <!-- Modal Scrollable -->
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">What's Your Car Type?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5 class="font-weight-bold">Car Type</h5>
                  <hr>
                  <h6 class="font-weight-bold">Sedan</h6>
                  <hr>
                  <p>1. Toyota Vios<br>
2. Nissan Skyline<br>
3. Honda City<br>
4. Honda Civic<br>
5. KIA Optima<br>
6. Toyota Corolla Altis<br>
7. Honda Accord<br>
8. Nissan Teana<br>
9. Toyota Camry<br>
10. Mazda 6<br>
11. BMW Seri 3<br>
12. Mercedes-Benz C-Class<br>
13. Hyundai Ioniq Electric<br></p>
<hr>
                  <h6 class="font-weight-bold">SUV</h6>
                  <hr>
                  <p>1. Toyota Rush<br>
2. Honda HR-V<br>
3. Wuling Almaz<br>
4. Toyota Corolla Cross<br>
5. Suzuki XL7<br>
6. Hyundai Kona Electric<br>
7. Mitsubishi Pajero Sport<br>
8. Toyota Fortuner<br>
9. Honda CR-V<br>
10. BMW X1<br>
11. Hyundai Palisade<br>
12. Hyundai Santa Fe<br>
13. Mitsubishi Eclipse Cross<br></p>
<hr>
                  <h6 class="font-weight-bold">MiniBus</h6>
                  <hr>
                  <p>1. Daihatsu Gran Max<br>
2. Daihatsu Luxio<br>
3. Nissan Evalia<br>
4. Suzuki APV<br>
5. Toyota Kijang<br>
6. Kia Carnival<br>
7. Hyundai H1<br>
8. Volkswagen Caravelle<br>
9. Toyota Alphard<br>
10. Mercedes-Benz V-Class<br></p>
<hr>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>
                        </div>
                        
                        <div class="tab-pane fade" id="motor" role="tabpanel" aria-labelledby="motor-tab">
                            <div class="row">
                                <?php
                                $motor = $conn->query("SELECT * FROM pricelist WHERE kategori = 'motor'");
                                while ($row = $motor->fetch_assoc()) { ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <div class="mt-5 card border mb-3" style="max-width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $row['tipe_mobil']; ?></h5>
                                                <p class="card-text"><?= rupiah($row['harga']); ?></p>
                                                <input class="form-control form-control-sm quantity" name="quantity"
                                                type="hidden" id="input_<?= $row['id']; ?>" placeholder=" Jumlah"
                                                value="1"><br>
                                            <button class="btn btn-primary add-order" id="<?= $row['id']; ?>"
                                                onclick="addOrder(<?= $row['id']; ?>);">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="page-heading mt-4">
    <h3>Reserved Detail</h3>
</div>

<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header"> Nama Pemesan :
                    <?= $_SESSION['atas_nama']; ?>
                </h5>
                <h5 class="card-header"> Nomor Handphone :
                    <?= $_SESSION['no_hp']; ?>
                </h5>
                <h5 class="card-header"> Nomor Plat :
                    <?= $_SESSION['nomor_plat']; ?>
                </h5>
                <h5 class="card-header"> Jenis Kendaraan :
                    <?= $_SESSION['jenis_mobil']; ?>
                </h5>
                <h5 class="card-header"> Tanggal Reservasi :
                    <?= $_SESSION['tanggal_reservasi']; ?>
                </h5>
                <h5 class="card-header"> Waktu Reservasi :
                    <?= $_SESSION['waktu_reservasi']; ?>
                </h5>

                <a href="<?= BASE_URL ?>BussinessLogic/delete_session.php?=<?= $atas_nama; ?>"
                                            class="btn btn-danger">Hapus</a>

                <div class="card-body">
                    <?php if (!empty($_SESSION['cart'])) { ?>
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Kendaraan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $grandTotal = 0;
                                    foreach ($_SESSION['cart'] as $cart => $value) {
                                        $total = $value['harga'] * $value['jumlah'];
                                    ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td id="namaPayment">
                                        <?= $value['tipe_mobil']; ?>
                                    </td>
                                    <td>
                                        <?= $value['jumlah']; ?>
                                    </td>
                                    <td>
                                        <?= rupiah($value['harga']); ?>
                                    </td>
                                    <td>
                                        <?= rupiah($total); ?>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL ?>BussinessLogic/delete_cart.php?id=<?= $cart; ?>"
                                            class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                        $grandTotal += $total;
                                    } ?>
                                <tr>
                                    <th colspan="4" class="text-right">Total</th>
                                    <th id="total">
                                        <?= rupiah($grandTotal); ?>
                                    </th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tr>
                                <td colspan="5" class="text-left">
                                    <p style="font-size:small; color:red;">Choose Midtrans for another payments (*ex: Credit Card, Bank, E-Wallet, etc.) </p>
                                    <p style="font-size:smaller; color:red;">If Midtrans server's down Choose DANA(Alt) or Cash</p>
                                    <p>Scan QR Below, if Payments using DANA(Alt)</p>
                                    
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
                    id="#modalCenter"><i class="fas fa-qrcode"></i> ScanMe</button>
                    <!-- Modal Center -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-qrcode"></i> ScanMe!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <img src="<?= BASE_URL ?>img/qr.jpg" alt="" class="img-fluid" style="width:320px;">
                <p><strong>*Mohon buat notes saat melakukan transaksi (sertakan nama lengkap dan plat nomor)</strong></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
              </div>
            </div>
          </div>
                                </td>
                                    <td colspan="5" class="text-right"></td>
                                    <td>
                                        <form action="" method="post">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipe_pembayaran"
                                                    id="inlineRadio1" value="dana">
                                                <label class="form-check-label" for="inlineRadio1">Dana(Alt)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipe_pembayaran"
                                                    id="inlineRadio2" value="midtrans">
                                                <label class="form-check-label" for="inlineRadio2">Midtrans</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipe_pembayaran"
                                                    id="inlineRadio3" value="cash" checked>
                                                <label class="form-check-label" for="inlineRadio3">Cash</label>
                                            </div>
                                            <button type="submit" name="bayar"
                                                class="btn btn-success justify-content-end"
                                                onclick="return confirm('Yakin ingin memasukkan pemesanan ini ke cart ?');">Konfirmasi</button>
                                        </form>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- Table with no outer spacing -->
                    <?php } else { ?>
                    <b>Pilih Tipe Kendaraan Anda</b>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    //change value quantity
    const addOrder = (id) => {
        const quantity = document.getElementById(`input_${id}`).value;
        // console.log(`Id : ` + id, `Quantity : ` + quantity);
        $.ajax({
            url: '<?= BASE_URL ?>BussinessLogic/add_cart.php',
            method: 'GET',
            data: {
                id: id,
                quantity: quantity
            },
            success: function (response) {
                location.reload();
                console.log("Reservasi Berhasil Ditambahkan");
            }
        });
    }
</script>
<?php
include "pages/footer.php";
?>