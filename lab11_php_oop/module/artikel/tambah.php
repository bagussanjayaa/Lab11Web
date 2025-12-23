<?php
$db = new Database();

if ($_POST) {
    $db->insert('artikel', [
        'judul' => $_POST['judul'],
        'isi'   => $_POST['isi']
    ]);

    header('Location: ' . $config['base_url'] . '/artikel/index');
    exit;
}
?>

<div class="container mt-4">
    <h3>Tambah Artikel</h3>

    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Artikel</label>
            <textarea name="isi" rows="5" class="form-control" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="<?= $config['base_url'] ?>/artikel/index" class="btn btn-secondary">Kembali</a>
    </form>
</div>
