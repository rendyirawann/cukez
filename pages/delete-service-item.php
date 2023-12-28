<?php 
$tgl=date('Y-m-d');
    $id = $_GET["id"];

    if(delete_service_item ($id) < 1) {
        echo "
        <script>
            alert('Data Successfully Deleted! and Table Altered');
            document.location.href = 'admin.php?p=add-services';
        </script>";
    }else {
        echo "
        <script>
            alert('Failed To Delete Data!');
            document.location.href = 'admin.php?p=add-services';
        </script>";
    }
?>