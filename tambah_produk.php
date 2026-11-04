<?php
    require 'function.php';

    if(isset($_POST['submit'])) {

        if(tambah_produk($_POST) > 0) {
            echo "<script>
                alert('Data sudah berhasil dimasukkan ke basis data')
                document.location.href = 'produk.php';
                </script>";
        } else {
            echo "<script>
            alert('Data gagal dimasukkan ke basis data');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikreative Studio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="page-form">
<div class="container">

    <div class="form-card">
        <h3>Tambah Produk</h3>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" placeholder="Masukkan nama produk" required>
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" placeholder="Masukkan deskripsi produk" required></textarea>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" placeholder="Masukkan harga produk" required>
    </div>

    <div class="form-group">
        <label>Gambar Produk</label>
        <input type="file" name="gambar" accept=".jpg,.jpeg,.png" required>
    </div>

    <button type="submit" name="submit" class="btn btn-tambah">Tambah Produk</button>
    <a href="produk.php" class="btn btn-kembali"> Kembali </a>
</form>

    </div>
</div>

</body>
</html>
