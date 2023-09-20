<?php
// Membuat koneksi ke database MySQL
$koneksi = mysqli_connect('localhost', 'root', '', 'a122006449');

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <div class="container">
        <div class="my-4"> <!-- Add margin-top for spacing -->
            <a class="btn btn-success" href="addDosen.php">Tambah Dosen</a>
        </div>
        
        <span class="float-right">
            <form action="" method="post" class="form-inline">
                <button class="btn btn-success" type="submit">Cari</button>
                <input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="Cari data dosen.." autofocus autocomplete="off">
            </form>
        </span>

        <div class="mt-4"> <!-- Add margin-top for spacing -->
            <?php
            // Assuming you want to retrieve data from the 'dosen' table
            $sql = "SELECT * FROM dosen";
            $rs = mysqli_query($koneksi, $sql);

            if (!$rs) {
                die("Query error: " . mysqli_error($koneksi));
            }

            if (mysqli_num_rows($rs) == 0) {
                echo "Data masih kosong";
            } else {
            ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>NPP</th>
                        <th>Nama</th>
                        <th>Homebase</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    while ($result = mysqli_fetch_object($rs)) {
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result->npp ?></td>
                            <td><?php echo $result->namadosen ?></td>
                            <td><?php echo $result->homebase ?></td>
                            <td>Edit | Delete</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection when you're done
mysqli_close($koneksi);
?>
