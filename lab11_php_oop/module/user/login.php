<?php
include "config.php";

if (isset($_SESSION['is_login'])) {
    header('Location: ' . $config['base_url'] . '/artikel/index');
    exit;
}

$error = "";

if ($_POST) {
    $db = new Database();
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = $db->query("SELECT * FROM users WHERE username='$u' LIMIT 1");
    $d = $q->fetch_assoc();

    if ($d && password_verify($p, $d['password'])) {
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $d['username'];
        $_SESSION['nama'] = $d['nama'];

        header('Location: ' . $config['base_url'] . '/artikel/index');
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 w-25">
    <h4 class="mb-3">Login</h4>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
        <input name="username" class="form-control mb-2" placeholder="Username">
        <input type="password" name="password" class="form-control mb-2" placeholder="Password">
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
</body>
</html>
