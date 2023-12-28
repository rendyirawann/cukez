<?php
error_reporting(1);
require "../base/koneksi.php";
if($_SESSION['level']=="admin"){
}elseif($_SESSION['level']=="user") {
}else {
   echo "<script>
              alert('You Must Login First');
              document.location.href = '../login.php';
              </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Cukez - Report Print</title>
<!--  -->
<link rel="shortcut icon" href="<?= BASE_URL ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/shared/iconly.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/pages/fontawesome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 -->
  <link href="<?= BASE_URL ?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap DatePicker -->  
  <link href="<?= BASE_URL ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
  <!-- Bootstrap Touchspin -->
  <link href="<?= BASE_URL ?>vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet" >
  <!-- ClockPicker -->
  <link href="<?= BASE_URL ?>vendor/clock-picker/clockpicker.css" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">

<div class="row mt-2 mb-3 mt-4">
    <div class="col-lg-12">
    <center><h2> <img src="../assets/img/logo.png" alt="CUKEZ" / style="width:46px;"> CUKEZ</h2></center>
    </div>
</div>

<div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Report Services</h6>
        </div>
        <div class="table-responsive p-3">
          <table style="font-size:12px;" class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
              <th>Username</th>
                <th>Atas Nama</th>
                <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?> 
                <th>Nomor Handphone</th>
                <?php  }else{ // if user is not logged in then display these buttons?>
                  <?php } ?> 
                <th>Nomor Plat</th>
                <th>Nama Item</th>
                <th>Jenis Kendaraan</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th>Tanggal Reservasi</th>
                <th>Waktu Reservasi</th>
                <th>Tanggal Reservasi Dibuat</th>
                <th>Waktu Reservasi Dibuat</th>
                
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>Username</th>
                <th>Atas Nama</th>
                <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?> 
                <th>Nomor Handphone</th>
                <?php  }else{ // if user is not logged in then display these buttons?>
                  <?php } ?> 
                <th>Nomor Plat</th>
                <th>Nama Item</th>
                <th>Jenis Kendaraan</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th>Tanggal Reservasi</th>
                <th>Waktu Reservasi</th>
                <th>Tanggal Reservasi Dibuat</th>
                <th>Waktu Reservasi Dibuat</th>
                
              </tr>
            </tfoot>
            <tbody style="font-weight: bold; color:darkblue;">
            <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {$riwayat_se = "SELECT * FROM riwayat_se WHERE status='5' ORDER BY id ASC";
      $result = $conn->query($riwayat_se);
   
    ?> 
    <?php  }else $riwayat_se = "SELECT * FROM riwayat_se WHERE (username='".$_SESSION['username']."' AND status='5') ORDER BY id ASC";
      $result = $conn->query($riwayat_se);{ // if user is not logged in then display these buttons?>
                  <?php } ?> 
                    
                  <?php    while ($row = $result->fetch_array()) { ?>
              <tr>
              <td>
                  <?= $row['username']; ?>
                </td>
                <td>
                  <?= ucfirst($row['atas_nama']); ?>
                </td>
                <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?> 
                <td>
                  <?= $row['no_hp'] ?>
                </td>
                <?php  }else{ // if user is not logged in then display these buttons?>
                  <?php } ?> 
                <td>
                  <?= $row['nomor_plat'] ?>
                </td>
                <td>
                  <?= $row['nama_item'] ?>
                </td>
                <td>
                  <?= $row['jenis_kendaraan'] ?>
                </td>
                <td>
                  <?= "Rp " . rupiah($row['total']) ?>
                </td>
                <td>
                  <?= ucfirst($row['tipe_pembayaran']); ?>
                </td>
                <?php if($row['status'] == "0"){ ?>
                <td><?= "<span class='badge badge-danger'>Gagal</span>"; ?></td>
                  <?php }else if($row['status'] == "1"){ ?>
                    <td><?= "<span class='badge badge-info'>Pending</span>";?></td>
                  <?php }else if($row['status'] == "2"){ ?>
                    <td><?= "<span class='badge badge-success'>Payment Success</span>";?></td>
                  <?php }else if($row['status'] == "3"){ ?>
                    <td><?= "<span class='badge badge-info'>Pick Up</span>";?></td>
                  <?php }else if($row['status'] == "4"){ ?>
                    <td><?= "<span class='badge badge-info'>Process</span>";?></td>
                  <?php }else if($row['status'] == "5"){ ?>
                    <td><?= "<span class='badge badge-success'>Finished</span>";?></td>
                  <?php } ?>
                <td>
                  <?= $row['tanggal_reservasi'] ?>
                </td>
                <td>
                  <?= $row['waktu_reservasi'] ?>
                </td>
                <td>
                  <?= $row['tanggal_pesan'] ?>
                </td>
                <td>
                  <?= $row['waktu_pesan'] ?>
                </td>

              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br>
  <p><center><i>" CUKEZ CUCI BERKELAZ ".</i></center></p>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
<script src="<?= BASE_URL ?>js/cukez-admin.min.js"></script>
<script src="<?= BASE_URL ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= BASE_URL ?>js/demo/chart-area-demo.js"></script>
<script src="<?= BASE_URL ?>assets/js/app.js"></script>
<!-- <script src="<?= BASE_URL ?>assets/js/pages/dashboard.js"></script> -->
<!-- Page level plugins -->
<script src="<?= BASE_URL ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASE_URL ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Select2 -->
  <script src="<?= BASE_URL ?>vendor/select2/dist/js/select2.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="<?= BASE_URL ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap Touchspin -->
  <script src="<?= BASE_URL ?>vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <!-- ClockPicker -->
  <script src="<?= BASE_URL ?>vendor/clock-picker/clockpicker.js"></script>
 <!-- Latest compiled and minified JavaScript -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
