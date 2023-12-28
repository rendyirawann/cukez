<?php 
    // Mengambil data id dari URL
    $id = $_GET["id"];

    $user = query ("SELECT * FROM user WHERE id = $id")[0];


    // Jika tombol submit ditekan
    if (isset ($_POST["submit"])) {
        
        // Cek berhasil atau tidak mengubah data
        if (edit ($_POST) > 0) {
            echo "
            <script>
                alert('Data Berhasil Di edit!');
                document.location.href = 'admin.php?p=registry-admin';
            </script>";
        }else {
            echo "
            <script>
                alert('Data Gagal Di edit!');
                document.location.href = 'admin.php?p=registry-admin';
            </script>";
        }
    }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Account</h1>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="admin.php?p=registry-admin">Registry Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Acouunt</li>

            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                    Form Edit Account
                </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST">
                    <div>
                    <input type="hidden" name="id" value="<?= $user["id"];?>">
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input id="username" type="text" name="username" class="form-control" placeholder="Username" required value="<?= $user["username"];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input id="email" type="email" name="email" class="form-control" placeholder="Email" required value="<?= $user["email"];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required value="<?= $user["password"];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="level" class="col-sm-3 col-form-label">Level</label>
                      <div class="col-sm-9">
                        <input id="level" type="text" name="level" class="form-control" value="<?= $user["level"];?>">
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