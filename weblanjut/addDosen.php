<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Informasi Akademik::Tambah Data Dosen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
    <?php require "head.html"; ?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Tambah Data Dosen</h1>
            </div>
            <div class="card-body">
                <form action="sv_addDosen.php" method="post">
                    <div class="form-group">
                        <label for="npp">NPP:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="npp1" name="npp1" value="0686." readonly>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="npp2" name="npp2" value="11." readonly>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="npp3" name="npp3" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="namadosen">Nama Dosen:</label>
                        <input type="text" class="form-control" id="namadosen" name="namadosen" required>
                    </div>
                    <div class="form-group">
                        <label for="homebase">Homebase:</label>
                        <input type="text" class="form-control" id="homebase" name="homebase" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
