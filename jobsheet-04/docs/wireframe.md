# Dokumentasi Perancangan UI/UX - Arsip Kriminal Kota Gotham

Sub-CPMK: Merancang antarmuka dan alur pengguna sistem investigasi kriminal berbasis web.

Dokumen ini memuat perancangan wireframe dan alur pengguna untuk sistem dokumentasi tindak pidana kepolisian Kota Gotham, yang mencakup modul Beranda Operasional, Berkas Perkara, Pendaftaran Perkara, dan Direktori Detektif.

## Peran Pengguna
- Publik: Dapat melihat ringkasan pengumuman perkara terbuka dan informasi umum.
- Detektif dan Perwira Investigasi: Memiliki otorisasi untuk menginput data perkara, memperbarui profil ancaman, dan mengelola penugasan personel.

## Alur Pengguna: Pendaftaran Perkara Pidana Baru

```
[Halaman Beranda] -> [Pilih tombol "Tambah Perkara"]
        -> [Mengisi Nama Subjek, Alias, dan Nomor Perkara]
        -> [Menentukan Klasifikasi Kejahatan dan Tingkat Ancaman]
        -> [Menyimpan Berkas] -> [Tercatat pada Arsip Aktif]
```

## Alur Pengguna: Penugasan Personel Detektif

```
[Halaman Beranda] -> [Masuk Menu "Personel Detektif"]
        -> [Melihat Daftar Detektif dan Status Dinas]
        -> [Pilih Detektif yang Bertugas]
        -> [Perbarui Wilayah Penugasan dan Kanal Komunikasi]
        -> [Simpan Pembaruan Data]
```

## Wireframe: Pusat Investigasi Kejahatan (Beranda)

```
+-------------------------------------------------------------+
| [GOTHAM] Arsip Kriminal    Beranda | Perkara | Personel     |
|-------------------------------------------------------------|
| Pusat Investigasi Kejahatan Gotham                          |
| [ + Input Perkara Baru ]   [ Direktori Detektif ]           |
|                                                             |
| [ 48 Berkas Aktif ]    [ 16 Detektif ]    [ 32 Ditahan ]    |
|                                                             |
| Perkara Prioritas Terkini                                   |
| Nomor Perkara | Nama Subjek       | Status       | Aksi     |
| PK-2022-014   | Edward Nashton    | [Kritis]     | [Detail] |
| PK-2021-089   | Oswald Cobblepot  | [Tinggi]     | [Detail] |
+-------------------------------------------------------------+
```

## Wireframe: Daftar Berkas Perkara Kriminal

```
+-------------------------------------------------------------+
| Daftar Berkas Perkara Kriminal                              |
| [ + Input Perkara Baru ]                                    |
|                                                             |
| Nomor       | Subjek          | Klasifikasi  | Ancaman| Aksi|
| PK-2022-014 | Edward Nashton  | Terorisme    | Kritis | [..]|
| PK-2021-089 | Oswald Cobblepot| Penyelundupan| Tinggi | [..]|
+-------------------------------------------------------------+
```

## Wireframe: Direktori Personel Detektif

```
+-------------------------------------------------------------+
| Direktori Personel Detektif Gotham                          |
| [ + Tambah Personel Baru ]                                  |
|                                                             |
| Lencana   | Nama Detektif   | Satuan Wilayah | Kanal  | Aksi|
| LNC-001   | James Gordon    | Satuan Utama   | 142.50 | [..]|
| LNC-007   | Harvey Bullock  | Kejahatan Berat| 142.75 | [..]|
+-------------------------------------------------------------+
```

## Pedoman Tampilan Visual
- Warna Utama: Merah Pekat Solid (#e50914) untuk aksen border, tombol tindakan, dan penanda penting.
- Latar Belakang: Hitam Gelap (#0a0a0d) dan Abu Arang Gelap (#121217).
- Tanpa Gradasi: Seluruh pewarnaan menggunakan warna datar (solid color) untuk menjaga kontras tinggi dan ketegasan visual.
- Implementasi Berkas: Halaman statis terhubung pada index.html, buku/list.html, buku/tambah.html, dan anggota/list.html.
