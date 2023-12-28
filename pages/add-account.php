<?php 
    // Jika tombol submit ditekan
    if (isset ($_POST["submit"])) {
        
        // Cek berhasil atau tidak menambah data
        if (tambah ($_POST) > 0) {
            echo "
            <script>
                alert('New Account Successfully Created!');
                document.location.href = 'admin.php?p=registry-admin';
            </script>";
        }else {
            echo "
            <script>
                alert('Failed To Add Account');
                document.location.href = 'admin.php?p=add-account';
            </script>";
        }
    }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage New Account</h1>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="admin.php?p=registry-admin">Registry Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Acouunt</li>

            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                    Form Add Account
                </h1>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-6">
                <form action="admin.php?p=add-account" method="POST">
                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input id="username" type="text" name="username" class="form-control" placeholder="Username" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input id="email" type="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="level" class="col-sm-3 col-form-label">Level</label>
                      <div class="col-sm-9">
                        <input id="level" type="text" name="level" class="form-control" value="admin" disabled>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Add Account</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
          </div>