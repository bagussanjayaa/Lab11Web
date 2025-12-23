<?php
session_start();

include "config.php";
include "class/Database.php";
include "class/Form.php";

$path = $_SERVER['PATH_INFO'] ?? '/home/index';
$segments = explode('/', trim($path, '/'));

$mod  = $segments[0] ?? 'home';
$page = $segments[1] ?? 'index';

// halaman publik
$public_pages = ['home', 'user'];

if (!in_array($mod, $public_pages)) {
    if (!isset($_SESSION['is_login'])) {
        header('Location: ' . $config['base_url'] . '/user/login');
        exit;
    }
}

$file = "module/$mod/$page.php";

// khusus halaman login (tanpa header/footer)
if ($mod === 'user' && $page === 'login') {
    include $file;
    exit;
}

include "template/header.php";

if (file_exists($file)) {
    include $file;
} else {
    echo "<div class='container mt-4'>Halaman tidak ditemukan</div>";
}

include "template/footer.php";
