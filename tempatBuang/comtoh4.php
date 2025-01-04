<?php
// Harga awal villa per malam
$base_price = 1800000; // Harga tanpa diskon
$breakfast_addition = 200000; // Tambahan untuk sarapan
$promo_code = "DISKON50"; // Kode promo yang valid
$discount_percentage = 50; // Diskon dalam persen

// Default values
$total_price = $base_price; // Harga awal
$total_with_breakfast_price = $base_price + $breakfast_addition; // Harga awal dengan sarapan
$promo_message = "";
$number_of_nights = 1; // Default jumlah malam

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil tanggal check-in dan check-out dari form
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
    if ($entered_code === $promo_code) {
        $total_price -= $total_price * $discount_percentage / 100;
        $total_with_breakfast_price -= $total_with_breakfast_price * $discount_percentage / 100;
        $promo_message = "Kode promo berhasil! Anda mendapatkan diskon $discount_percentage%.";
    } else if (!empty($entered_code)) {
        $promo_message = "Kode promo tidak valid.";
    }
}
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Harga Villa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto mt-8">
        <!-- Form Input -->
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
            <!-- Input Kode Promo -->
            <div class="col-span-2">
                <label for="promo" class="block text-sm font-medium text-gray-700">Have a promo code?</label>
                <input type="text" id="promo" name="promo" placeholder="Enter promo code"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="col-span-2 mt-4 bg-teal-700 text-white py-2 px-4 rounded-md">Calculate</button>
        </form>

        <!-- Pesan Promo -->
        <?php if (!empty($promo_message)) : ?>
            <p class="text-green-600"><?= htmlspecialchars($promo_message); ?></p>
        <?php endif; ?>

        <!-- Harga Villa -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Villa Only -->
            <div class="border p-4 rounded-md">
                <h6 class="text-lg font-semibold">Villa Only</h6>
                <h5 class="mt-4 text-xl font-bold">
                    IDR <?= number_format($total_price) ?> / <?= $number_of_nights ?> Night(s)
                </h5>
            </div>

            <!-- Villa With Breakfast -->
            <div class="border p-4 rounded-md">
                <h6 class="text-lg font-semibold">Villa With Breakfast</h6>
                <h5 class="mt-4 text-xl font-bold">
                    IDR <?= number_format($total_with_breakfast_price) ?> / <?= $number_of_nights ?> Night(s)
                </h5>
            </div>
        </div>
    </div>
</body>

</html>
<?php if (isset($promo_message)) : ?>
    <p class="text-green-600"><?= htmlspecialchars($promo_message); ?></p>
<?php endif; ?>


<?php 


if ($base_price != $discounted_price) {
    echo '<del>' . number_format($base_price) . '</del>' . ' ' . number_format($discounted_price);
} else {
    $harga = number_format($base_price);
    echo $harga;
}
?> /Night</h5>

?>