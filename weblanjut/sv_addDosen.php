<?php
//memanggil file pustaka fungsi
require "fungsi.php";


    // Mengambil data dari form
    $npp = $_POST["npp1"] . $_POST["npp2"] . $_POST["npp3"];
    $namadosen = $_POST["namadosen"];
    $homebase = $_POST["homebase"];

    // Menyiapkan pernyataan SQL untuk menyimpan data
    $sql = "INSERT INTO dosen (npp, namadosen, homebase) VALUES (?, ?, ?)";

    // Menyiapkan pernyataan SQL menggunakan prepared statement
    if ($stmt = mysqli_prepare($koneksi, $sql)) {
        // Mengikat parameter ke pernyataan SQL
        mysqli_stmt_bind_param($stmt, "sss", $npp, $namadosen, $homebase);

        // Mengeksekusi pernyataan SQL
        if (mysqli_stmt_execute($stmt)) {
            // Data berhasil disimpan
            mysqli_stmt_close($stmt);
            mysqli_close($koneksi);
            header("Location: updateDosen.php"); // Ganti dengan halaman yang sesuai
            exit();
        } else {
            // Terjadi kesalahan saat mengeksekusi pernyataan SQL
            echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
        }
    } else {
        // Terjadi kesalahan saat menyiapkan pernyataan SQL
        echo "Terjadi kesalahan saat menyiapkan pernyataan SQL: " . mysqli_error($koneksi);
    }

?>
