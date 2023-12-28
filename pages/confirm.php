<?php 
    // Mengambil data id dari URL
    $id = $_GET["id"];

    $riwayat = query ("SELECT * FROM riwayat WHERE id = $id")[0];


    // Jika tombol submit ditekan
    if (isset ($_POST["submit"])) {
        
        // Cek berhasil atau tidak mengubah data
        if (confirm_riwayat ($_POST) > 0) {
            echo "
            <script>
                alert('Data Berhasil Di Konfirmasi!');
                document.location.href = 'admin.php?p=reservation';
            </script>";
        }else {
            echo "
            <script>
                alert('Data Gagal Di Konfirmasi!');
                document.location.href = 'admin.php?p=reservation';
            </script>";
        }
    }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Confirm Reservation</h1>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="admin.php?p=reservation">History Reservation</a></li>
              <li class="breadcrumb-item active" aria-current="page">Confirm Reservation</li>

            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                Manage Reservation
                </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <table border="1">
                <form action="" method="POST">
                    <div>
                    <input type="hidden" name="id" value="<?= $riwayat["id"];?>">
                    </div>
                    <div class="form-group row">
                      <label for="atas_nama" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input id="username" type="text" name="username" class="form-control" placeholder="Username" required value="<?= $riwayat["username"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="atas_nama" class="col-sm-3 col-form-label">Atas Nama</label>
                      <div class="col-sm-9">
                        <input id="atas_nama" type="text" name="atas_nama" class="form-control" placeholder="Atas Nama" required value="<?= $riwayat["atas_nama"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="no_hp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                      <div class="col-sm-9">
                        <input id="no_hp" type="text" name="no_hp" class="form-control" placeholder="Nomor HP" required value="<?= $riwayat["no_hp"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nomor_plat" class="col-sm-3 col-form-label">Nomor Plat</label>
                      <div class="col-sm-9">
                        <input id="nomor_plat" type="text" name="nomor_plat" class="form-control" placeholder="Nomor Plat" required value="<?= $riwayat["nomor_plat"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tipe_mobil" class="col-sm-3 col-form-label">Tipe Mobil</label>
                      <div class="col-sm-9">
                        <input id="tipe_mobil" type="text" name="tipe_mobil" class="form-control" placeholder="Tipe Mobil" required value="<?= $riwayat["tipe_mobil"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jenis_mobil" class="col-sm-3 col-form-label">Jenis Mobil</label>
                      <div class="col-sm-9">
                        <input id="jenis_mobil" type="text" name="jenis_mobil" class="form-control" placeholder="Jenis Mobil" required value="<?= $riwayat["jenis_mobil"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="total" class="col-sm-3 col-form-label">Total</label>
                      <div class="col-sm-9">
                        <input id="total" type="text" name="total" class="form-control" placeholder="Total" required value="<?= $riwayat["total"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="tipe_pembayaran" class="col-sm-3 col-form-label">Pembayaran</label>
                      <div class="col-sm-9">
                        <input id="tipe_pembayaran" type="text" name="tipe_pembayaran" class="form-control" placeholder="Tipe Pembayaran" required value="<?= $riwayat["tipe_pembayaran"];?>" disabled>
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipe_mobil" class="col-sm-3 col-form-label">Status</label>
                         <div class="col-sm-9">
                        <select class="select2-single form-control" id="status" type="text" name="status">
                        <?php if($riwayat['status'] == "0"){ ?>
                    <option name="status" value="<?= $riwayat["status"];?>">Gagal</option>
                    <!-- <option name="status" value="Gagal">Gagal</option> -->
                    <option name="status" value="1">Pending</option>
                    <option name="status" value="2">Payment Success</option>
                    <option name="status" value="3">Pick Up</option>
                    <option name="status" value="4">Process Wash</option>
                    <option name="status" value="5">Finished</option>
                    <?php }else if($riwayat['status'] == "1"){ ?>
                      <option name="status" value="<?= $riwayat["status"];?>">Pending</option>
                    <option name="status" value="0">Gagal</option>
                    <option name="status" value="2">Payment Success</option>
                    <!-- <option name="status" value="Pending">Pending</option> -->
                    <option name="status" value="3">Pick Up</option>
                    <option name="status" value="4">Process Wash</option>
                    <option name="status" value="5">Finished</option>
                    <?php }else if($riwayat['status'] == "2"){ ?>
                      <option name="status" value="<?= $riwayat["status"];?>">Payment Success</option>
                    <option name="status" value="0">Gagal</option>
                    <option name="status" value="1">Pending</option>
                    <!-- <option name="status" value="Pickup">Pickup</option> -->
                    <option name="status" value="3">Pick Up</option>
                    <option name="status" value="4">Process Wash</option>
                    <option name="status" value="5">Finished</option>
                    <?php }else if($riwayat['status'] == "3"){ ?>
                      <option name="status" value="<?= $riwayat["status"];?>">Pick Up</option>
                    <option name="status" value="0">Gagal</option>
                    <option name="status" value="1">Pending</option>
                    <!-- <option name="status" value="Proses Cuci">Proses Cuci</option> -->
                    <option name="status" value="4">Process Wash</option>
                    <option name="status" value="5">Finished</option>
                    <?php }else if($riwayat['status'] == "4"){ ?>
                      <option name="status" value="<?= $riwayat["status"];?>">Process Wash</option>
                    <option name="status" value="0">Gagal</option>
                    <option name="status" value="1">Pending</option>
                    <option name="status" value="2">Payment Success</option>
                    <!-- <option name="status" value="Proses Cuci">Proses Cuci</option> -->
                    <option name="status" value="3">Pick Up</option>
                    <option name="status" value="5">Finished</option>
                    <?php }else if($riwayat['status'] == "5"){ ?>
                      <option name="status" value="<?= $riwayat["status"];?>">Finished</option>
                    <option name="status" value="0">Gagal</option>
                    <option name="status" value="2">Payment Success</option>
                    <option name="status" value="1">Pending</option>
                    <option name="status" value="3">Pick Up</option>
                    <option name="status" value="4">Process Wash</option>
                    <!-- <option name="status" value="Selesai">Selesai</option> -->
                    <?php } ?>
                  </select>
                </div>
              </div>
                    <div class="form-group row">
                      <label for="tanggal_reservasi" class="col-sm-3 col-form-label">Tanggal Reservasi</label>
                      <div class="col-sm-9">
                        <input id="tanggal_reservasi" type="text" name="tanggal_reservasi" class="form-control" placeholder="Username" required value="<?= $riwayat["tanggal_reservasi"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="waktu_reservasi" class="col-sm-3 col-form-label">Waktu Reservasi</label>
                      <div class="col-sm-9">
                        <input id="waktu_reservasi" type="text" name="waktu_reservasi" class="form-control" placeholder="Username" required value="<?= $riwayat["waktu_reservasi"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <!-- <label for="order_id" class="col-sm-3 col-form-label">Order ID</label> -->
                      <div class="col-sm-9">
                        <input id="order_id" type="hidden" name="order_id" class="form-control" placeholder="Order Id" required value="<?= $riwayat["order_id"];?>" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <!-- <label for="transaction_id" class="col-sm-3 col-form-label">Transaction ID</label> -->
                      <div class="col-sm-9">
                        <input id="transaction_id" type="hidden" name="transaction_id" class="form-control" placeholder="Transaction ID" required value="<?= $riwayat["transaction_id"];?>" disabled>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Yakin mau konfirmasi data ini ?')">Confirm Reservation</button>
                      </div>
                    </div>
                  </form>
                  </table>
            </div>
          </div>
          </div>