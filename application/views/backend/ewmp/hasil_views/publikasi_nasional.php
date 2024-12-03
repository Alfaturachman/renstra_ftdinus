<style>
    div.dt-container select.dt-input {
        margin-right: 8px;
    }

    .chart-container {
        display: flex;
        justify-content: center;
        /* Memusatkan secara horizontal */
        align-items: center;
        /* Memusatkan secara vertikal */
        height: 100%;
        /* Pastikan tinggi kolom tercakup */
    }
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Hasil Pelaporan EWMP</li>
                <li class="breadcrumb-item active">Publikasi Nasional EWMP</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-white bg-success">
                        <h5 class="pt-2"><strong>Daftar Publikasi Nasional EWMP</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Silahkan untuk mengecek Publikasi Nasional Pelaporan EWMP Fakultas Teknik UDINUS Semarang
                        </div>
                        <div class="row">
                            <div class="col-6" style="height: 300px;">
                                <div class="chart-container">
                                    <canvas id="chartQ" width="400" height="400"></canvas>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>S1</td>
                                            <td><?= $s1_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>S2</td>
                                            <td><?= $s2_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>S3</td>
                                            <td><?= $s3_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>S4</td>
                                            <td><?= $s4_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>S5</td>
                                            <td><?= $s5_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>S6</td>
                                            <td><?= $s6_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nasional Tidak Terakreditasi</td>
                                            <td><?= $tdk_terakreditasi_data ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><?= $total = $s1_data + $s2_data + $s3_data + $s4_data + $s5_data + $tdk_terakreditasi_data ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-start align-middle" style="width: 350px;">Kategori Publikasi</th>
                                        <th class="text-start align-middle" style="width: 350px;">Nama</th>
                                        <th class="text-start align-middle" style="width: 350px;">Judul Artikel</th>
                                        <th class="text-start align-middle" style="width: 350px;">Judul Jurnal</th>
                                        <th class="text-start align-middle" style="width: 250px;">Waktu Pengisian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pub_nasional as $pi): ?>
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
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div>
                            <a href="<?= base_url('ewmp/hasil') ?>" type="button" class="btn btn-secondary my-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    new DataTable('#datatable');
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Data dari PHP
        var s1Data = <?= json_encode($s1_data) ?>;
        var s2Data = <?= json_encode($s2_data) ?>;
        var s3Data = <?= json_encode($s3_data) ?>;
        var s4Data = <?= json_encode($s4_data) ?>;
        var s5Data = <?= json_encode($s5_data) ?>;
        var s6Data = <?= json_encode($s6_data) ?>;
        var tdkTerakreditasiData = <?= json_encode($tdk_terakreditasi_data) ?>;

        // Ambil elemen canvas
        var ctx = document.getElementById("chartQ").getContext("2d");

        // Data untuk Chart.js
        var data = {
            labels: ["S1", "S2", "S3", "S4", "S5", "S6", "Nasional Tidak Terakreditasi"],
            datasets: [{
                data: [s1Data, s2Data, s3Data, s4Data, s5Data, s6Data, tdkTerakreditasiData],
                backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#E0E0E0"],
                hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C0C0C0"]
            }]
        };

        // Membuat grafik pie
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var label = data.labels[tooltipItem.dataIndex];
                                var value = data.datasets[0].data[tooltipItem.dataIndex];
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });
    });
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