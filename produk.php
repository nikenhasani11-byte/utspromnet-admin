<?php
    require 'function.php';

    // Menampilkan seluruh data produk
    $produk = query_db("SELECT * FROM produk_design");

    // Proses pencarian
    if (isset($_POST["cari"])) {
        $keyword = $_POST["keyword"];
        $produk = cari_data($keyword);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikreative Studio</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- AdminLTE CSS -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- CSS tambahan -->
<link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <div class="app-layout">

    <!-- SIDEBAR -->
    <aside class="app-sidebar">
        <div class="sidebar-brand">
            Nikreative Studio
        </div>

        <div class="sidebar-profile">
        <a href="profile.html">Niken Hasani</a>
        </div>

        <nav class="sidebar-menu">

            <a href="produk.php" class="active">
                <span class="sidebar-icon">✉️</span>
                Produk Design
            </a>

            <a href="projects.html">
                <span class="sidebar-icon">📚</span>
                Projects
            </a>

        </nav>
    </aside>

    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
    <main class="app-main">
        <div class="content-card">

<body class="page-index">
    <div class="container">
        <h3>Data Produk Design</h3>
        <div class="top-bar">

            <!-- Searching -->
            <form action="" method="post" class="search-box">
                <input type="text" name="keyword" placeholder="Cari produk...">
                <button type="submit" name="cari" class="btn btn-cari">
                    Cari
                </button>
            </form>

            <!-- Tambah Data -->
            <a href="tambah_produk.php" class="btn btn-tambah">
                + Tambah Produk
            </a>

        </div>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php $nomor = 1; ?>

                <?php if (!empty($produk)) : ?>

                    <?php foreach ($produk as $data) : ?>

                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data["id_produk"]; ?></td>
                        <td><?php echo $data["nama_produk"]; ?></td>
                        <td><?php echo $data["deskripsi"]; ?></td>

                        <td>Rp <?php echo number_format($data["harga"], 0, ',', '.'); ?></td>

                        <!-- Menampilkan gambar -->
                        <td>
                            <img src="img/<?php echo $data["gambar"]; ?>" width="80" alt="Gambar Produk">
                        </td>

                        <!-- Tombol aksi -->
                        <td>
                            <a href="edit_produk.php?id_produk=<?php echo $data["id_produk"]; ?>" class="btn btn-edit">
                                Edit
                            </a>
                            <a href="hapus_produk.php?id_produk=<?php echo $data["id_produk"]; ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus produk ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>

                    <?php $nomor++; ?>
                    <?php endforeach; ?>
                <?php else : ?>

                    <tr>
                        <td colspan="7" style="text-align:center;">
                            Data produk tidak ditemukan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
