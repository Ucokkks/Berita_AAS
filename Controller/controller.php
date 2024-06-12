<?php

$koneksi = new mysqli("localhost", "root", "", "berita");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>