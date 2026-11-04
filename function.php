<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "form_design");

function query_db($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// FUNGSI TAMBAH DATA
function tambah_produk($data){
    global $conn;

    $nama_produk = $data['nama_produk'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];

    // upload gambar
    $gambar = upload_gambar($nama_produk, $deskripsi);

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO produk_design
              (nama_produk, deskripsi, harga, gambar)
              VALUES
              ('$nama_produk', '$deskripsi', '$harga', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// FUNGSI HAPUS DATA
function hapus_produk($id_produk){
    global $conn;

    $query = "DELETE FROM produk_design WHERE id_produk = $id_produk";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// FUNGSI EDIT DATA
function edit_data($data){
    global $conn;

    $id_produk = $data["id_produk"];
    $nama_produk = $data['nama_produk'];
    $deskripsi = $data['deskripsi'];
    $harga = $data['harga'];

    $gambar = upload_gambar($nama_produk, $deskripsi);

    if (!$gambar) {
        return false;
    }

    $query = "UPDATE produk_design SET
              nama_produk = '$nama_produk',
              deskripsi = '$deskripsi',
              harga = '$harga',
              gambar = '$gambar'
              WHERE id_produk = $id_produk";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// FUNGSI SEARCH
function cari_data($keyword) {
    global $conn;

    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "SELECT * FROM produk_design
              WHERE
              nama_produk LIKE '%$keyword%' OR
              deskripsi LIKE '%$keyword%' OR
              harga LIKE '%$keyword%'";

    return query_db($query);
}

// FUNGSI UPLOAD GAMBAR
function upload_gambar($nama_produk, $deskripsi){

    // Cek apakah input gambar tersedia
    if (!isset($_FILES['gambar'])) {
        echo "<script>
                alert('File gambar tidak ditemukan! Periksa form upload.');
              </script>";
        return false;
    }

    // Mengambil data file
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah gambar sudah dipilih
    if ($error === 4) {
        echo "<script>
                alert('Kamu belum upload file, silakan upload file terlebih dahulu!');
              </script>";
        return false;
    }

    // Cek apakah proses upload berhasil
    if ($error !== 0) {
        echo "<script>
                alert('Terjadi kesalahan saat upload gambar!');
              </script>";
        return false;
    }

    // Cek ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('File yang kamu upload bukan jpg/jpeg/png!');
              </script>";
        return false;
    }

    // Cek ukuran file maksimal 5MB
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('File yang kamu upload terlalu besar ukurannya!');
              </script>";
        return false;
    }

    // Membuat nama file baru
    $namaFileBaru = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nama_produk);
    $namaFileBaru .= "_" . time() . "." . $ekstensiGambar;

    // Menentukan folder penyimpanan
    $folder = __DIR__ . '/img/';

    // Membuat folder jika belum tersedia
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Memindahkan gambar ke folder img
    if (move_uploaded_file($tmpName, $folder . $namaFileBaru)) {
        return $namaFileBaru;
    }

    echo "<script>
            alert('Gambar gagal disimpan!');
          </script>";

    return false;
}

?>
