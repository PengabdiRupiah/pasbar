<?php
require 'dbcon.php';


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Tampil Data Survey</title>
</head>

<body>
    <div class="container-tbl">
        <h1>Tampil Data Survey</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Dokumen</th>
                    <th>Kondisi</th>
                    <th>P2TL</th>
                    <th>Tunggakan</th>
                    <th>Detail</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM repo";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    while ($pln = mysqli_fetch_assoc($query_run)) {
                        $dokumen = $pln['dokumen'];
                        $kondisi = $pln['kondisi'];
                        $p2tl = $pln['p2tl'];
                        $tunggakan = $pln['tunggakan'];
                        $disabled = ($dokumen == 'tidak aman' || $kondisi == 'tidak aman' || $p2tl == 'tidak aman' || $tunggakan == 'tidak aman') ? 'disabled' : '';
                        $btn_class = ($disabled == 'disabled') ? 'red' : 'blue';
                ?>
                        <tr>
                            <td class="id"><?= $pln['id']; ?></td>
                            <td data-label="nama"><?= $pln['nama']; ?></td>
                            <td data-label="alamat"><?= $pln['alamat']; ?></td>
                            <td data-label="dokumen"><?= $dokumen; ?></td>
                            <td data-label="kondisi"><?= $kondisi; ?></td>
                            <td data-label="p2tl"><?= $p2tl; ?></td>
                            <td data-label="tunggakan"><?= $tunggakan; ?></td>
<td class="txt" data-label="keterangan"><?= $keterangan; ?></td>
<td>
<a class="next <?= $btn_class; ?>" href="menu22.php?id=<?= $pln['id']; ?>" <?= $disabled; ?>>next</a>
</td>
</tr>
<?php
                 }
             }
             ?>
</tbody>
</table>
</div>
<script src="func.js"></script>

</body>
</html>
