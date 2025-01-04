<?php require_once "../application/controller/produk.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'layout/header.php'; ?>
</head>
<body>

    <table width="100%" border="1" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Keterangan</th>
                <th>Menu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_produk as $key => $row) {
                $no = $key + 1;
            ?>

                <tr>
                    <td><?php echo ++$no ?>.</td>
                    <td><img src="../upload/produk/<?php echo $row['gambar'] ?>" width="100" alt=""></td>
                    <td><?php echo $row['judul'] ?></td>
                    <td>
                        <?php if ($row['harga'] > 300000) {
                            $harga_sebelum_diskon = $row['harga'];
                            $potongan = $row['harga'] * $diskon;
                            $harga_sekarang = $row['harga'] - $potongan;
                            echo '<del>' . number_format($harga_sebelum_diskon) . '</del>' . $harga_sekarang;
                        } else {
                            $harga = number_format($row['harga']);
                            echo $harga;
                        }
                        ?>
                        <!-- <?php echo 'Rp.' . number_format($harga) ?> -->
                    </td>
                    <td><?php echo $row['stok'] == 0 ? 'Sold Out' : $row['stok'] ?></td>
                    <td><?php echo read_more($row['keterangan']) ?></td>
                    <td><a href="produk_detail.php?key_produk=<?php echo $key ?>">Detail</a></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>