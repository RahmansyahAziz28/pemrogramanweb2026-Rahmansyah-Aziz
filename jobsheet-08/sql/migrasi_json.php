<?php
require_once __DIR__ . '/../includes/koneksi.php';

$isCli = (php_sapi_name() === 'cli');

$bukuJsonPath = __DIR__ . '/../../jobsheet-06/data/buku.json';
$anggotaJsonPath = __DIR__ . '/../../jobsheet-06/data/anggota.json';

$log = [];

if (file_exists($bukuJsonPath)) {
    $rawBuku = file_get_contents($bukuJsonPath);
    $dataBuku = json_decode($rawBuku, true) ?? [];
    
    $insertedBuku = 0;
    $skippedBuku = 0;

    $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM buku WHERE judul = :judul AND pengarang = :pengarang");
    $stmtInsert = $pdo->prepare(
        "INSERT INTO buku (judul, pengarang, tahun, isbn, stok, kategori) 
         VALUES (:judul, :pengarang, :tahun, :isbn, :stok, :kategori)"
    );

    foreach ($dataBuku as $b) {
        $stmtCheck->execute([
            'judul' => $b['judul'],
            'pengarang' => $b['pengarang']
        ]);
        if ($stmtCheck->fetchColumn() > 0) {
            $skippedBuku++;
            continue;
        }

        $stmtInsert->execute([
            'judul'     => $b['judul'],
            'pengarang' => $b['pengarang'],
            'tahun'     => (int) ($b['tahun'] ?? 2020),
            'isbn'      => $b['isbn'] ?? null,
            'stok'      => (int) ($b['stok'] ?? 0),
            'kategori'  => $b['kategori'] ?? 'Umum'
        ]);
        $insertedBuku++;
    }

    $log[] = "Buku: {$insertedBuku} data berhasil dimasukkan, {$skippedBuku} data dilewati (sudah ada).";
} else {
    $log[] = "File buku.json tidak ditemukan di: {$bukuJsonPath}";
}

if (file_exists($anggotaJsonPath)) {
    $rawAnggota = file_get_contents($anggotaJsonPath);
    $dataAnggota = json_decode($rawAnggota, true) ?? [];

    $insertedAnggota = 0;
    $skippedAnggota = 0;

    $stmtCheckAnggota = $pdo->prepare("SELECT COUNT(*) FROM anggota WHERE no_anggota = :no_anggota");
    $stmtInsertAnggota = $pdo->prepare(
        "INSERT INTO anggota (nama, no_anggota, alamat, no_hp) 
         VALUES (:nama, :no_anggota, :alamat, :no_hp)"
    );

    foreach ($dataAnggota as $a) {
        $stmtCheckAnggota->execute(['no_anggota' => $a['no_anggota']]);
        if ($stmtCheckAnggota->fetchColumn() > 0) {
            $skippedAnggota++;
            continue;
        }

        $stmtInsertAnggota->execute([
            'nama'       => $a['nama'],
            'no_anggota' => $a['no_anggota'],
            'alamat'     => $a['alamat'] ?? '',
            'no_hp'      => $a['no_hp'] ?? ''
        ]);
        $insertedAnggota++;
    }

    $log[] = "Anggota: {$insertedAnggota} data berhasil dimasukkan, {$skippedAnggota} data dilewati (sudah ada).";
} else {
    $log[] = "File anggota.json tidak ditemukan di: {$anggotaJsonPath}";
}

if ($isCli) {
    echo "=== HASIL MIGRASI DATA JSON KE POSTGRESQL ===\n";
    foreach ($log as $line) {
        echo "- {$line}\n";
    }
    echo "Selesai.\n";
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Migrasi Data JSON ke PostgreSQL</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #f8fafc; color: #1e293b; padding: 2rem; }
        .box { max-width: 600px; margin: 0 auto; background: #fff; padding: 1.5rem 2rem; border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h1 { font-size: 1.25rem; color: #0f172a; margin-top: 0; }
        ul { padding-left: 1.25rem; }
        li { margin-bottom: 0.5rem; }
        .btn { display: inline-block; background: #0284c7; color: #fff; padding: 0.5rem 1rem; border-radius: 4px; text-decoration: none; font-weight: 600; margin-top: 1rem; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Status Migrasi Data JSON ke Database PostgreSQL</h1>
        <ul>
            <?php foreach ($log as $item): ?>
                <li><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="../index.php" class="btn">&larr; Kembali ke Beranda SIMPUS</a>
        <a href="../buku/list.php" class="btn" style="background:#059669;">Lihat Daftar Buku &rarr;</a>
    </div>
</body>
</html>
