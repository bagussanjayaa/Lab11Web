<?php
$db = new Database();
$msg = "";

if ($_POST) {
    if ($_POST['password'] === $_POST['konfirmasi']) {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->update(
            'users',
            ['password' => $hash],
            "username='{$_SESSION['username']}'"
        );
        $msg = "Password berhasil diperbarui";
    } else {
        $msg = "Konfirmasi password tidak sama";
    }
}
?>

<div class="container mt-4">
    <h3>Profil User</h3>
    <p><b>Nama:</b> <?= $_SESSION['nama'] ?></p>
    <p><b>Username:</b> <?= $_SESSION['username'] ?></p>

    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST" class="w-50">
        <input type="password" name="password" class="form-control mb-2" placeholder="Password Baru">
        <input type="password" name="konfirmasi" class="form-control mb-2" placeholder="Konfirmasi Password">
        <button class="btn btn-success">Ubah Password</button>
    </form>
</div>
