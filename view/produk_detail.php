<?php require_once "../application/controller/produk.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'layout/header.php'; ?>
</head>

<body>
    <?php $key_produk = $_GET['key_produk']; ?>    
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
       
            <?php
            // Pesan yang dikirim ke WhatsApp
            $message = "Halo, saya ingin memesan:\n" .
                "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
                "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
                "guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
                "Harga: " . $cuy_vila[$key_produk]['price'];
                
            $encodedMessage = urlencode($message);
            $whatsappNumber = "6287820055714";
            $whatsappLink = "https://wa.me/$whatsappNumber?text=$encodedMessage";
            ?>
          
    <!-- <table width="100%" border="0">
        <tbody>
            <tr>
                <td align="center">
                    <img src="../upload/produk/<?php echo $data_produk[$key_produk]['gambar'] ?>">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h1><?php echo $data_produk[$key_produk]['judul'] ?> </h1>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h2>Rp. <?php echo number_format($data_produk[$key_produk]['harga']) ?> </h2>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h3>Stok : <?php echo number_format($data_produk[$key_produk]['stok']) ?> </h3>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <a href="index.php">Kebali ke Daftar Produk</a>
                </td>
            </tr>

        </tbody>
    </table> -->


            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                <div class="card">
                    <img src="../upload/produk/<?= $cuy_vila[$key_produk]['image'] ?>" alt="<?= $cuy_vila[$key_produk]['title'] ?>">
                    <h3><?= $cuy_vila[$key_produk]['title'] ?></h3>
                    <p><i class="fa-solid fa-bed"></i> <b><?= $cuy_vila[$key_produk]['bedrooms'] ?> Bedroom<?= $cuy_vila[$key_produk]['bedrooms'] > 1 ? 's' : '' ?></b></p>
                    <p><i class="fa-solid fa-people-group"></i> <b><?= $cuy_vila[$key_produk]['guests'] ?> Person<?= $cuy_vila[$key_produk]['guests'] > 1 ? 's' : '' ?></b></p>
                    <!-- <p><b>Extra Bed Price:</b> IDR <?= number_format($cuy_vila[$key_produk]['extra_bed_price'], 0, ',', '.') ?>/Night</p> -->
                    <p class="price">Rp. <?= number_format($cuy_vila[$key_produk]['price']) ?> /Night</p>
                    <a href="<?= $whatsappLink ?>" target="_blank" class="btn">Book Now</a>
                    <!-- <a href="produk_detail.php?key_produk=<?php echo $key ?>"class="btn">Book Now</a> -->
                </div>

</body>

</html>