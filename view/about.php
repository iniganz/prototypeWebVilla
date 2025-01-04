<?php require_once "../application/controller/produk.php" ?>
<?php require_once "../application/controller/anggota.php" ?>

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

</head>


<?php include 'layout/header.php'; ?>

<body align="center" class="body-home">

    <!--akhir slider  -->
    <div>
        <img src="../assets/img/view4.jpg" alt="Header" class="header-img1 w-full">
    </div>
    <div class="anggota" style="display: flex; flex-wrap: wrap; justify-content: center;">


        <h1 class=" card-anggota"> <?php echo h1($nama_anggota, $nim_anggota) ?></h1>
    </div>



    <script src="../js/main.js"></script>
</body>

</html>