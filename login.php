<?php include 'koneksi.php' ?>
<?php session_start(); ?>
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
    <div class="container">
        <div class="card" style="width: 18rem; ">
            <div class="container">
                <form method="post" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="mt-4" placeholder="Username" name="user" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="mt-4" placeholder="Password" name="pass" />
                    </div>
                    <button type="submit" class="btn solid mt-4" name="Login">Login</button>
                </form>
                <?php
                if (isset($_POST['Login'])) {
                    $ambil = $koneksi->query("SELECT * FROM user WHERE username = '$_POST[user]' AND  
                            password = '$_POST[pass]' ");
                    $cocok = $ambil->num_rows;
                    if ($cocok == 1) {
                        $_SESSION['user'] = $ambil->fetch_assoc();
                        echo "<div class='alert alert-success'>Login Sukses</div>";
                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                    } else {
                        echo "<div class='alert alert-danger'>Login Gagal</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

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