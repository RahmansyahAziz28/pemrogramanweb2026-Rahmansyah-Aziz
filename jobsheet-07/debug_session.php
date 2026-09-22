<?php
$page_title = "Debug Session";
include __DIR__ . '/includes/header.php';

$totalBuku = count($_SESSION['buku'] ?? []);
$totalAnggota = count($_SESSION['anggota'] ?? []);
?>
        <section>
            <h2>Debug Data Session</h2>
            <p>Halaman ini menampilkan isi mentah variabel <code>$_SESSION</code> untuk memantau data yang tersimpan sementara di server.</p>

            <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; flex: 1; min-width: 200px;">
                    <strong>Session ID:</strong>
                    <div style="font-family: monospace; font-size: 0.85rem; word-break: break-all; color: #0284c7; margin-top: 0.25rem;">
                        <?php echo htmlspecialchars(session_id()); ?>
                    </div>
                </div>
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; min-width: 140px;">
                    <strong>Total Buku:</strong>
                    <div style="font-size: 1.25rem; font-weight: bold; color: #1e293b;"><?php echo $totalBuku; ?> item</div>
                </div>
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; min-width: 140px;">
                    <strong>Total Anggota:</strong>
                    <div style="font-size: 1.25rem; font-weight: bold; color: #1e293b;"><?php echo $totalAnggota; ?> orang</div>
                </div>
            </div>

            <div style="margin-bottom: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <a href="<?php echo $base; ?>reset_session.php" onclick="return confirm('Yakin ingin mereset seluruh data session? Semua data buku dan anggota di session akan dihapus.');" style="display: inline-block; background-color: #dc2626; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 600;">
                    Reset Session (session_destroy)
                </a>
                <a href="<?php echo $base; ?>buku/tambah.php" style="display: inline-block; background-color: #0284c7; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 600;">
                    + Tambah Buku
                </a>
                <a href="<?php echo $base; ?>anggota/tambah.php" style="display: inline-block; background-color: #0284c7; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 600;">
                    + Tambah Anggota
                </a>
                <a href="<?php echo $base; ?>index.php" style="display: inline-block; background-color: #64748b; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 600;">
                    &larr; Kembali ke Beranda
                </a>
            </div>

            <article style="background: #0f172a; color: #38bdf8; border-radius: 8px; padding: 1.25rem; overflow-x: auto; box-shadow: inset 0 2px 6px rgba(0,0,0,0.5);">
                <h3 style="color: #f1f5f9; margin-top: 0; font-size: 1rem; border-bottom: 1px solid #334155; padding-bottom: 0.5rem; margin-bottom: 0.75rem;">
                    Data Mentah $_SESSION
                </h3>
                <pre style="margin: 0; font-family: Consolas, 'Courier New', Courier, monospace; font-size: 0.9rem; line-height: 1.4;"><?php
                    echo htmlspecialchars(print_r($_SESSION, true));
                ?></pre>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>
