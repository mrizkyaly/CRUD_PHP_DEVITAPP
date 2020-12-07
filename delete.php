<?php
    include 'db.php';

    $delete = mysqli_query($conn, "DELETE FROM tb_artikel WHERE id = '".$_GET['id']."'");

    if ($delete)
    {
        header('location:admin.php');
    }
    else{
        echo "gagal hapus";
    }
?>