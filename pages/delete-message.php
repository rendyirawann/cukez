<?php 
$tgl=date('Y-m-d');
    $id = $_GET["id"];

    if( delete_message ($id) < 1) {
        echo "
        <script>
            alert('Message Successfully Deleted! and Table Altered');
            document.location.href = 'admin.php?p=contact';
        </script>";
    }else {
        echo "
        <script>
            alert('Failed To Delete Message!');
            document.location.href = 'admin.php?p=contact';
        </script>";
    }
?>