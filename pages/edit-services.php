<?php 
    // Mengambil data id dari URL
    $id = $_GET["id"];

    $service = query ("SELECT * FROM services WHERE id = $id")[0];


    // Jika tombol submit ditekan
    if (isset ($_POST["submit"])) {
        
        // Cek berhasil atau tidak mengubah data
        if (edit_service ($_POST) > 0) {
            echo "
            <script>
                alert('Data Berhasil Di edit!');
                document.location.href = 'admin.php?p=add-services';
            </script>";
        }else {
            echo "
            <script>
                alert('Data Gagal Di edit!');
                document.location.href = 'admin.php?p=add-services';
            </script>";
        }
    }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Services</h1>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="admin.php?p=add-services">List Services</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Services</li>

            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                    Form Edit Services
                </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <div>
                    <input type="hidden" name="id" value="<?= $service["id"];?>">
                    </div>
                    <div class="form-group row">
                      <label for="nama_item" class="col-sm-3 col-form-label">Nama Item</label>
                      <div class="col-sm-9">
                        <input id="nama_item" type="text" name="nama_item" class="form-control" placeholder="Nama Item" required value="<?= $service["nama_item"];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                      <div class="col-sm-9">
                        <input id="harga" type="number" name="harga" class="form-control" placeholder="Harga" required value="<?= $service["harga"];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                    <select class="select2-single form-control" id="kategori" type="text" name="kategori">
                    <?php if($service['kategori'] == "Tune Up"){ ?>
                        <option name="kategori" value="<?= $service["kategori"];?>"><?= $service["kategori"];?></option>
                        <option name="kategori" value="Sparepart">Sparepart</option>
                        <?php }else if($service['kategori'] == "Sparepart"){ ?>
                            <option name="kategori" value="<?= $service["kategori"];?>"><?= $service["kategori"];?></option>
                        <option name="kategori" value="Tune Up">Tune Up</option>
                        <?php } ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="kendaraan" class="col-sm-3 col-form-label">Kendaraan</label>
                    <div class="col-sm-9">
                    <select class="select2-single form-control" id="kendaraan" type="text" name="kendaraan">
                    <?php if($service['kendaraan'] == "mobil"){ ?>
                        <option name="kendaraan" value="<?= $service["kendaraan"];?>"><?= $service["kendaraan"];?></option>
                        <option name="kendaraan" value="motor">motor</option>
                        <?php }else if($service['kendaraan'] == "motor"){ ?>
                            <option name="kendaraan" value="<?= $service["kendaraan"];?>"><?= $service["kendaraan"];?></option>
                        <option name="kendaraan" value="mobil">mobil</option>
                        <?php } ?>
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
                        <button type="submit" name="submit" class="btn btn-primary">Edit Account</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
          </div>