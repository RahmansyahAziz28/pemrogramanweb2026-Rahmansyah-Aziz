# Wireframe & User Flow — Crime Records System (GCPD)

Sub-CPMK: Merancang UI/UX aplikasi sistem informasi kriminal dan investigasi.

Dokumen ini merancang wireframe dan alur interaksi pengguna (*user flow*) untuk Crime Records System (Gotham City Police Department - ) sebelum diimplementasikan pada Jobsheet 5 (interaktivitas DOM/JS) dan Jobsheet 6 (komunikasi data asinkron JSON).

---

## 1. Aktor Sistem

- **Tamu / Personel Tidak Terautentikasi**: Hanya dapat mengakses landing page publik atau dialihkan ke halaman login.
- **Patrol Officer / Petugas Lapangan**: Dapat melihat direktori penyidik aktif dan meninjau daftar tersangka terdata.
- **Detektif / Penyidik (Investigator)**: Memiliki hak akses penuh untuk melakukan registrasi tersangka baru, memperbarui berkas perkara, dan mengelola direktori kasus.
- **Commissioner / Kepala Divisi**: Memiliki otoritas manajemen tertinggi dan pemantauan statistik kejahatan kota secara menyeluruh.

---

## 2. Alur Pengguna (User Flow)

### A. Alur Registrasi Berkas Tersangka Baru
```
[Petugas Login] 
       │
       ▼
[Dashboard Investigasi] 
       │
       ▼ (Pilih menu "Tambah Tersangka")
[Form Registrasi Tersangka]
       │
       ├─► Isi No. Identitas (Wajib, Format GTH-ID-XXXXX)
       ├─► Isi Nama Lengkap / Alias (Wajib)
       ├─► Pilih Tanggal Lahir & Gender
       └─► Masukkan Alamat / Lokasi Terakhir
       │
       ▼ (Klik "Simpan Berkas")
[Validasi Client-Side] ──(Jika tidak valid)──► Tampilkan Error Inline
       │ (Valid)
       ▼
[Data Tersimpan ke Arsip] ──► Redirect ke [Daftar Tersangka]
```

### B. Alur Penyelidikan & Penugasan Penyidik
```
[Dashboard] ──► [Daftar Tersangka] ──► [Pilih Tersangka]
                      │
                      ▼
            [Pilih Penyidik dari Direktori]
                      │
                      ▼
            [Status Tersangka Diperbarui: Dalam Investigasi]
```

---

## 3. Wireframe Antarmuka

### Wireframe 1: Halaman Login Personel GCPD (`login.html`)
```
+-------------------------------------------------------------+
|                      CRIME RECORDS SYSTEM                    |
+-------------------------------------------------------------+
|                                                             |
|                +---------------------------+                |
|                |   PORTAL PERSONEL GCPD    |                |
|                |  Akses Terbatas Petugas   |                |
|                |---------------------------|                |
|                | No. Lencana / Username:   |                |
|                | [_______________________] |                |
|                |                           |                |
|                | Kata Sandi Akses:         |                |
|                | [***********************] |                |
|                |                           |                |
|                | [x] Ingat sesi dinas      |                |
|                |                           |                |
|                |     [ MASUK KE SISTEM ]   |                |
|                |                           |                |
|                | Bantuan: Divisi Internal  |                |
|                +---------------------------+                |
|                                                             |
+-------------------------------------------------------------+
```

### Wireframe 2: Dashboard Investigasi (`index.html`)
```
+-------------------------------------------------------------+
| CRIME RECORDS   [Beranda] [Tersangka] [+ Tambah] [Penyidik] |
+-------------------------------------------------------------+
|  Pusat Basis Data Kejahatan Gotham City                     |
|  Sistem manajemen arsip tersangka dan direktori resmi GCPD  |
|                                                             |
|  +---------------------------+ +--------------------------+ |
|  | TOTAL TERSANGKA TERDATA   | | PENYIDIK & DETEKTIF AKTIF| |
|  |           8               | |            5             | |
|  +---------------------------+ +--------------------------+ |
+-------------------------------------------------------------+
```

### Wireframe 3: Registrasi Tersangka Baru (`suspects/tambah.html`)
```
+-------------------------------------------------------------+
| CRIME RECORDS   [Beranda] [Tersangka] [+ Tambah] [Penyidik] |
+-------------------------------------------------------------+
|  Registrasi Berkas Tersangka Baru                           |
|                                                             |
|  Nomor Identitas (ID Polisi/Dokumen) :                     |
|  [ Contoh: GTH-ID-99210                 ]                   |
|                                                             |
|  Nama Lengkap / Alias :                                     |
|  [ Masukkan nama lengkap tersangka      ]                   |
|                                                             |
|  Tanggal Lahir :            Jenis Kelamin :                 |
|  [ YYYY-MM-DD          ]    [ Male / Female / Other ▼ ]     |
|                                                             |
|  Alamat / Lokasi Terakhir Terlihat :                        |
|  [                                     ]                    |
|  [                                     ]                    |
|                                                             |
|  [ SIMPAN BERKAS ]     [ KEMBALI ]                          |
+-------------------------------------------------------------+
```

### Wireframe 4: Daftar Tersangka dengan Toolbar (`suspects/list.html`)
```
+-------------------------------------------------------------+
| CRIME RECORDS   [Beranda] [Tersangka] [+ Tambah] [Penyidik] |
+-------------------------------------------------------------+
|  Daftar Tersangka                                           |
|                                                             |
|  Cari Data Tersangka:                                       |
|  [ Ketik nama, ID, atau alamat...    ]                      |
|                                                             |
|  +--------------------------------------------------------+ |
|  | ID POLISI  | NAMA TERSANGKA | GENDER | ALAMAT  | AKSI  | |
|  |------------+----------------+--------+---------+-------| |
|  | GTH-ID-..  | Jack Napier    | Male   | Monarch | Edit/H| |
|  | GTH-ID-..  | O. Cobblepot   | Male   | Iceberg | Edit/H| |
|  +--------------------------------------------------------+ |
+-------------------------------------------------------------+
```

---

## 4. Konsistensi Desain
- Tema visual mengusung nuansa *Gotham Tactical Noir* menggunakan palet warna gelap (`#0b0f19`, `#121826`, `#1a2234`) dipadukan dengan aksen emas GCPD (`#f59e0b`) dan biru investigasi (`#38bdf8`).
- Komponen input, tombol, badge ID, dan tata letak tabel telah disiapkan agar siap diintegrasikan dengan interaktivitas JavaScript pada Jobsheet 5.
