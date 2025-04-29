<?php
session_start();
if(isset($_SESSION['user'])) {
    echo "Selamat datang, " . $_SESSION['user'];
} else {
    echo "Session tidak ditemukan";
}
?>