<?php
session_start();

$nama = trim($_POST['nama'] ?? '');
$noAnggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');

$errors = [];
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}
if ($noAnggota === '') {
    $errors[] = "No. Anggota wajib diisi.";
} else {
    if (!empty($_SESSION['anggota'])) {
        foreach ($_SESSION['anggota'] as $existing) {
            if (isset($existing['no_anggota']) && strcasecmp($existing['no_anggota'], $noAnggota) === 0) {
                $errors[] = "No. Anggota '{$noAnggota}' sudah terdaftar, gunakan nomor lain.";
                break;
            }
        }
    }
}

if ($noHp !== '') {
    if (!preg_match('/^[0-9+\s-]{10,20}$/', $noHp)) {
        $errors[] = "Format No. HP tidak valid (10-20 digit angka, spasi, atau tanda +/-).";
    }
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [];
}

$_SESSION['anggota'][] = [
    'nama' => $nama,
    'no_anggota' => $noAnggota,
    'alamat' => $alamat,
    'no_hp' => $noHp,
];

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil ditambahkan.'];
header('Location: list.php');
exit;
