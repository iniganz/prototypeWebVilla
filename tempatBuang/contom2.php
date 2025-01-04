<?php require_once "../application/controller/produk.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Bali Villas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .header-img {
            height: 300px;
            object-fit: cover;
        }
    </style>


</head>

<body>
    <?php $key_produk = $_GET['key_produk']; ?>
    <?php
    // Harga dasar villa

    // Harga untuk "Villa Only"
    $base_price = $cuy_vila[$key_produk]['price'];
    $breakfast_addition = 200000; // Tambahan harga untuk "Villa With Breakfast"

    // Hitung harga dengan sarapan
    $with_breakfast_price = $base_price + $breakfast_addition;
    $promo_code = "DISKON50"; // Kode promo yang valid
    $discount_percentage = 50; // Diskon dalam persen
    $discounted_price = $base_price;

    // Jika form dikirimkan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $entered_code = $_POST['promo'] ?? ''; // Ambil kode promo dari form

        // Validasi kode promo
        if ($entered_code === $promo_code) {
            $discounted_price = $base_price - ($base_price * $discount_percentage / 100);
            $with_breakfast_discounted_price = $with_breakfast_price - ($with_breakfast_price * $discount_percentage / 100);
            $promo_message = "Kode promo berhasil! Anda mendapatkan diskon $discount_percentage%.";
        } else {
            $promo_message = "Kode promo tidak valid.";
            $with_breakfast_discounted_price = $with_breakfast_price;
        }
    } else {
        $with_breakfast_discounted_price = $with_breakfast_price;
    }


    

    ?>
    <?php include '../view/layout/header.php'; ?>

    <!-- Header Image -->
    <div>
        <img src="https://via.placeholder.com/1500x300" alt="Header" class="header-img w-full">
    </div>

    <!-- Navigation Bar -->
    <?php
    $tanggal_tampil = "Tanggal yang dipilih: ";
    $tanggal_belum_tampil = "Pilih Tanggal.";
    // Proses data tanggal yang dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedDates = $_POST['dates'] ?? '';
        if (!empty($selectedDates)) {
            // Proses atau simpan tanggal yang dipilih ke database (contoh: hanya menampilkan di sini)
            $tanggal_tampil . htmlspecialchars($selectedDates);
        } else {
            $tanggal_belum_tampil;
        }
    }
    ?>

    
    <!-- Search Form -->
    <div class="container mx-auto mt-6">
        <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="datePicker">Pilih Tanggal:</label>
                <input type="text" id="datePicker" name="dates" placeholder="
                <?php
                if (empty($selectedDates)) {
                    echo "Silahkan Pilih Tanggal";
                } else {
                    echo htmlspecialchars($selectedDates);
                }

                ?>" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                <button type="submit" class="p-2 border border-green-300 rounded-md">Kirim</button>
            </div>
            <div>
                <label for="rooms" class="block text-sm font-medium text-gray-700">Select rooms and guests</label>
                <input type="text" id="rooms" placeholder="<?= $cuy_vila[$key_produk]['bedrooms'] ?> Bedroom<?= $cuy_vila[$key_produk]['bedrooms'] > 1 ? 's' : '' ?>, <?= $cuy_vila[$key_produk]['guests'] ?> Person<?= $cuy_vila[$key_produk]['guests'] > 1 ? 's' : '' ?>" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>
            <div>

                <label for="promo" class="block text-sm font-medium text-gray-700">Have a promo code?</label>
                <input type="text" id="promo" name="promo" placeholder="Enter promo code"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">

                <button type="submit" class="mt-4 bg-teal-700 text-white py-2 px-4 rounded-md">Apply</button>
            </div>
        </form>
        <?php if (isset($promo_message)) : ?>
            <p class="text-green-600"><?= htmlspecialchars($promo_message); ?></p>
        <?php endif; ?>
    </div>

    <!-- Villa Information -->
    <div class="container mx-auto mt-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div>
                    <img src="../upload/produk/<?= $cuy_vila[$key_produk]['image'] ?>" alt="<?= $cuy_vila[$key_produk]['title'] ?>" class="w-full h-full object-cover">
                </div>
                <div class="col-span-2 p-4">
                    <h5 class="text-xl font-semibold"><?= $cuy_vila[$key_produk]['title'] ?></h5>
                    <p class="mt-2 text-gray-600">
                        <i class="fa-solid fa-bed"></i> <b><?= $cuy_vila[$key_produk]['bedrooms'] ?> Bedroom<?= $cuy_vila[$key_produk]['bedrooms'] > 1 ? 's' : '' ?></b> | <i class="fa-solid fa-people-group"></i> <b><?= $cuy_vila[$key_produk]['guests'] ?> Person<?= $cuy_vila[$key_produk]['guests'] > 1 ? 's' : '' ?></b> <br>
                        150m² | Pool View | Non-smoking | Free Wifi
                    </p>
                    <p class="mt-2 text-gray-600">
                        1 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services...
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                        <div class="border p-4 rounded-md">
                            <h6 class="text-lg font-semibold">Villa Only</h6>
                            <p class="mt-2">
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                <span class="text-gray-500 text-sm">Non-refundable</span>
                            </p>
                            <h5 class="mt-4 text-xl font-bold">IDR
                                <?php
                                if ($base_price != $discounted_price) {
                                    echo '<del>' . number_format($base_price) . '</del>' . ' ' . number_format($discounted_price);
                                } else {
                                    $harga = number_format($base_price);
                                    echo $harga;
                                }
                                ?> /Night</h5>
                            <button class="mt-4 w-full bg-teal-700 text-white py-2 rounded-md">Select</button>
                        </div>
                        <div class="border p-4 rounded-md">
                            <h6 class="text-lg font-semibold">Villa With Breakfast</h6>
                            <p class="mt-2">
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Breakfast Included</span><br>
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                <span class="text-gray-500 text-sm">Non-refundable</span>
                            </p>
                            <h5 class="mt-4 text-xl font-bold">IDR
                                <?php
                                if ($with_breakfast_price != $with_breakfast_discounted_price) {
                                    echo '<del>' . number_format($with_breakfast_price) . '</del>' . ' ' . number_format($with_breakfast_discounted_price);
                                } else {
                                    $harga_bf = number_format($with_breakfast_price);
                                    echo $harga_bf;
                                }
                                ?> /Night</h5>
                            <button class="mt-4 w-full bg-teal-700 text-white py-2 rounded-md">Select</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#datePicker", {
            mode: "range", // Untuk memilih rentang tanggal
            dateFormat: "Y-m-d", // Format tanggal
            minDate: "today", // Tanggal minimum adalah hari ini
        });
    </script>
</body>

</html>