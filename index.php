<?php include 'koneksi.php' ?>
<?php session_start(); ?>
<?php

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
            <?php if (!isset($_SESSION['user'])) { ?> ?>
              <li class="nav-item">
                <a class="navb-link pl-4" href="login.php">
                  Login
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="navb-link pl-4" href="logout.php">
                  Logout
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container">
      <div class="judul mt-4">
        <h2>PROFIL MAHASISWA</h2>
      </div>
      <!-- Button trigger modal -->
      <?php
      if (!isset($_SESSION['user'])) { ?>
        <p style="color: red;">*Silahkan login untuk input data*</p>

      <?php } else { ?>
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
          Input Data Mahasiswa
        </button>
      <?php } ?>


      <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <td>No</td>
            <td>Nim</td>
            <td>Nama</td>
            <td>Kelamin</td>
            <td>Prodi</td>
            <td>Kelas</td>
            <td>No Hp</td>
            <td>Email</td>
            <td>Alamat</td>
            <td> Foto</td>
            <td> Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1; ?>
          <?php $ambil = $koneksi->query("SELECT * FROM datamahasiswa"); ?>
          <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $nomor ?></td>
              <td>
                <?php $num_char = 3;
                $text = $pecah['nim'];
                echo substr($text, 0, $num_char); ?>...
              </td>
              <td><?php echo $pecah['nama']; ?></td>
              <td><?php echo $pecah['jenis_kelamin']; ?></td>
              <td>
                <?php $num_char = 5;
                $text = $pecah['prodi'];
                echo substr($text, 0, $num_char); ?>...
              </td>
              <td><?php echo $pecah['kelas']; ?></td>
              <td>
                <?php $num_char = 4;
                $text = $pecah['no_hp'];
                echo substr($text, 0, $num_char); ?>...
              </td>
              <td>
                <?php $num_char = 6;
                $text = $pecah['email'];
                echo substr($text, 0, $num_char); ?>...
              </td>
              <td>
                <?php $num_char = 6;
                $text = $pecah['alamat'];
                echo substr($text, 0, $num_char); ?>...
              </td>
              <td>
                <img src="img/<?= $pecah['foto']; ?>" width="50" class="jjk" alt="">
              </td>
              <td>
                <?php if (!isset($_SESSION['user'])) { ?>
                  <p style="color: red;">*---*</p>
                <?php } else { ?>
                  <a href="view.php?id=<?= $pecah['id']; ?>" class="btn btn-primary-outline" style="color: #000000;">
                    <i class="bi bi-eye-fill"></i>
                  </a>

                  <a href="edit.php?id=<?= $pecah['id']; ?>" class="btn btn-primary-outline" style="color: #000000;">
                    <i class="bi bi-pencil-square"></i>
                  </a>

                  <a href="hapus.php?id=<?= $pecah['id']; ?>" class="btn btn-primary-outline" style="color: #000000;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                <?php } ?>
              </td>
            </tr>
            <?php $nomor++; ?>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </main>

  <!-- Modal input -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nim</label>
              <input type="number" name="nim" class="form-control" placeholder="ketik nim Anda disini" required>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="ketik nama Anda disini" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jenis_kelamin">
                <option>-----Pilih Jenis Kelamin-----</option>
                <option value="Laki-Laki">laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Prodi</label>
              <select class="form-control" name="prodi">
                <option selected disabled>-----Pilih Prodi-----</option>
                <option value="Teknik Informatika S1">Teknik Informatika S1</option>
                <option value="Sistem Informasi S1">Sistem Informasi S1</option>
                <option value="Ilmu Komputer S1">Ilmu Komputer S1</option>
              </select>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <select class="form-control" name="kelas">
                <option selected disabled>-----Pilih Kelas-----</option>
                <option value="4A">4A</option>
                <option value="4B">4B</option>
              </select>
            </div>
            <div class="form-group">
              <label>No Hp</label>
              <input type="number" name="no_hp" class="form-control" placeholder="ketik nomor hp Anda disini" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="ketik email Anda disini" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" placeholder="ketik alamat Anda disini" rows="3"></textarea>
            </div>
            <div class="row mb-3">
              <label for="sampul" class="col-sm-2 col-form-label">Foto</label>
              <div class="col-sm-2">
                <img src="img/download.png" class="img-thumbnail img-preview">
              </div>
              <div class="col-sm-8">
                <div class="input-group mb-3">
                  <input type="file" class="form-control custom-file-input" id="sampul" onchange="previewImg()" name="foto">
                </div>
              </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['simpan'])) {

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "img/" . $foto);

    $simpan = mysqli_query($koneksi, "INSERT INTO datamahasiswa (nim, nama, jenis_kelamin, prodi, kelas, no_hp, email, alamat, foto)
    VALUES ('$_POST[nim]', '$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[prodi]', '$_POST[kelas]', '$_POST[no_hp]', '$_POST[email]', 
            '$_POST[alamat]', '$foto')");

    echo "<script>
            alert('Simpan Data Berhasil');
            document.location='index.php';
          </script>";
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