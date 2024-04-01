<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Saya - Formulir Pemesanan Produk</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
</head>
<body>
<header>
        <h1>Tempat Motor Mewah</h1>
        <nav>
            <ul>
            <li><a href="index.html">Home</a></li>
                <li><a href="produk.html">Produk</a></li>
                <li><a href="pesan.php">Pesan</a></li>
                <li><a href="galeri.html">Galeri</a></li>
                <li><a href="guestbook.php">Guestbook</a></li>
            </ul>
        </nav>
    </header>
<main>
    <section class="container">

        <div class="form-container">
            <h2>Formulir Pemesanan Produk</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Pengiriman:</label>
                    <textarea id="alamat" name="alamat" required></textarea>
                </div>

                <div class="form-group">
                    <label for="produk">Produk:</label>
                    <input type="text" id="produk" name="produk" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" required>
                </div>

                <button type="submit" name="submit">Pesan Sekarang</button>
            </form>
        </div>
    </section>
</main>
<footer>
    <p>Hak Cipta © 2024 Website Saya. Muhamad Nasir.</p>
</footer>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $produk = $_POST["produk"];
    $jumlah = $_POST["jumlah"];
    
    $pesan = "Nama: $nama\n";
    $pesan .= "Email: $email\n";
    $pesan .= "Alamat Pengiriman: $alamat\n";
    $pesan .= "Produk: $produk\n";
    $pesan .= "Jumlah: $jumlah\n";
    
    
    $file = fopen("pesanan.txt", "a");
    if ($file) {
        fwrite($file, $pesan . "\n"); 
        fclose($file);
        echo "<script>alert('Pemesanan berhasil!');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan pesanan.');</script>";
    }
}
?>
