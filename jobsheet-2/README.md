# PustakaHub — Sistem Informasi Manajemen Perpustakaan

Dashboard dan sistem manajemen perpustakaan modern berbasis HTML dan CSS.

## Struktur Direktori

```
jobsheet-2/
├── assets/
│   └── css/
│       └── style.css
├── item/
│   ├── index.html
│   └── add.html
├── user/
│   ├── index.html
│   └── add.html
└── index.html
```

## Halaman

| Halaman | Deskripsi |
|---|---|
| `index.html` | Dashboard dengan 3 kartu ringkasan: Total Buku, Total Anggota, Kategori Buku |
| `item/index.html` | Tabel koleksi buku (kode, judul, kategori, jumlah) dengan aksi Edit dan Hapus |
| `item/add.html` | Form tambah buku (kode, judul, dropdown kategori, jumlah eksemplar) |
| `user/index.html` | Tabel daftar anggota (username, nama lengkap, kata sandi) dengan aksi Edit dan Hapus |
| `user/add.html` | Form tambah anggota (username, nama lengkap, kata sandi) |

## Fitur

- Dashboard ringkasan statistik pustaka
- CRUD Koleksi Buku (tambah, tinjau daftar, edit, hapus — UI)
- CRUD Data Anggota (tambah, tinjau daftar, edit, hapus — UI)
- Sidebar navigasi antar modul
- 4 klasifikasi kategori buku: Teknologi, Sains, Sastra, Bisnis

## Teknologi

| Layer | Teknologi |
|---|---|
| Markup | HTML5 |
| Styling | CSS3 (Flexbox & CSS Grid) |
