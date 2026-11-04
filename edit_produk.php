<?php
    require 'function.php';

    $id_produk = $_GET["id_produk"];
    $produk = query_db("SELECT * FROM produk_design WHERE id_produk = $id_produk")[0];

    if(isset($_POST['submit'])){
    
            if(tambah_produk($_POST) > 0) {
            echo "<script>
                alert('Data sudah berhasil diubah')
                document.location.href = 'produk.php';
                </script>";
        } else {
            echo "<script>
            alert('Data gagal diubah');
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
        <h2>Edit Produk Design</h2>

        <form action="" method="post">
            <input type="hidden" name="id_produk" value="<?php echo $produk["id_produk"]; ?>">

            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" value="<?php echo $produk["nama_produk"] ?>">
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi</label>
                <input type="text" name="deskripsi" value="<?php echo $produk["deskripsi"] ?>">
            </div>
            <div class="form-group">
                <label for="nama">Harga</label>
                <input type="text" name="harga" value="<?php echo $produk["harga"] ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" value="<?php echo $produk["gambar"] ?>">
                <!-- <input type="file" name="gambar"> -->
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-tambah">Simpan Perubahan</button>
                <a href="produk.php" class="btn btn-kembali"> Kembali </a>
            </div>

        </form>
    </div>
</div>
</body>
</html>
