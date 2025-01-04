<?php require_once "../application/controller/produk.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="website icon" type="png" href="../assets/img/logo1.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/cuy.css">
    <title>Serenity Bloom Villas</title>
<link rel="website icon" type="png" href="../assets/img/logo1.png" />
</head>
<style>
 /* body {
        background-image: url('../assets/img/view4.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    } */

</style>

<body>

    <?php include 'layout/header.php'; ?>
    <div >

        <img src="../assets/img/view4.jpg" alt="Header" class="header-img w-full">
    </div>


    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php foreach ($cuy_vila as $key => $room): ?>
            <div class="card">
                <img src="../upload/produk/<?= $room['image'] ?>" alt="<?= $room['title'] ?>">
                <h3><?= $room['title'] ?></h3>
                <p><i class="fa-solid fa-bed"></i> <b><?= $room['bedrooms'] ?> Bedroom<?= $room['bedrooms'] > 1 ? 's' : '' ?></b></p>
                <p><i class="fa-solid fa-people-group"></i> <b><?= $room['guests'] ?> Person<?= $room['guests'] > 1 ? 's' : '' ?></b></p>
                <!-- <p><b>Extra Bed Price:</b> IDR <?= number_format($room['extra_bed_price'], 0, ',', '.') ?>/Night</p> -->
                <p class="price">Rp.<?= number_format($room['price']) ?>/Night</p>
                <a href="booknow.php?key_produk=<?php echo $key ?>" class="btn">Book Now</a>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="../js/main.js"></script>
</body>

</html>