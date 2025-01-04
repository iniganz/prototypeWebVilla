
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Bali Villas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #2c7a7b;
        }
        .navbar-brand, .nav-link, .text-white {
            color: white !important;
        }
        .card {
            margin-top: 20px;
        }
        .header-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php include 'layout/header.php'; ?>

    <!-- Header Image -->
    <div>
        <img src="https://via.placeholder.com/1500x300" alt="Header" class="header-img">
    </div>

    <!-- Search Form -->
    <div class="container mt-4">
        <form class="row g-3">
            <div class="col-md-4">
                <label for="dates" class="form-label">Select dates</label>
                <input type="text" class="form-control" id="dates" placeholder="Sun, 22 Dec - Mon, 23 Dec">
            </div>
            <div class="col-md-4">
                <label for="rooms" class="form-label">Select rooms and guests</label>
                <input type="text" class="form-control" id="rooms" placeholder="">
            </div>
            <div class="col-md-4">
                <label for="promo" class="form-label">Have a promo code?</label>
                <input type="text" class="form-control" id="promo" placeholder="Enter promo code">
            </div>
        </form>
    </div>

    <!-- Villa Information -->
    <div class="container mt-4">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/300" class="img-fluid rounded-start" alt="Villa Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">1 Bedroom Private Pool Villas</h5>
                        <p class="card-text">
                            Sleeps 2 | 1 King Bed | 1 Bathroom<br>
                            150m² | Pool View | Non-smoking
                        </p>
                        <p class="card-text">
                            1 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services...
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="border p-3">
                                    <h6>Villa Only</h6>
                                    <p>
                                        <span class="badge bg-success">Book now, pay later</span><br>
                                        <span class="text-muted">Non-refundable</span>
                                    </p>
                                    <h5>IDR 1,681,365</h5>
                                    <button class="btn btn-primary w-100">Select</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border p-3">
                                    <h6>Villa With Breakfast</h6>
                                    <p>
                                        <span class="badge bg-success">Breakfast Included</span><br>
                                        <span class="badge bg-success">Book now, pay later</span><br>
                                        <span class="text-muted">Non-refundable</span>
                                    </p>
                                    <h5>IDR 1,865,381</h5>
                                    <button class="btn btn-primary w-100">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <!-- Villa Only -->
                            <div class="border p-4 rounded-md">
                                <h6 class="text-lg font-semibold">Villa Only</h6>
                                <p class="mt-2">
                                    <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                    <span class="text-gray-500 text-sm">Non-refundable</span>
                                </p>
                                <h5 class="mt-4 text-xl font-bold">IDR <?= number_format($base_price) ?> /Night</h5>
                                <button class="mt-4 w-full bg-teal-700 text-white py-2 rounded-md">Select</button>
                            </div>

                            <!-- Villa With Breakfast -->
                            <div class="border p-4 rounded-md">
                                <h6 class="text-lg font-semibold">Villa With Breakfast</h6>
                                <p class="mt-2">
                                    <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Breakfast Included</span><br>
                                    <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Book now, pay later</span><br>
                                    <span class="text-gray-500 text-sm">Non-refundable</span>
                                </p>
                                <h5 class="mt-4 text-xl font-bold">IDR <?=  ?> /Night</h5>
                                <button class="mt-4 w-full bg-teal-700 text-white py-2 rounded-md">Select</button>
                            </div>
                        </div>







                        <!--  -->
                        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Checkout Button -->
        <button id="checkoutBtn" class="btn btn-primary">Checkout</button>

        <!-- Modal -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Input Data Anda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="checkoutForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="submitBtn" class="btn btn-primary">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('checkoutBtn').addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('checkoutModal'));
            modal.show();
        });

        document.getElementById('submitBtn').addEventListener('click', () => {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;

            if (name && email) {
                // Kirim data ke PHP melalui AJAX
                fetch('process.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ name, email, title: "Barang X", price: "Rp. 100.000" })
                })
                .then(response => response.json())
                .then(data => {
                    alert('Data berhasil dikirim ke WhatsApp');
                    console.log(data);
                })
                .catch(err => console.error(err));
            } else {
                alert('Nama dan Email wajib diisi!');
            }
        });
    </script>
</body>
</html>


<?php
// process.php

// Ambil data dari request
$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$email = $data['email'];
$title = $data['title'];
$price = $data['price'];

// Format pesan untuk WhatsApp
$message = "Detail Order:\n"
         . "Nama: $name\n"
         . "Email: $email\n"
         . "Barang: $title\n"
         . "Harga: $price";

// Nomor WhatsApp tujuan
$whatsapp_number = '6281234567890';

// URL API WhatsApp Gateway (ganti dengan gateway yang Anda gunakan)
$api_url = "https://api.whatsapp.com/send?phone=$whatsapp_number&text=" . urlencode($message);

// Kirim data
$response = ['status' => 'success', 'message' => 'Data berhasil dikirim ke WhatsApp', 'url' => $api_url];

// Balas ke front-end
header('Content-Type: application/json');
echo json_encode($response);
