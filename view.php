<?php include 'koneksi.php' ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['user'])) {
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <title> PROFIL DATA MAHASISWA | BY ADELIA A'FA NAFASHA</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid px-5">
                <a class="navbar-brand link" href="index.php">
                    PROFIL DATA MAHASISWA | BY ADELIA A'FA NAFASHA
                </a>
                <div class="collapse navbar-collapse d-flex flex-row-reverse px-5">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navb-link pl-4" href="#">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navb-link pl-4" href="#">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="navb-link pl-4" href="#">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="card">
            <h2>Data Mahasiswa</h2>
            <?php $bbc = $koneksi->query("SELECT * FROM datamahasiswa WHERE id = '$_GET[id]'");
            $cc = $bbc->fetch_assoc(); ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nim</label>
                    <input type="number" value="<?= $cc['nim']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" value="<?= $cc['nama']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" value="<?= $cc['jenis_kelamin']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Prodi</label>
                    <input type="text" value="<?= $cc['prodi']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" value="<?= $cc['kelas']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>No.HP</label>
                    <input type="text" value="<?= $cc['no_hp']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?= $cc['email']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" value="<?= $cc['alamat']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <img src="img/<?= $cc['foto']; ?>" width="150" alt="">
                </div>
            </form>
            <a href="index.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- Footer-->
    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-uppercase fw-bold">About</h4>
                <p> Database Profil Mahasiswa bertujuan untuk menginput data pribadi mahasiswa di FTI agar
                    Fakultas memiliki data mahasiswa yang aktif dalam kegiatan perkuliahan.</p>
            </div>
        </div>
        <footer class="text center" style="padding: 8p;">
            <p>Created by <u class="fw-bold">Adelia A'fa Nafasha | 202002020001</u></p>
        </footer>
    </div>
    <!-- Close Footer -->




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <script>
        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const labelsampul = document.querySelector('.img-preview');

            const filesampul = new FileReader();
            filesampul.readAsDataURL(sampul.files[0]);

            filesampul.onload = function(e) {
                labelsampul.src = e.target.result;
            }
        }
    </script>
</body>

</html>