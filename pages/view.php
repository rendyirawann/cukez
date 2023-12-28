<?php 
    // Mengambil data id dari URL
    $id = $_GET["id"];

    $contact = query ("SELECT * FROM contact WHERE id = $id")[0];
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Incoming Message</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="admin.php?p=contact">Message Center</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Incoming Message</li>
            </ol>
          </div>

          <div class="container-fluid" id="container-wrapper">
          <div class="row mb-3">
            <div class="col">
                <h1><strong><?= $contact['name'];?></strong> Message's</h1>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
                <table style="border: 2px solid black; color:black;" class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td style="border: 2px solid black;"><strong>Subject :</strong></td>
                            <td><?= $contact['subject'];?></td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid black;" rowspan="1" colspan="2"><strong>Message :</strong></td>
                        </tr>
                        <tr>
                            <td style="border: 2px solid black;" rowspan="1" colspan="2"><?= $contact["message"];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          </div>