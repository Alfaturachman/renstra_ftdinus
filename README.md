# Renstra - Sistem Informasi Rencana Strategis & Monitoring IKU

Sistem Informasi **Renstra** (Rencana Strategis) adalah platform berbasis web yang dirancang untuk mengelola, memantau, dan melaporkan Indikator Kinerja Utama (IKU) serta beban kerja dosen (EWMP). Aplikasi ini dikembangkan khusus untuk kebutuhan manajemen data akademik di lingkungan fakultas/universitas.

---

## Fitur Utama & Modul Sistem

### 1. Sistem Monitoring IKU (Indikator Kinerja Utama)

Sistem ini dirancang untuk memantau performa institusi berdasarkan target tahunan yang terukur.

- **Struktur Hierarki**:
  - **Level 1**: Sasaran Strategis Utama.
  - **Level 2**: Indikator Kinerja Utama (IKU).
  - **Level 3**: Rincian Target per Bidang.
  - **Level 4**: Detail Operasional/Indikator Teknis.
- **Pengelolaan Data**: Fitur Tambah/Edit/Hapus untuk setiap level indikator, serta penentuan Bobot dan Target di setiap periode tahun akademik.
- **Tracking Real-time**: Update capaian (Realisasi) yang langsung terintegrasi dengan persentase kemajuan di dashboard.

### 2. Modul EWMP (Ekuivalen Waktu Mengajar Penuh)

Modul inti bagi Dosen untuk melaporkan beban kerja tridharma secara akurat:

- **Penelitian & Pengabdian**:
  - Pengelolaan judul penelitian, kategori (Dana Internal/DIKTI/Lainnya).
  - Manajemen Anggota: Pencatatan peran (Ketua/Anggota) serta kolaborasi dengan Mahasiswa (NIM terintegrasi).
  - Monitoring Dana: Pencatatan besar hibah dan pemberi hibah.
- **Publikasi Karya Ilmiah**:
  - **Jurnal**: Klasifikasi Jurnal Nasional (Sinta 1-6), Internasional Bereputasi (Q1-Q4), dan Internasional Non-Scopus.
  - **Prosiding**: Dokumentasi artikel seminar nasional dan internasional.
  - Integrasi Link: Penyimpanan URL Jurnal, Volume, Nomor, dan DOI untuk verifikasi data.
- **Hak Kekayaan Intelektual (HAKI)**:
  - Dokumentasi spesifik untuk: _Hak Cipta, Merk, Lisensi, Buku (ISBN), Paten,_ dan _Desain Industri_.
  - Upload Sertifikat: Penyimpanan bukti legalitas HAKI dalam sistem.
- **Aktivitas Penunjang**: Pencatatan peran sebagai _Editor Jurnal, Reviewer,_ hingga _Invited Speaker_ pada acara ilmiah.

### 3. Manajemen Pengguna & Keamanan

- **Multi-Level Access Control (RBAC)**:
  - **Admin**: Akses penuh ke data master, manajemen user, dan konfigurasi sistem.
  - **Koordinator**: Pengelola data IKU dan verifikasi laporan dosen.
  - **Dosen**: User personal untuk menginput data EWMP dan memantau progres publikasi mandiri.
- **Autentikasi Aman**: Sistem login terpusat dengan enkripsi password.

### 4. Pelaporan & Output Dokumentasi

- **Visual Analytics Dashboard**: Chart interaktif yang menyajikan perbandingan Target vs Capaian IKU serta tren publikasi tahunan.
- **Export System**:
  - **Cetak Laporan**: Mengonversi data web ke format PDF yang rapi untuk lampiran akreditasi.
  - **Rekapitulasi**: Fitur ringkasan hasil pelaporan per tahun akademik.

---

## Tech Stack

- **Framework**: CodeIgniter 3.1.x
- **Bahasa Pemrograman**: PHP >= 5.6
- **Database**: MySQL / MariaDB
- **Frontend**: Bootstrap 4+, DataTables, Chart.js (Dashboard Analytics)
- **Library Tambahan**:
  - `dompdf` / `mPDF` (Report Generation)
  - PHP Composer (Dependency Manager)

---

## Lisensi

Proyek ini dikembangkan untuk kepentingan internal dan menggunakan lisensi MIT.
