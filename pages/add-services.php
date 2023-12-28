<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage New Services</h1>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Services</li>

            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                    Form Add Services
                </h1>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-6">
                <form action="admin.php?p=add-services" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="nama_item" class="col-sm-3 col-form-label">Nama Item</label>
                      <div class="col-sm-9">
                        <input id="nama_item" type="text" name="nama_item" class="form-control" placeholder="Nama Item" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                      <div class="col-sm-9">
                        <input id="harga" type="number" name="harga" class="form-control" placeholder="Harga" required>
                      </div>
                    </div>

                    <div class="form-group row">
                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                    <select class="select2-single form-control" id="kategori" type="text" name="kategori">
                            <option value="">- Pilih Kategori</option>
                            <option name="kategori" value="Tune Up">Tune Up</option>
                            <option name="kategori" value="Sparepart">Sparepart</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="kendaraan" class="col-sm-3 col-form-label">Kendaraan</label>
                    <div class="col-sm-9">
                    <select class="select2-single form-control" id="kendaraan" type="text" name="kendaraan">
                            <option value="">- Pilih Kendaraan</option>
                            <option name="kendaraan" value="mobil">Mobil</option>
                            <option name="kendaraan" value="motor">Motor</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="img" class="col-sm-3 col-form-label">Gambar Sparepart</label>
                      <div class="col-sm-9">
                      <input type="file" class="form-control-file border" id="img" name="img">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Add Services</button>
                      </div>
                    </div>
                  </form>
                  <?php 
  if(isset($_POST['submit'])){
    $nama_item = $_POST['nama_item'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $kendaraan = $_POST['kendaraan'];
    $img = $_FILES['img']['name'];
    $source = $_FILES['img']['tmp_name'];
    $folder = './upload/';

    move_uploaded_file($source, $folder.$img);
    $insert = mysqli_query($conn, "INSERT INTO services VALUES (NULL, '$nama_item', '$harga', '$kategori', '$kendaraan', '$img')");

    if($insert){
        echo "Berhasil Menambah Service";
    }
    else {
      echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
  }

   ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
            <hr>
              <h3 class="mb-3">List Sparepart</h3>
            </div>
          <?php 

$query = mysqli_query($conn, "SELECT * FROM services WHERE kategori='Sparepart'");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
  

?>
<?php foreach($result as $result) : ?>
            <div class="col-lg-3 mt-4">
            <div class="mt-5 card border mb-3" style="max-width: 18rem;">
          <div class="card-body">
<img class="card-img-top"  src="upload/<?php echo $result['img'] ?>" alt="Card image cap" style="width:191px; height:200px; border-radius:5px;">
    <h5 class="card-title"><?= $result['nama_item']; ?></h5>
  <p class="card-text"><?= rupiah($result['harga']); ?></p>
  <a href="admin.php?p=edit-services&id=<?php echo $result["id"];?>" class="btn btn-primary">Edit</a>
  <a href="admin.php?p=delete-services&id=<?php echo $result["id"];?>" class="btn btn-danger">Hapus</a>

</div>
</div>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <hr>
              <h3 class="mb-3 mt-4">List Tune Up</h3>
            </div>
          <?php 

$query = mysqli_query($conn, "SELECT * FROM services WHERE kategori='Tune Up'");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
  

?>
<?php foreach($result as $result) : ?>
            <div class="col-lg-3 mt-4">
            <div class="mt-5 card border mb-3" style="max-width: 18rem;">
          <div class="card-body">
<img class="card-img-top"  src="upload/<?php echo $result['img'] ?>" alt="Card image cap" style="width:191px; height:200px; border-radius:5px;">
    <h5 class="card-title"><?= $result['nama_item']; ?></h5>
  <p class="card-text"><?= rupiah($result['harga']); ?></p>
  <a href="admin.php?p=edit-services&id=<?php echo $result["id"];?>" class="btn btn-primary">Edit</a>
  <a href="admin.php?p=delete-service-item&id=<?php echo $result["id"];?>" class="btn btn-danger">Hapus</a>

</div>
</div>
            </div>
            <?php endforeach; ?>
          </div>
          </div>