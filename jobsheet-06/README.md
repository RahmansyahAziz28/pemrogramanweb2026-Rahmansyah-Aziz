# Jobsheet 6 — Fetch API & JSON (Crime Records System)

Sub-CPMK: Menerapkan komunikasi asinkron (AJAX/Fetch API, JSON).

## Penyesuaian Tema & Fitur
- **Tema:** Crime Records System (Gotham City Police Department) — Modul Berkas Tersangka (*Suspects*) dan Direktori Penyidik (*Investigators*).
- **Sumber Data JSON:** Menggunakan berkas [data/suspects.json](data/suspects.json) (8 arsip tersangka) dan [data/investigators.json](data/investigators.json) (5 personel penyidik).
- **Asynchronous Rendering:** Elemen `<tbody>` pada `suspects/list.html` dan `investigators/list.html` dikosongkan dari HTML statis, lalu dirender secara dinamis oleh [assets/js/suspects.js](assets/js/suspects.js) dan [assets/js/investigators.js](assets/js/investigators.js) menggunakan sintaks modern `fetch()` dan `async/await`.
- **Indikator Loading & Error Handling:** Menampilkan status *loading* (`#loading-indicator`) dengan simulasi latensi (600ms) serta penanganan kesalahan (`try...catch`) bila pengambilan data gagal.
- **Tombol Muat Ulang (*Reload*):** Fitur `#btn-reload` untuk memuat ulang data dari JSON tanpa me-refresh seluruh halaman.
- **Event Delegation:** Tombol hapus ditangani dengan mekanisme delegasi event pada dokumen untuk elemen-elemen baris tabel yang dibuat secara dinamis setelah fetch selesai.

## Cara Menjalankan
Karena peramban memblokir permintaan `fetch()` ke file lokal melalui protokol `file://` (kebijakan CORS), jalankan menggunakan web server lokal:
```bash
php -S localhost:8000
```
atau gunakan ekstensi **Live Server** di VS Code, lalu buka tautan di browser:
`http://localhost:8000/jobsheet-06/index.html`
