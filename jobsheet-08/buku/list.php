<?php
$page_title = "Daftar Buku";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$q = trim($_GET['q'] ?? '');

if ($q !== '') {
    $stmt = $pdo->prepare(
        "SELECT * FROM buku 
         WHERE judul ILIKE :q OR pengarang ILIKE :q OR kategori ILIKE :q 
         ORDER BY id DESC"
    );
    $stmt->execute(['q' => "%$q%"]);
    $daftarBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $daftarBuku = $pdo->query("SELECT * FROM buku ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
}
?>
        <section>
            <h2>Daftar Buku</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form method="GET" action="list.php" class="search-box">
                <label for="search-input">Cari Buku (Server-Side ILIKE)</label>
                <div style="display: flex; gap: 0.5rem; margin-top: 0.35rem; flex-wrap: wrap;">
                    <input type="text" name="q" id="search-input" value="<?php echo htmlspecialchars($q); ?>" placeholder="Ketik judul, pengarang, atau kategori..." style="flex: 1; min-width: 220px;">
                    <button type="submit" style="padding: 0.5rem 1.25rem; background: #0284c7; color: white; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">Cari</button>
                    <?php if ($q !== ''): ?>
                        <a href="list.php" style="padding: 0.5rem 1rem; background: #64748b; color: white; border-radius: 4px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center;">Reset Filter</a>
                    <?php endif; ?>
                </div>
            </form>

            <?php if ($q !== ''): ?>
                <p style="margin: 0.75rem 0 1rem; color: #475569; font-size: 0.925rem;">
                    Ditemukan <strong><?php echo count($daftarBuku); ?></strong> hasil untuk kata kunci "<em><?php echo htmlspecialchars($q); ?></em>".
                </p>
            <?php endif; ?>

            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Waktu Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarBuku)): ?>
                    <tr>
                        <td colspan="6">
                            <?php if ($q !== ''): ?>
                                Tidak ada buku yang cocok dengan pencarian "<?php echo htmlspecialchars($q); ?>".
                            <?php else: ?>
                                Belum ada data buku. Silakan tambah lewat menu "Tambah Buku".
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($daftarBuku as $buku): ?>
                        <tr>
                            <td>
                                <strong><?php echo htmlspecialchars($buku['judul']); ?></strong>
                                <?php if (!empty($buku['kategori'])): ?>
                                    <br><small style="color: #64748b;"><?php echo htmlspecialchars($buku['kategori']); ?></small>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($buku['pengarang']); ?></td>
                            <td><?php echo htmlspecialchars($buku['tahun']); ?></td>
                            <td><?php echo htmlspecialchars($buku['stok']); ?></td>
                            <td style="font-size: 0.875rem; color: #475569;">
                                <?php 
                                    if (!empty($buku['created_at'])) {
                                        echo date('d/m/Y H:i', strtotime($buku['created_at']));
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                            <td>
                                <button type="button">Edit</button>
                                <button type="button" class="btn-hapus">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
