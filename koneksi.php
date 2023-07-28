<?php
 //koneksi database 
 $server="localhost";
 $user ="root";
 $pass = "";
 $database= "uaspcs_202002020001";
 $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
 
?>