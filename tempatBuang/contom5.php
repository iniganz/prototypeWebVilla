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
    $base_price = $cuy_vila[$key_produk]['price'];
    $breakfast_addition = 520000; // Tambahan harga untuk "Villa With Breakfast"

    // Hitung harga dengan sarapan
    $with_breakfast_price = $base_price + $breakfast_addition;
    $promo_code = "DISKON50"; // Kode promo yang valid
    $discount_percentage = 10; // Diskon dalam persen
    $discounted_price = $base_price;

    $total_price = $base_price; // Harga awal
    $total_with_breakfast_price = $base_price + $breakfast_addition; // Harga awal dengan sarapan
    $promo_message = "";
    $number_of_nights = 1; // Default jumlah malam
    $entered_code = $_POST['promo'] ?? '';

    // Jika form dikirimkan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $entered_code = $_POST['promo'] ?? ''; // Ambil kode promo dari form
        $checkin = isset($_POST['checkin']) ? $_POST['checkin'] : date('Y-m-d');
        $checkout = isset($_POST['checkout']) ? $_POST['checkout'] : date('Y-m-d', strtotime('+1 day'));
        $entered_code = $_POST['promo'] ?? '';

        // Hitung jumlah malam
        $start_date = new DateTime($checkin);
        $end_date = new DateTime($checkout);
        $number_of_nights = $start_date->diff($end_date)->days;

        // Hitung total harga berdasarkan jumlah malam
        $total_price = $base_price * $number_of_nights;
        $total_with_breakfast_price = ($base_price + $breakfast_addition) * $number_of_nights;

        // Validasi kode promo
        if (!empty($entered_code)) {
            if ($entered_code === $promo_code) {
                $discounted_price = $total_price - ($total_price * $discount_percentage / 100);
                $with_breakfast_discounted_price = $total_with_breakfast_price - ($with_breakfast_price * $discount_percentage / 100);
                $promo_message = "Kode promo berhasil! Anda mendapatkan diskon $discount_percentage%.";
            } else {
                $promo_message = "Kode promo tidak valid.";
                $discounted_price = $total_price;
                $with_breakfast_discounted_price = $with_breakfast_price;
            }
        } else {
            $discounted_price = $total_price;
            $with_breakfast_discounted_price = $with_breakfast_price;
        }
    }

    // Mendapatkan tipe vila yang dipilih
    $villa_type = $_POST['villa_type'] ?? ''; // Mendapatkan tipe vila yang dipilih ("Villa Only" atau "Villa With Breakfast")

    // Pesan WhatsApp yang akan dikirim
    if ($villa_type === "Villa With Breakfast") {
        $message = "Halo, saya ingin memesan vila dengan breakfast:\n" .
            "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
            "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
            "Guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
            "Harga: Rp." . number_format($with_breakfast_discounted_price);
    } elseif ($villa_type === "Villa Only") {
        $message = "Halo, saya ingin memesan vila only:\n" .
            "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
            "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
            "Guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
            "Harga: Rp." . number_format($discounted_price);
    } else {
        $message = "Silakan pilih tipe vila.";
    }

    // Encode pesan dan buat link WhatsApp
    $encodedMessage = urlencode($message);
    $whatsappNumber = "6287820055714";
    $whatsappLink = "https://wa.me/$whatsappNumber?text=$encodedMessage";
    ?>

    <?php include '../view/layout/header.php'; ?>

    <!-- Header Image -->
    <div>
        <img src="https://via.placeholder.com/1500x300" alt="Header" class="header-img w-full">
    </div>

    <!-- Navigation Bar -->
    <div class="container mx-auto mt-6">
        <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="villa_type" class="block text-sm font-medium text-gray-700">Pilih Tipe Vila</label>
                <select name="villa_type" id="villa_type" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                    <option value="Villa Only">Villa Only</option>
                    <option value="Villa With Breakfast">Villa With Breakfast</option>
                </select>
            </div>
            <div>
                <label for="checkin" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                <input type="date" id="checkin" name="checkin" value="<?= htmlspecialchars($checkin ?? date('Y-m-d')) ?>" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="checkout" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                <input type="date" id="checkout" name="checkout" value="<?= htmlspecialchars($checkout ?? date('Y-m-d', strtotime('+1 day'))) ?>" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="promo" class="block text-sm font-medium text-gray-700">Have a promo code?</label>
                <input type="text" id="promo" name="promo" placeholder="Enter promo code" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                <?php if (isset($promo_message)) : ?>
                    <p class="text-green-600"><?= htmlspecialchars($promo_message); ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="col-span-2 mt-4 bg-teal-700 text-white py-2 px-4 rounded-md">Calculate</button>
        </form>
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

    <!-- Villa Information -->
    <div class="container mx-auto mt-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div>
                    <img src="../upload/produk/<?= $cuy_vila[$key_produk]['image'] ?>" alt="<?= $cuy_vila[$key_produk]['title'] ?>" class="w-full h-full object-cover">
                </div>
                <div class="col-span-2 p-4">
                    <h5 class="text-xl font-semibold"><?= $cuy_vila[$key_produk]['title'] ?></h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                        <div class="border p-4 rounded-md">
                            <h6 class="text-lg font-semibold"><?php echo "Villa Only" ?></h6>
                            <p class="mt-2">
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                <span class="text-gray-500 text-sm">Non-refundable</span>
                            </p>
                            <h5 class="mt-4 text-xl font-bold">IDR <?= number_format($discounted_price) ?> /Night(s) </h5>
                            <a href="<?= $whatsappLink ?>" target="_blank" class=" btn1 mt-4 w-full bg-teal-700  text-white py-2 rounded-md">Select</a>
                        </div>
                        <div class="border p-4 rounded-md">
                            <h6 class="text-lg font-semibold"><?php echo "Villa With Breakfast" ?></h6>
                            <p class="mt-2">
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Breakfast Included</span><br>
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                <span class="text-gray-500 text-sm">Non-refundable</span>
                            </p>
                            <h5 class="mt-4 text-xl font-bold">IDR <?= number_format($with_breakfast_discounted_price) ?> /Night</h5>
                            <a href="<?= $whatsappLink ?>" target="_blank" class=" btn1 mt-4 w-full bg-teal-700  text-white py-2 rounded-md">Select</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#checkin", {
            minDate: "today",
        });
        flatpickr("#checkout", {
            minDate: "today",
        });
    </script>
</body>
</html>
