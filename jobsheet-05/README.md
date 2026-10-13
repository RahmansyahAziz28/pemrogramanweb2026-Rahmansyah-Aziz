# Jobsheet 5 — JavaScript DOM & Event (Crime Records System)

Sub-CPMK: Menerapkan manipulasi DOM dan penanganan event dengan JavaScript.

## Penyesuaian Tema & Fitur
- **Tema:** Crime Records System (Gotham City Police Department) — Modul Berkas Tersangka (*Suspects*) dan Direktori Penyidik (*Investigators*).
- **Skrip JS Terpusat:** Penambahan [assets/js/app.js](assets/js/app.js).
- **Hamburger Menu Interaktif:** Checkbox hack digantikan tombol interaktif `#nav-toggle-btn` dengan penanganan class toggle JS (`nav.classList.toggle("nav-open")`).
- **Validasi Form Client-Side:** Validasi pada form pendaftaran berkas tersangka (`initValidasiForm`) — field Nomor Identitas dan Nama Lengkap wajib diisi; pesan kesalahan dimunculkan inline di bawah input melalui manipulasi DOM (`insertAdjacentElement`).
- **Live Search Filter:** Input pencarian pada tabel tersangka dan direktori penyidik menyaring baris secara langsung via event `keyup` (`initTableFilter`).
- **Konfirmasi Aksi Hapus:** Tombol `.btn-hapus` memicu konfirmasi `confirm()` dan menghapus baris tabel dari pohon DOM (`row.remove()`).
- **Data Statis:** Data tabel pada jobsheet ini masih tertulis langsung di HTML untuk fokus pada pembelajaran manipulasi DOM & event handling (belum menggunakan Fetch API / JSON yang baru diperkenalkan di Jobsheet 6).

## Cara Menjalankan
Buka `index.html` langsung di browser:
1. Uji menu responsif pada ukuran mobile/tablet.
2. Coba kirim form tambah tersangka dalam keadaan kosong untuk melihat pesan error validasi DOM.
3. Ketik kata kunci pada kolom pencarian tabel untuk menguji penyaringan baris secara real-time.
4. Klik tombol "Hapus" pada salah satu baris tabel untuk menguji dialog konfirmasi dan penghapusan elemen DOM.
