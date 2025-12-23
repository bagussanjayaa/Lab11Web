<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .footer-fixed {
        position: fixed;
        bottom: 0;
        left: 0;              
        width: 100%;          
        background: #0d6efd;
        padding: 8px 0;
        font-size: 13px;
        text-align: center;   
        z-index: 9999;
    }

    /* Supaya konten tidak ketutup */
    body {
        padding-bottom: 50px;
    }

    /* Mobile: jangan fixed (opsional tapi disarankan) */
    @media (max-width: 768px) {
        .footer-fixed {
            position: static;
            transform: none;
            border-radius: 0;
            margin-top: 20px;
        }
    }
</style>

</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="<?= $config['base_url'] ?>/home/index">PHP OOP</a>

    <div>
    <?php if (isset($_SESSION['is_login'])): ?>
        <a href="<?= $config['base_url'] ?>/artikel/index" class="btn btn-light btn-sm">Artikel</a>
        <a href="<?= $config['base_url'] ?>/user/profile" class="btn btn-info btn-sm">Profil</a>
        <a href="<?= $config['base_url'] ?>/user/logout" class="btn btn-danger btn-sm">Logout</a>
    <?php else: ?>
        <a href="<?= $config['base_url'] ?>/user/login" class="btn btn-light btn-sm">Login</a>
    <?php endif; ?>
    </div>
</nav>
