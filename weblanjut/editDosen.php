<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Informasi Akademik::Edit Data Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Edit Dosen</h2>

        <?php
        require "fungsi.php"; // Assuming this file contains your database connection code.

        // Check if the ID parameter is provided in the URL
        if (isset($_GET['kode'])) {
            $kode = $_GET['kode'];
            $sql = "SELECT * FROM dosen WHERE id = $kode";
            $result = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_object($result);

                // Check if the form is submitted
                if (isset($_POST['submit'])) {
                    $npp = $_POST['npp'];
                    $namadosen = $_POST['namadosen'];
                    $homebase = $_POST['homebase'];

                    // Update the record in the database
                    $updateSql = "UPDATE dosen SET npp='$npp', namadosen='$namadosen', homebase='$homebase' WHERE id=$kode";
                    if (mysqli_query($koneksi, $updateSql)) {
                        echo '<div class="alert alert-success" role="alert">Data Dosen berhasil diupdate!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Gagal mengupdate data Dosen: ' . mysqli_error($koneksi) . '</div>';
                    }
                }
        ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="npp">NPP</label>
                        <input type="text" class="form-control" id="npp" name="npp" value="<?php echo $data->npp; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="namadosen">Nama Dosen</label>
                        <input type="text" class="form-control" id="namadosen" name="namadosen" value="<?php echo $data->namadosen; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="homebase">Homebase</label>
                        <input type="text" class="form-control" id="homebase" name="homebase" value="<?php echo $data->homebase; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
        <?php
            } else {
                echo '<div class="alert alert-danger" role="alert">Data Dosen tidak ditemukan.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Parameter ID tidak ditemukan.</div>';
        }
        ?>
    </div>
</body>
</html>
