<?php 
$tgl=date('Y-m-d');
    $id = $_GET["id"];

    if( delete ($id) < 1) {
        echo "
        <script>
            alert('Account Successfully Deleted! and Table Altered');
            document.location.href = 'admin.php?p=registry-admin';
        </script>";
    }else {
        echo "
        <script>
            alert('Failed To Delete Account!');
            document.location.href = 'admin.php?p=registry-admin';
        </script>";
    }
?>