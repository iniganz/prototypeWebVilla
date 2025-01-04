<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<body class="bg-gray-100">


  
  <script>
    // Script untuk toggle menu mobile
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const mobileMenu = document.getElementById('mobile-menu');
    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
<?php
// Harga awal villa
$base_price = 1800000; // Harga dasar
$breakfast_addition = 200000; // Tambahan untuk sarapan
$with_breakfast_price = $base_price + $breakfast_addition;

// Variabel kode promo dan diskon
$promo_code = "DISKON50"; // Kode promo yang valid
$discount_percentage = 50; // Diskon dalam persen
$discounted_price = $base_price; // Harga awal tanpa diskon

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Promo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto mt-8">
    <!-- Form Kode Promo -->
    <form method="POST" class="mb-6">
        <div>
            <label for="promo" class="block text-sm font-medium text-gray-700">Have a promo code?</label>
            <input type="text" id="promo" name="promo" placeholder="Enter promo code"
                   class="w-full mt-1 p-2 border border-gray-300 rounded-md">
        </div>
        <button type="submit" class="mt-4 bg-teal-700 text-white py-2 px-4 rounded-md">Apply</button>
    </form>

    <!-- Pesan Promo -->
    <?php if (isset($promo_message)) : ?>
        <p class="text-green-600"><?= htmlspecialchars($promo_message); ?></p>
    <?php endif; ?>

    <!-- Villa Only -->
    <div class="border p-4 rounded-md mb-4">
        <h6 class="text-lg font-semibold">Villa Only</h6>
        <h5 class="mt-4 text-xl font-bold">
            IDR <?= number_format($discounted_price) ?> /Night
        </h5>
    </div>

    <!-- Villa With Breakfast -->
    <div class="border p-4 rounded-md">
        <h6 class="text-lg font-semibold">Villa With Breakfast</h6>
        <h5 class="mt-4 text-xl font-bold">
            IDR <?= number_format($with_breakfast_discounted_price) ?> /Night
        </h5>
    </div>
</div>
</body>
</html>
