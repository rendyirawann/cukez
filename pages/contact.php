<?php 
	$contact = query ("SELECT * FROM contact"); 

	if (isset ($_POST["find"])) {
		$contact = find($_POST["keyword"]);
	}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Message Center</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Message Inbox</li>
            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1>
                    List Incoming Message
                </h1>
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
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Username</th>
            <th>Subject</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody style="font-weight: bold; color:darkblue;">
        <?php foreach ($contact as $row ) : ?>
          <tr>
            <td>
              <?= ucfirst($row['name']); ?>
            </td>
            <td>
              <?= $row['email'] ?>
            </td>
            <td>
              <?= $row['username'] ?>
            </td>
            <td>
              <?= $row['subject'] ?>
            </td>
            <td>
            <a class="btn btn-success" type="submit" role="button" href="admin.php?p=view&id=<?php echo $row["id"];?>">Open Message</a>
            <a class="btn btn-danger" type="submit" role="button" href="admin.php?p=delete-message&id=<?php echo $row["id"];?>">Delete Message</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<!--Row-->
          </div>