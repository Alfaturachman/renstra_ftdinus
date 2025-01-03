<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Artikel Ilmiah</title>
</head>

<body>
    <h1>Data Artikel Ilmiah - Tahun <?= $tahun ?></h1>

    <div>
        <h3>Pilih Tahun:</h3>
        <?php foreach ($tahunList as $row): ?>
            <a href="<?= site_url('artikel/index?tahun=' . $row['tahun']) ?>"
                style="margin-right: 10px; <?= ($row['tahun'] == $tahun) ? 'font-weight: bold;' : '' ?>">
                <?= $row['tahun'] ?>
            </a>
        <?php endforeach; ?>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jurnal Internasional Bereputasi</td>
                <td><?= ($jumlah_dosen > 0) ? number_format($total_jurnal_bereputasi / $jumlah_dosen, 2) : 0 ?></td>
            </tr>
            <tr>
                <td>Jurnal Internasional</td>
                <td><?= ($jumlah_dosen > 0) ? number_format($total_jurnal_internasional / $jumlah_dosen, 2) : 0 ?></td>
            </tr>
            <tr>
                <td>Jurnal Nasional Terakreditasi</td>
                <td><?= ($jumlah_dosen > 0) ? number_format($total_jurnal_nasional / $jumlah_dosen, 2) : 0 ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>