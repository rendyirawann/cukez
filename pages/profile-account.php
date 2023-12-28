<?php 

$user = query ("SELECT * FROM user WHERE username='".$_SESSION['username']."'"); 

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Setting Account</li>
            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>Your Profile Account</h1>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-lg-6">
            <form action="" method="POST">
            <div>
                    <input type="hidden" name="id" value="<?= $_SESSION["id"];?>">
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="<?= $_SESSION["username"];?>">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input id="email" type="text" name="email" class="form-control" placeholder="Email" value="<?= $_SESSION["email"];?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password" value="<?= $_SESSION["password"];?>">
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input id="nama_lengkap" type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= $_SESSION["nama_lengkap"];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nomor_handphone" class="col-sm-3 col-form-label">Nomor Handphone</label>
                      <div class="col-sm-9">
                        <input id="nomor_handphone" type="text" name="nomor_handphone" class="form-control" placeholder="Nomor Handphone" value="<?= $_SESSION["nomor_handphone"];?>">
                      </div>
                    </div> -->
                   
                    <!-- <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Update Profil Anda ?')">Update Profil</button>
                      </div>
                    </div> -->
                  </form>
            </div>
          </div>
          </div>