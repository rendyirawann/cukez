<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicons -->
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="icon">
  <link href="<?= BASE_URL ?>assets/img/logo.png" rel="apple-touch-icon">
  <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?> 
  <title>CUKEZ - Panel Admin</title>
  <?php  }else{ // if user is not logged in then display these buttons?>
    <title>CUKEZ - Panel User</title>
    <?php } ?> 
  <link href="<?= BASE_URL ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= BASE_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= BASE_URL ?>css/cukez-admin.min.css" rel="stylesheet">

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
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?= BASE_URL ?>img/logo/logo-admin.png" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">CUKEZ</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features Cukez
      </div>
      <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?>  
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-user"></i>
          <span>Registry Account</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">MANAGE CUKEZ's ACCOUNT</h6>  
            <a class="collapse-item" href="admin.php?p=registry-admin">CUKEZ's Account</a>
          </div>
        </div>
      </li>
      <?php  }else{ // if user is not logged in then display these buttons?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-user"></i>
          <span>User CUKEZ Account</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">MANAGE YOUR ACCOUNT</h6>  
            <a class="collapse-item" href="admin.php?p=profile-account">Your Account</a>
          </div>
        </div>
      </li>
              
              <?php } ?> 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fas fa-book"></i>
          <span>Reservation & Tuneup</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="<?= BASE_URL ?>order.php">Form Reservation</a>
            <a class="collapse-item" href="<?= BASE_URL ?>order_se.php">Tune Up - Spareparts</a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
          aria-controls="collapseForms">
          <i class="fas fa-cogs"></i>
          <span>Services</span>
        </a>
        <div id="collapseForms" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="<?= BASE_URL ?>order_se.php">Tune Up - Spareparts</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-history"></i>
          <span>History Reservation</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">Tables Information</h6>
            <a class="collapse-item" href="admin.php?p=reservation">List Reservation</a>
            <a class="collapse-item" href="admin.php?p=services">List History Services</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTabless" aria-expanded="true"
          aria-controls="collapseTabless">
          <i class="fas fa-check"></i>
          <span>Report History</span>
        </a>
        <div id="collapseTabless" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">Tables Report</h6>
            <a class="collapse-item" href="admin.php?p=reservation_f">List Reservation Finish</a>
            <a class="collapse-item" href="admin.php?p=services_f">List History Services Finish</a>
          </div>
        </div>
      </li>
      <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?> 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-inbox"></i>
          <span>Message Inbox</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">Message</h6>
            <a class="collapse-item" href="admin.php?p=contact">Incoming Message</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageadd" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-user-shield"></i>
          <span>Admin Features</span>
        </a>
        <div id="collapsePageadd" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded mt-1">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="admin.php?p=add-services">Add Services</a>
          </div>
        </div>
      </li>
      <?php  }else{ // if user is not logged in then display these buttons?>
                  <?php } ?> 
      <li class="nav-item">
        <a class="nav-link" href="admin.php?p=location">
          <i class="fas fa-fw fa-map-marker"></i>
          <span>Location</span>
        </a>
      </li>

      
      <hr class="sidebar-divider">
      <div class="version" id="version-cukezadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search" action="" method="POST">
                  <div class="input-group">
                    <input type="text" name="keyword" class="form-control bg-light border-1 small"
                      placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2"
                      style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" name="find">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>
            <?php if(isset($_SESSION['level']) && $_SESSION['level']== 'admin') //check if user is a admin and display drop item
    {
    ?> 
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">2</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <?php foreach ($contact as $row ) : ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo $row["message"];?></div>
                    <div class="small text-gray-500"><?php echo $row["name"];?></div>
                  </div>
                </a>
                <?php endforeach; ?>

                <a class="dropdown-item text-center small text-gray-500" href="admin.php?p=contact">Read More Messages</a>
              </div>
            </li>
            <?php  }else{ // if user is not logged in then display these buttons?>
                  <?php } ?> 
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter">3</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Task
                </h6>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Design Button
                      <div class="small float-right"><b>50%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Make Beautiful Transitions
                      <div class="small float-right"><b>30%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item align-items-center" href="#">
                  <div class="mb-3">
                    <div class="small text-gray-500">Create Pie Chart
                      <div class="small float-right"><b>75%</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['username']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <div class="container-fluid" id="container-wrapper">