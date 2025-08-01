<?php
// Koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="Design/home_admin.css">
    <style>
        /* Tambahan untuk tab */
        .tab-buttons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .tab-buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #0011ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .tab-buttons button.active {
            background-color: #0084ff;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .feedback-list {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 8px;
            max-height: 500px;
            overflow-y: auto;
        }

        .feedback-item {
            margin-bottom: 15px;
        }
    </style>

    <script>
        // Cek login
        if (localStorage.getItem("isLoggedIn") !== "true") {
            window.location.href = "Login.html";
        }

        // Fungsi logout
        function logout() {
            localStorage.removeItem("isLoggedIn");
            window.location.href = "Login.html";
        }

        // Fungsi tab
        function openTab(evt, tabName) {
            const tabContents = document.getElementsByClassName("tab-content");
            const tabButtons = document.getElementsByClassName("tab-button");

            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove("active");
            }
            for (let i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("active");
            }

            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("defaultTab").click();
        });
    </script>
</head>

<body>
    <div class="container">
        <h1 class="judul">Halaman Admin</h1>

        <div class="tab-buttons">
            <button class="tab-button" id="defaultTab" onclick="openTab(event, 'profil')">Profil</button>
            <button class="tab-button" onclick="openTab(event, 'data')">Data Kritik & Saran</button>
        </div>

        <!-- TAB PROFIL -->
        <div id="profil" class="tab-content">
            <div class="content">
                <div class="foto">
                    <img src="Image/Gambar.jpg" alt="Foto Admin" width="250" height="350">
                </div>
                <div class="biodata">
                    <table>
                        <tr>
                            <td><strong>Nama</strong></td>
                            <td>: Muhammad Dhafin Widad</td>
                        </tr>
                        <tr>
                            <td><strong>NIM</strong></td>
                            <td>: 152310139</td>
                        </tr>
                        <tr>
                            <td><strong>Fakultas</strong></td>
                            <td>: Ekonomi Dan Bisnis</td>
                        </tr>
                        <tr>
                            <td><strong>Program Studi</strong></td>
                            <td>: Bisnis Digital</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>: dhafinwid12@gmail.com</td>
                        </tr>
                        <tr>
                            <td><strong>No. HP</strong></td>
                            <td>: 0856-9324-0203</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>: Jl. Villa Sentosa 2 No.5 Blok C6, RT.26/RW.7, Pasirsari, Cikarang Selatan, Bekasi
                                Regency, West Java 17550</td>
                        </tr>
                    </table>
                    <button onclick="logout()">Logout</button>
                </div>
            </div>
        </div>

        <!-- TAB DATA -->
        <div id="data" class="tab-content">
            <h2 style="color: #3f4091; margin-bottom: 10px;">Daftar Kritik dan Saran</h2>
            <div class="feedback-list">
                <?php
                $sql = "SELECT * FROM kritik_saran ORDER BY tanggal DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='feedback-item'>";
                        echo "<strong>" . htmlspecialchars($row['nama']) . "</strong> (" . htmlspecialchars($row['jenis']) . ")<br>";
                        echo "<small>" . htmlspecialchars($row['tanggal']) . "</small><br>";
                        echo "<p>" . nl2br(htmlspecialchars($row['pesan'])) . "</p>";
                        echo "<hr>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Belum ada kritik atau saran.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>