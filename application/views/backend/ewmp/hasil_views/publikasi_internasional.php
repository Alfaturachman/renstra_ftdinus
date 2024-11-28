<style>
    div.dt-container select.dt-input {
        margin-right: 8px;
    }
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Hasil Pelaporan EWMP</li>
                <li class="breadcrumb-item active">Publikasi Internasional EWMP</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-white bg-success">
                        <h5 class="pt-2"><strong>Daftar Publikasi Internasional EWMP</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Silahkan untuk mengecek Publikasi Internasional Pelaporan EWMP Fakultas Teknik UDINUS Semarang
                        </div>
                        <div class="row">
                            <div class="col-6" style="height: 300px;">
                                <div id="chartQ"></div>
                            </div>
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Q1</td>
                                            <td>22</td>
                                        </tr>
                                        <tr>
                                            <td>Q2</td>
                                            <td>11</td>
                                        </tr>
                                        <tr>
                                            <td>Q3</td>
                                            <td>33</td>
                                        </tr>
                                        <tr>
                                            <td>Q4</td>
                                            <td>33</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>33</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-start align-middle" style="width: 250px;">Kategori Publikasi</th>
                                        <th class="text-start align-middle" style="width: 250px;">Nama</th>
                                        <th class="text-start align-middle" style="width: 250px;">Judul Artikel</th>
                                        <th class="text-start align-middle" style="width: 250px;">Judul Jurnal</th>
                                        <th class="text-start align-middle" style="width: 150px;">Waktu Pengisian</th>
                                        <th class="text-start align-middle" style="width: 150px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pub_internasional as $pi): ?>
                                        <tr>
                                            <td class="align-middle"><?= htmlspecialchars($pi->kategori) ?></td>
                                            <td class="align-middle">
                                                <!-- Tampilkan nama pertama -->
                                                <?= htmlspecialchars($pi->nama_pertama) ?>;
                                                <!-- Iterasi anggota ilmiah -->
                                                <?php if (!empty($pi->anggota_ilmiah)): ?>
                                                    <?php foreach ($pi->anggota_ilmiah as $ai): ?>
                                                        <?= htmlspecialchars($ai->nama) ?>;
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="align-middle"><?= $pi->judul_artikel ?></td>
                                            <td class="align-middle"><?= $pi->judul_jurnal ?></td>
                                            <td class="align-middle"><?= formatDateTime($pi->ins_time) ?></td>
                                            <td class="align-middle">
                                                <a href="<?= site_url('ewmp/detail_pelaporan/' . htmlspecialchars($pi->id)) ?>" class="btn btn-sm btn-success">
                                                    <i class="bi bi-journal-text"></i> Detail
                                                </a>
                                                <button type="button" class="btn btn-sm btn-warning edit-suntik-btn"
                                                    data-bs-toggle="modal" data-bs-target="#SuntikModal"
                                                    data-id="<?= htmlspecialchars($pi->id) ?>">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>
                                                <a class="btn btn-sm btn-danger delete-suntik-btn"
                                                    href="<?= site_url('ewmp/delete_pelaporan/' . htmlspecialchars($pi->id)) ?>"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pelaporan ini?');">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    new DataTable('#datatable');

    var options = {
        series: [25, 15, 44, 55],
        chart: {
            width: '100%',
            height: '100%',
            type: 'pie',
        },
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        theme: {
            monochrome: {
                enabled: true,
            },
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    offset: -5,
                },
            },
        },
        grid: {
            padding: {
                top: 0,
                bottom: 0,
                left: 0,
                right: 0,
            },
        },
        dataLabels: {
            formatter(val, opts) {
                const name = opts.w.globals.labels[opts.seriesIndex];
                return [name, val.toFixed(1) + '%'];
            },
        },
        legend: {
            show: true, // Menampilkan legend
            position: 'bottom', // Posisi legend di bawah
            horizontalAlign: 'center', // Rata tengah secara horizontal
            markers: {
                width: 12,
                height: 12,
                radius: 12, // Membuat marker berbentuk lingkaran
            },
            itemMargin: {
                horizontal: 10,
                vertical: 5,
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chartQ"), options);
    chart.render();
</script>

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