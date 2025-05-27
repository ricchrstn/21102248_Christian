<?php
session_start();

function cekLogin() {
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login.php');
        exit;
    }
}

function cekUsia($umur) {
    return $umur >= 18 ? 'Dewasa' : 'Belum Dewasa';
}
?>