# Jobsheet 3 — Responsive Design (Crime Records System)

Sub-CPMK: Membangun tampilan responsif menggunakan HTML & CSS murni.

## Penyesuaian Tema & Fitur
- **Tema:** Crime Records System (Gotham City Police Department) — Modul Berkas Tersangka (*Suspects*) dan Direktori Penyidik (*Investigators*).
- **Viewport:** Tag `<meta name="viewport" content="width=device-width, initial-scale=1">` di seluruh halaman.
- **Navbar:** Hamburger menu memakai teknik **checkbox hack** murni CSS (`input[type=checkbox] + label`), aktif di layar $\le$ 768px.
- **Tabel Responsif:** Seluruh tabel dibungkus `<div class="table-responsive">` agar dapat digeser (*scroll*) secara horizontal pada layar sempit tanpa merusak tata letak.
- **Media Query:** Grid kartu statistik beranda otomatis menyesuaikan dari 2 kolom ke 1 kolom di layar mobile/tablet.
- **Data Statis:** Data tabel tersangka (8 entri) dan penyidik (5 entri) dirender secara langsung menggunakan HTML statis (belum menggunakan JavaScript / Fetch).

## Cara Menjalankan
Buka `index.html` langsung di browser, lalu uji dengan DevTools mode responsif pada berbagai ukuran layar (mobile $\le 480$px, tablet ~768px, desktop $\ge 1024$px).
