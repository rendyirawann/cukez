<?php
error_reporting(1);
require "base/koneksi.php";
if($_SESSION['level']=="admin"){
}elseif($_SESSION['level']=="user") {
}else {
   echo "<script>
              alert('You Must Login First');
              document.location.href = 'login.php';
              </script>";
}
$contact = query ("SELECT * FROM contact"); 
include "pages/header.php";
?>
<?php
         $pages_dir = 'pages';
         if(!empty($_GET['p'])){
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);
            $p = $_GET['p'];
            if(in_array($p.'.php', $pages)){
               include($pages_dir.'/'.$p.'.php');
            } else {
               echo 'Halaman tidak ditemukan! :(';
            }
         } else {
            include($pages_dir.'/dashboard.php');
         }
      ?>

<?php
include_once "pages/footer.php";
?>