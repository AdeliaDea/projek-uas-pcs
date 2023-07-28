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
        <?php $ambil = $koneksi->query("SELECT * FROM datamahasiswa WHERE id = '$_GET[id]'"); ?>
        <?php $pecah = $ambil->fetch_assoc(); ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nim</label>
                <input type="number" value="<?= $pecah['nim']; ?>" name="nim" class="form-control">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" value="<?= $pecah['nama']; ?>" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option selected value="<?= $pecah['jenis_kelamin']; ?>"><?= $pecah['jenis_kelamin']; ?></option>
                    <option value="Laki-Laki">laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Prodi</label>
                <select class="form-control" name="prodi">
                    <option selected value="<?= $pecah['prodi']; ?>"><?= $pecah['prodi']; ?></option>
                    <option value="Teknik Informatika S1">Teknik Informatika S1</option>
                    <option value="Sistem Informasi S1">Sistem Informasi S1</option>
                    <option value="Ilmu Komputer S1">Ilmu Komputer S1</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <select class="form-control" name="kelas">
                    <option selected value="<?= $pecah['kelas']; ?>"><?= $pecah['kelas']; ?></option>
                    <option value="4A">4A</option>
                    <option value="4B">4B</option>
                </select>
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="number" value="<?= $pecah['no_hp']; ?>" name="no_hp" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="<?= $pecah['email']; ?>" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" rows="3"><?= $pecah['alamat']; ?></textarea>
            </div>
            <div class="row mb-3">
                <label for="sampul" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-2">
                    <img src="img/<?= $pecah['foto']; ?>" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control custom-file-input" id="sampul" onchange="previewImg()" name="foto">
                    </div>
                </div>
            </div>
            <button type="submit" name="simpan2" class="btn btn-primary">Submit</button>
            <a href="index.php" class="ml-4">Kembali</a>
        </form>
    </div>

    <?php
    if (isset($_POST['simpan2'])) {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "img/$nama");

            $koneksi->query("UPDATE datamahasiswa SET nim = '$_POST[nim]',  nama = '$_POST[nama]', jenis_kelamin = '$_POST[jenis_kelamin]',
                            prodi = '$_POST[prodi]', kelas = '$_POST[kelas]', no_hp = '$_POST[no_hp]', email = '$_POST[email]', alamat = '$_POST[alamat]', foto = '$nama'
                            WHERE id = '$pecah[id]' ");
        } else {
            $koneksi->query("UPDATE datamahasiswa SET nim = '$_POST[nim]',  nama = '$_POST[nama]', jenis_kelamin = '$_POST[jenis_kelamin]',
                            prodi = '$_POST[prodi]', kelas = '$_POST[kelas]', no_hp = '$_POST[no_hp]', email = '$_POST[email]', alamat = '$_POST[alamat]', foto = '$nama'
                            WHERE id = '$pecah[id]'");
        }

        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<script>location='index.php';</script>";
    }
    ?>

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