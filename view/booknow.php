<?php require_once "../application/controller/produk.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="website icon" type="png" href="../assets/img/logo1.png" />
    <script src="https://cdn.tailwindcss.com"></script>



</head>

<body>
    <?php $key_produk = $_GET['key_produk']; ?>
    <?php


    // Harga untuk "Villa Only"
    $harga_awal = $cuy_vila[$key_produk]['price'];
    $harga_sarapan = 520000; // Tambahan harga untuk "Villa With Breakfast" | tipe data = 3 integer

    // Hitung harga dengan sarapan
    $harga_dengan_sarapan = $harga_awal + $harga_sarapan;
    $kode_promo = "DISKON2024";  // variabel $kode_promo yang berisi string DISKON2024 | tipe data = 2 string
    $persentase_diskon = $diskon; // Diskon dalam persen => $
    $harga_diskon = $harga_awal;

    $total_harga = $harga_awal; // Harga awal
    $total_harga_dengan_sarapan = $harga_awal + $harga_sarapan; // Harga awal dengan sarapan
    $promo_message = "";
    $number_of_nights = 1; // Default jumlah per malam

    $entered_code = $_POST['promo'] ?? '';
    // Kode ini digunakan untuk mengambil nilai yang dikirimkan melalui form HTML dengan metode POST, pada input yang memiliki atribut name="promo". Form ini terkait dengan kode promo yang dimasukkan oleh pengguna.
    /* $_POST['promo']:
    - Mengakses nilai dari input dengan name="promo" pada form POST.
    - Jika pengguna mengirimkan form dan mengisi input kode promo, nilai tersebut akan tersedia di $_POST['promo'].
    */
    /*?? '':
    - Operator Null Coalescing (??) digunakan untuk memberikan nilai default jika $_POST['promo'] tidak ada atau tidak diatur.
    - Jika pengguna tidak mengisi kode promo atau input promo tidak terkirim, maka $_POST['promo'] tidak akan ada. Dalam hal ini, $entered_code akan diatur ke string kosong ''
     */
    // $entered_code = isset($_POST['promo']) ? $_POST['promo'] : '';


    // Jika form dikirimkan
    // percabangan 5
    // percabangan bersarang 1
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $entered_code = $_POST['promo'] ?? ''; // Ambil kode promo dari form
        $checkin = isset($_POST['checkin']) ? $_POST['checkin'] : date('Y-m-d'); // v
        /*
        - Menentukan tanggal check-in berdasarkan input dari form.
        - Jika pengguna tidak memasukkan tanggal check-in ($_POST['checkin'] tidak ada atau kosong), maka tanggal defaultnya adalah hari ini (date('Y-m-d')).

        - isset($_POST['checkin']): Mengecek apakah input checkin dikirim melalui form.
        - $_POST['checkin']: Mengambil nilai tanggal check-in yang dikirimkan oleh pengguna.
        - date('Y-m-d'): Mengambil tanggal hari ini dalam format YYYY-MM-DD (misalnya, 2024-12-22).

         */
        $checkout = isset($_POST['checkout']) ? $_POST['checkout'] : date('Y-m-d', strtotime('+1 day'));
        /*
        - isset($_POST['checkout']): Mengecek apakah input checkout ada di form.
        - $_POST['checkout']: Mengambil nilai tanggal check-out yang dikirimkan oleh pengguna.
        - date('Y-m-d', strtotime('+1 day')):
            - Fungsi date() menghasilkan tanggal dalam format YYYY-MM-DD.
            - Fungsi strtotime('+1 day') menambah satu hari dari tanggal saat ini.
         */
        $entered_code = $_POST['promo'] ?? '';

        // Hitung jumlah malam
        $start_date = new DateTime($checkin);
        $end_date = new DateTime($checkout);
        $number_of_nights = $start_date->diff($end_date)->days;

        // Hitung total harga berdasarkan jumlah malam
        $total_harga = $harga_awal * $number_of_nights;
        $total_harga_dengan_sarapan = ($harga_awal + $harga_sarapan) * $number_of_nights;

        // Validasi kode promo
        // percabangan 1
        // percabangan bersarang 2
        if (!empty($entered_code)) {
            if ($entered_code === $kode_promo) {
                $harga_diskon = $total_harga - ($total_harga * $persentase_diskon / 100); // total_harga dikali persentasi_diskon habis itu baru di bagi 100
                $with_breakfast_discounted_price = $total_harga_dengan_sarapan - ($harga_dengan_sarapan * $persentase_diskon / 100); // cara kerjanya sama 
                $promo_message = "Kode promo berhasil! Anda mendapatkan diskon $persentase_diskon%.";
            } else {
                $promo_message = "Kode promo tidak valid.";
                $harga_diskon = $total_harga;
                $with_breakfast_discounted_price = $harga_dengan_sarapan;
            }
        } else {
            $harga_diskon = $total_harga;
            $with_breakfast_discounted_price = $harga_dengan_sarapan;
        }
    }




    ?>
    <?php include '../view/layout/header.php'; ?>

    <!-- Header Image -->
    <div>
        <img src="../assets/img/view3.jpg" alt="Header" class="header-img w-full">
    </div>

    

    <?php
    // $main_vila = true;
    $villa_only = "Villa Only";
    $villa_bf = "Villa With Breakfast";
    // percabangan 2 
    // percabangan bersarang 3
    if (!$entered_code) {
        if ($total_harga) {
            $message = "Halo, saya ingin memesan $villa_only:\n" .
                "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
                "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
                "guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
                "Harga: Rp." . number_format($total_harga);
            // "Nama: " ."\n".
            $encodedMessage = urlencode($message);
            $whatsappNumber = "6287820055714";
            $whatsappLink1 = "https://wa.me/$whatsappNumber?text=$encodedMessage";

            $message = "Halo, saya ingin memesan vila dengan breakfast:\n" .
                "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
                "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
                "guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
                "Harga: Rp." . number_format($total_harga_dengan_sarapan);
            $encodedMessage = urlencode($message);
            $whatsappNumber = "6287820055714";
            $whatsappLink2 = "https://wa.me/$whatsappNumber?text=$encodedMessage";
        }else {
            echo "error";
        }
    } elseif ($entered_code) {
        $message = "Halo, saya ingin memesan $villa_only:\n" .
            "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
            "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
            "guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
            "Harga: Rp." . number_format($harga_diskon);
        $encodedMessage = urlencode($message);
        $whatsappNumber = "6287820055714";
        $whatsappLink1 = "https://wa.me/$whatsappNumber?text=$encodedMessage";

        $message = "Halo, saya ingin memesan vila dengan breakfast:\n" .
            "Title: " . $cuy_vila[$key_produk]['title'] . "\n" .
            "Bedrooms: " . $cuy_vila[$key_produk]['bedrooms'] . "\n" .
            "guest: " . $cuy_vila[$key_produk]['guests'] . " Orang\n" .
            "Harga: Rp." . number_format($with_breakfast_discounted_price);
        $encodedMessage = urlencode($message);
        $whatsappNumber = "6287820055714";
        $whatsappLink2 = "https://wa.me/$whatsappNumber?text=$encodedMessage";
    }else {
        echo  "error";
    }


    ?>

    <!-- Search Form -->
    <div class="container mx-auto mt-6">
        <form method="POST" action="" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Input Tanggal Check-in -->
                <div>
                    <label for="checkin" class="block text-sm font-medium text-gray-700">Check-in Date</label>
                    <input type="date" id="checkin" name="checkin" value="<?= htmlspecialchars($checkin ?? date('Y-m-d')) ?>"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Input Tanggal Check-out -->
                <div>
                    <label for="checkout" class="block text-sm font-medium text-gray-700">Check-out Date</label>
                    <input type="date" id="checkout" name="checkout" value="<?= htmlspecialchars($checkout ?? date('Y-m-d', strtotime('+1 day'))) ?>"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div>
                <!-- <div>
                    <label for="rooms" class="block text-sm font-medium text-gray-700">Select rooms and guests</label>
                    <input type="text" id="rooms" placeholder="<?= $cuy_vila[$key_produk]['bedrooms'] ?> Bedroom<?= $cuy_vila[$key_produk]['bedrooms'] > 1 ? 's' : '' ?>, <?= $cuy_vila[$key_produk]['guests'] ?> Person<?= $cuy_vila[$key_produk]['guests'] > 1 ? 's' : '' ?>" class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                </div> -->
                <div>

                    <label for="promo" class="block text-sm font-medium text-gray-700">Have a promo code?</label>
                    <input type="text" id="promo" name="promo" placeholder="Enter promo code"
                        class="w-full mt-1 p-2 border border-gray-300 rounded-md">
                        <!-- percabangan 6 -->
                    <?php if (isset($promo_message)) : ?>
                        <p class="text-green-600"><?= htmlspecialchars($promo_message); ?></p>
                    <?php endif; ?>

                    <!-- <button type="submit" class="mt-4 bg-teal-700 text-white py-2 px-4 rounded-md">Apply</button> -->
                </div>
                <button type="submit" class="col-span-2 mt-4 bg-teal-700 text-white py-2 px-4 rounded-md">Calculate</button>
            </form>
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
                        <!-- percabangan ternary 1 -->
                        <i class="fa-solid fa-bed"></i> <b><?= $cuy_vila[$key_produk]['bedrooms'] ?> Bedroom<?= $cuy_vila[$key_produk]['bedrooms'] > 1 ? 's' : '' ?></b> | <i class="fa-solid fa-people-group"></i> <b><?= $cuy_vila[$key_produk]['guests'] ?> Person<?= $cuy_vila[$key_produk]['guests'] > 1 ? 's' : '' ?></b> <br>
                        150m² | Pool View | Non-smoking | Free Wifi
                    </p>
                    <p class="mt-2 text-gray-600">
                    <?php echo read_more($cuy_vila[$key_produk]['keterangan'] )?>
                        
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                        <div class="border p-4 rounded-md">
                            <h6 class="text-lg font-semibold"><?php echo $villa_only ?></h6>
                            <p class="mt-2">
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                <span class="text-gray-500 text-sm">Non-refundable</span>
                            </p>
                            <h5 class="mt-4 text-xl font-bold">IDR
                                <?php //percabangan 3
                                if (!$entered_code) {
                                    echo number_format($total_harga);
                                } else {
                                    echo '<del>' . number_format($total_harga) . '</del>' . ' ' . number_format($harga_diskon);
                                }
                                ?> /Night(s) </h5>

                            <a href="<?= $whatsappLink1 ?>" target="_blank" class=" btn1 mt-4 w-full bg-teal-700  text-white py-2 rounded-md">Select</a>
                        </div>
                        <div class="border p-4 rounded-md">
                            <h6 class="text-lg font-semibold"><?php echo $villa_bf ?></h6>
                            <p class="mt-2">
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Breakfast Included</span><br>
                                <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                <span class="text-gray-500 text-sm">Non-refundable</span>
                            </p>
                            <h5 class="mt-4 text-xl font-bold">IDR
                                <?php // percabangan 4
                                if (!$entered_code) {
                                    echo number_format($total_harga_dengan_sarapan);
                                } else {
                                    echo '<del>' . number_format($total_harga_dengan_sarapan) . '</del>' . ' ' . number_format($with_breakfast_discounted_price);
                                }
                                ?> /Night</h5>
                            <a href="<?= $whatsappLink2 ?>" target="_blank" class=" btn1 mt-4 w-full bg-teal-700  text-white py-2 rounded-md">Select</a>
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