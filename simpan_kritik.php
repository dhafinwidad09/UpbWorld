<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $jenis = $_POST["feedback-type"];
    $pesan = $_POST["message"];

    $sql = "INSERT INTO kritik_saran (nama, email, jenis, pesan) 
            VALUES ('$nama', '$email', '$jenis', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Terima kasih! Kritik/Saran Anda telah dikirim.');
                window.location.href = 'KS.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>