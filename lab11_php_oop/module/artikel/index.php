<?php
$db = new Database();

/* ================== PROSES HAPUS ================== */
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $db->query("DELETE FROM artikel WHERE id = $id");
    header('Location: ' . $config['base_url'] . '/artikel/index');
    exit;
}
/* ================================================== */

$data = $db->query("SELECT * FROM artikel ORDER BY id DESC");
?>

<div class="container mt-4">
    <h3>Data Artikel</h3>

    <a href="<?= $config['base_url'] ?>/artikel/tambah"
       class="btn btn-success mb-3">
       + Tambah Artikel
    </a>

    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th width="50">No</th>
                <th width="200">Judul</th>
                <th>Isi Artikel</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['isi'])) ?></td>
                <td>
                    <a href="<?= $config['base_url'] ?>/artikel/ubah?id=<?= $row['id'] ?>"
                       class="btn btn-warning btn-sm mb-1">
                       Edit
                    </a>

                    <a href="<?= $config['base_url'] ?>/artikel/index?hapus=<?= $row['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                       Hapus
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
