<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <div class="utama">
        <h2 class="text-center">Daftar Dosen</h2>
        
        <div class="d-flex justify-content-between">
            <div class="p-2">
                <form action="" method="post" class="form-inline">
                    <div class="input-group">
                        <input class="form-control" type="text" name="cari" placeholder="Cari data dosen..." autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-2">
                <a class="btn btn-success" href="addDosen.php">Tambah Dosen</a>
            </div>
        </div>

        <?php
        require "fungsi.php"; // Assuming this file contains your database connection code.
        require "head.html";
        if (isset($_POST['cari'])){
            $cari = $_POST['cari'];
            $sql = "SELECT * FROM dosen WHERE npp LIKE '%$cari%' OR
                                            namadosen LIKE '%$cari%' OR
                                            homebase LIKE '%$cari%'";
        } else {
            $sql = "SELECT * FROM dosen";
        }

        $rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

        if (mysqli_num_rows($rs) == 0) {
            echo "<p>Data masih kosong</p>";
        } else {
        ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPP</th>
                        <th>Nama</th>
                        <th>Homebase</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($result = mysqli_fetch_object($rs)) {
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result->npp ?></td>
                            <td><?php echo $result->namadosen ?></td>
                            <td><?php echo $result->homebase ?></td>
                            <td>
                            <a class="btn btn-outline-primary btn-sm" href="editDosen.php?kode=<?php echo $result->id ?>">Edit</a>
                                <a class="btn btn-outline-danger btn-sm" href="hpsDosen.php?kode=<?php echo $result->id ?>" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</body>
</html>
