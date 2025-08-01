<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kritik Saran</title>
    <link rel="stylesheet" href="Design/KS.css">
    <script>
        if (localStorage.getItem("isLoggedIn") !== "true") {
            window.location.href = "Login.html";
        }
    </script>
</head>

<body>
    <div class="container">
        <!-- HEADER -->
        <header>
            <div class="header-top">
                <div class="logo">
                    <a href="home_user.html"
                        style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                        <img src="icon/peo.png" alt="Logo Upb">
                        <h1 style="margin-left: 10px;">Kritik & Saran</h1>
                    </a>
                </div>
            </div>
        </header>

        <!-- KONTEN -->
        <div class="content">
            <!-- SIDEBAR -->
            <aside class="sidebar-left">
                <ul>
                    <li><a href="information.html">Informasi</a></li>
                    <li><a href="galeri.html">Galeri</a></li>
                    <li><a href="KS.php">Kritik dan Saran</a></li>
                </ul>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="main-content">
                <!-- Form -->
                <div class="container">
                    <form method="POST" action="simpan_kritik.php">
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="feedback-type">Jenis Feedback:</label>
                            <select id="feedback-type" name="feedback-type" class="form-control" required>
                                <option value="">Pilih jenis feedback</option>
                                <option value="kritik">Kritik</option>
                                <option value="saran">Saran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan:</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit">Kirim</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>