<?php
    require 'function.php';

    $id_produk = $_GET["id_produk"];

    if(hapus_produk($id_produk) > 0){
            echo "
            <script>
            alert('Data sudah berhasil dihapus dari basis data');
            document.location.href = 'produk.php';
            </script>";
        } else {
            echo "<script>
            alert('Data gagal dihapus dari basis data');
            </script>";
    }

?>