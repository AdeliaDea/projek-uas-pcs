<?php
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM datamahasiswa WHERE id = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['foto'];

if (file_exists("img/$foto")) {
    unlink("img/$foto");
}
$koneksi->query("DELETE FROM datamahasiswa WHERE id = '$_GET[id]'");

echo "<script> location='index.php'</script>";
