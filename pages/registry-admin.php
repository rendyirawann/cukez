<?php 
	$user = query ("SELECT * FROM user"); 

	if (isset ($_POST["find"])) {
		$user = find($_POST["keyword"]);
	}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Registry CUKEZ's Account</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Registry Account</li>
            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                    Manage CUKEZ's Account
                </h1>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col add">
            <button type="button" class="btn add-acc"><a role="button" href="admin.php?p=add-account">+Add Account</a></button>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Table Information</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Account ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $row ) : ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["username"];?></td>
                        <td><pre>Password Encrypted</pre></td>
                        <td><span class="badge badge-success"><?php echo $row["level"];?></span></td>
                        <td><a href="admin.php?p=edit-account&id=<?php echo $row["id"];?>" class="btn btn-sm btn-primary">Edit</a> | <a class="btn btn-sm btn-danger" href="admin.php?p=delete-account&id=<?php echo $row["id"];?>" onclick="return confirm('Yakin mau hapus data ini ?')">Delete</a></td>
                      </tr>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
          </div>