<?php

require 'koneksi.php';

if ($_SERVER ["REQUEST_METHOD"] == "POST") {

    if(empty($_POST['name']) || empty($_POST['email'])) {
        $message = "Mohon isi semua kolom:";
    } else {
        $name = htmlspecialchars($_POST['name']);
        $emai = htmlspecialchars($_POST['email']);

        try {
            $stmt = $pdo->prepare("INSERT INTO rental (name, email)) VALUES (name,email)");
            $stmt->execute(['name' => $name, 'email' => $email]);
            $message = "Trimakasih, $name! penyewaan anda telah diterima.";
        }catch (Exception $e) {
            $message = "Terjadi kesalahan: " . $e->getmessage();
        }

        echo "<scirpt>
        alert('$message');
        </scirpt>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furdoor Adventure</title>
    <link rel="stylesheet" href="2.css" />
</head>

<body>
    <!-- Header Section -->
    <header>
        <nav>
            <div class="logo">
                
            </div>
            <ul class="nav-links">
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#products">Produk</a></li>
                <li><a href="#testimonials">Testimoni</a></li>
                <li><a href="#location">Lokasi</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <a href="#" class="rent-now">Rent Now</a>
        </nav>
        <div class="hero-section">
            <h1>Unleash Your Adventure</h1>
            <p>Selamat datang di Rental Perlengkapan Pendakian kami, destinasi terpercaya bagi para petualang yang siap
                menjelajahi keindahan alam dengan mendaki gunung.</p>
            <a href="#" class="rent-now">Rent Now</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <h2>Tentang Kami</h2>
        <p>Furdoor Adventure adalah penyedia layanan penyewaan alat camping terpercaya. Dengan fokus pada pengalaman
            luar ruangan yang tak terlupakan, kami menyediakan alat camping berkualitas untuk memastikan Anda merasakan
            petualangan dengan maksimal.</p>
        <div class="features">
            <div class="feature-item">
                <h3>Harga Terjangkau</h3>
                <p>Furdoor menyediakan harga sewa yang terjangkau dan terhitung sangat ramah dikantong.</p>
            </div>
            <div class="feature-item">
                <h3>Higenis dan Wangi</h3>
                <p>Furdoor menyediakan barang dengan kebersihan tinggi serta wangi demi kenyamanan pelanggan.</p>
            </div>
            <div class="feature-item">
                <h3>Bisa Di Antar</h3>
                <p>Furdoor menyediakan jasa pengantaran bagi teman-teman yang tidak bisa datang ke tempat.</p>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="products">
        <h2>Produk Kami</h2>
        <div class="product-slider">
            <div class="product-item">
                <img src="https://www.australiangeographic.com.au/wp-content/uploads/2020/12/MJW4487.jpg" alt="Tenda Dome Borneo 4 Red">
                <p>TENDAKI - Tenda Dome Borneo 4 Red</p>
                <p>Rp20000/hari - Kabupaten Malang</p>
            </div>
            <div class="product-item">
                <img src="https://halalpedia.oss-ap-southeast-5.aliyuncs.com/2021/11/20211101072114-617f32fabc370-elevon2.png" alt="Tas Deuter AC Lite 50+10">
                <p> HOKA - SEPATU RUNNING </p>
                <p>Rp30.000.000,00/hari - Kabupaten Malang</p>
            </div>
            <div class="product-item">
                <img src="https://id-test-11.slatic.net/p/a812dfdcabf187c3f67ce00aad1c9272.jpg" alt="Tenda Java 4 Light">
                <p>TENDAKI - Tenda Java 4 Light</p>
                <p>Rp2189800 - Chicago</p>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials">
        <h2>Testimoni</h2>
        <div class="testimonial-item">
            <p>"Tempat persewaan perlengkapan outdoor di kecamatan Bululawang. Lokasi yang tidak jauh dari jalan raya
                Bululawang (jalan utama menuju pantai selatan), cocok apabila ada teman-teman yang hendak melakukan
                aktivitas camping atau outbound di daerah Malang Selatan."</p>
            <p>- Clarissa Merise, Local Guide</p>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location">
        <h2>Lokasi Kami</h2>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1763777781844!2d112.62114897434886!3d-8.039870994102025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6286b634c552b%3A0x54db1268a1c2d7cd!2sBululawang%2C%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1692617173747!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!--formulir penyewaan-->
    <section>
        <h2>Formulir Penyewaan</h2>
        <form id="rent-Form" method="POST" action="">
            <input type="text" id="name" name="name" placeholder="Nama" required>
            <input type="email" id="email" name="email" placeholder="Email"required>
            <button type="submit">Submit</button>

        </form>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="join-us">
            <h2>Ayo Gabung Bersama Kami</h2>
            <a href="#" class="join-now">Gabung sekarang</a>
        </div>
        <div class="footer-info">
            <div class="company-info">
                <p>Kunjungi Kami</p>
                <p>Jl. Suropati Raya No. 20 RT. 29 RW. 07 Bululawang, Kecamatan Bululawang</p>
                <p>Malang, Jawa Timur, 65171</p>
                <p>0895-8751-8985</p>
                <p>furdoor-adventure@gmail.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Made with ❤ by Furdoor Adventure</p>
        </div>
    </footer>
    <script src="3.js"></script>
</body>

</html>