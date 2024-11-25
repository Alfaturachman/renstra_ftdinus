<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pelaporan EWMP</li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-white bg-success">
                        <h5 class="pt-2"><strong>Detail Pelaporan EWMP</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Silahkan untuk mengecek detail Pelaporan EWMP Fakultas Teknik UDINUS Semarang
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="<?= base_url('ewmp/create_view') ?>" type="button" class="btn btn-warning mb-4"><i class="bi bi-pencil"></i> <strong>Edit Pelaporan</strong></a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width: 100px;">Email</th>
                                    <td style="width: 100px;"><?= htmlspecialchars($pelaporan['email']) ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Lapor</th>
                                    <td><?= htmlspecialchars($pelaporan['jenis_lapor']) ?></td>
                                </tr>
                                <tr>
                                    <th>Waktu Input</th>
                                    <td><?= formatDateTime($pelaporan['ins_time']) ?></td>
                                </tr>
                                <tr>
                                    <th>Kategori Prosiding</th>
                                    <td><?= htmlspecialchars($prosiding['kategori']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Penulis Pertama</th>
                                    <td><?= htmlspecialchars($prosiding['nama_pertama']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Penulis Korespondensi</th>
                                    <td><?= htmlspecialchars($prosiding['nama_korespon']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <td><?= htmlspecialchars($prosiding['nama_anggota']) ?></td>
                                </tr>
                                <tr>
                                    <th>Judul Artikel</th>
                                    <td><?= htmlspecialchars($prosiding['judul_artikel']) ?></td>
                                </tr>
                                <tr>
                                    <th>Judul Conference/Seminar</th>
                                    <td><?= htmlspecialchars($prosiding['judul_seminar']) ?></td>
                                </tr>
                                <tr>
                                    <th>Bukti LOA</th>
                                    <td>
                                        <a href="<?= base_url('uploads/prosiding/') . $prosiding['bukti_loa'] ?>" target="_blank" class="btn btn-danger"><i class="bi bi-file-pdf"></i> PDF</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>DOI</th>
                                    <td><?= htmlspecialchars($prosiding['doi']) ?></td>
                                </tr>
                            </table>
                            <div class="text-end">
                                <a href="<?= site_url('ewmp') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// Format Tanggal dan Waktu
function formatDateTime($datetime)
{
    if (empty($datetime)) {
        return "-"; // Atau teks lain sesuai kebutuhan
    }

    $date = new DateTime($datetime);
    $months = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    $day = $date->format('d');
    $month = $months[(int)$date->format('m')];
    $year = $date->format('Y');
    $time = $date->format('H:i:s');

    return "{$day} {$month} {$year}, {$time} WIB";
}
?>