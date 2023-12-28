<?php 
	$riwayat = query ("SELECT * FROM riwayat");

	if (isset ($_POST["find"])) {
		$riwayat = find($_POST["keyword"]);
	}
  
?>



<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">History Finished Order</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Finished Order</li>
  </ol>
</div>

<div class="container-fluid" id="container-wrapper">
  <div class="row mb-3">
    <div class="col">
      <h1>
        List Reservation
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col">
        <a class="btn btn-success mb-3 mt-3" href="pages/cetak_res.php"><i class="fas fa-print"></i> Cetak</a>
    </div>
  </div>

  <!-- Row -->
  <div class="row">

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
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
                <th>Tipe Mobil</th>
                <th>Jenis Mobil</th>
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
                <th>Tipe Mobil</th>
                <th>Jenis Mobil</th>
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
    {$riwayat = "SELECT * FROM riwayat WHERE status='5' ORDER BY status ASC";
      $result = $conn->query($riwayat);
   
    ?> 
    <?php  }else $riwayat = "SELECT * FROM riwayat WHERE (username='".$_SESSION['username']."' AND status='5') ORDER BY id ASC";
      $result = $conn->query($riwayat);{ // if user is not logged in then display these buttons?>
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
                  <?= $row['tipe_mobil'] ?>
                </td>
                <td>
                  <?= $row['jenis_mobil'] ?>
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
                    <td><?= "<span class='badge badge-info'>Process Wash</span>";?></td>
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
  <!--Row-->
</div>