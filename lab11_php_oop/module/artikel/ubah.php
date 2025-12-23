<?php
$db = new Database();

$id = (int)$_GET['id'];
$data = $db->query("SELECT * FROM artikel WHERE id=$id")->fetch_assoc();

if (!$data) {
    echo "<div class='container mt-4'>Data tidak ditemukan</div>";
    exit;
}

if ($_POST) {
    $db->update(
        'artikel',
        [
            'judul' => $_POST['judul'],
            'isi'   => $_POST['isi']
        ],
        "id=$id"
    );

    header('Location: ' . $config['base_url'] . '/artikel/index');
    exit;
}
?>

<div class="container mt-4">
    <h3>Edit Artikel</h3>

    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Artikel</label>
            <textarea name="isi" rows="5" class="form-control" required><?= htmlspecialchars($data['isi']) ?></textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= $config['base_url'] ?>/artikel/index" class="btn btn-secondary">Kembali</a>
    </form>
</div>
