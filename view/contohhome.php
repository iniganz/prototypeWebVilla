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
    <style>
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url(../assets/img/ris.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .hero::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 30%;
            bottom: 0;
            top: -10;
            background: linear-gradient(0deg, rgba(1, 1, 3, 1) 8%, rgba(255, 255, 255, 0) 50%);
        }


        .hero .content {
            padding: 1.4rem 7%;
            max-width: 60rem;
        }

        .hero .content h1 {
            font-size: 4em;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
            line-height: 1.2;
        }

        .hero .content h1 span {
            color: var(--kiluy);
        }

        .hero .content p {
            font-size: 1.4rem;
            margin-top: 1rem;
            line-height: 1.4;
            font-weight: 100;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
            mix-blend-mode: difference;
        }

        .hero .content .cta {
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            color: #fff;
            background-color: var(--merlin);
            border-radius: 0.5rem;
            box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        }

        /* akhir hero */
    </style>

</head>



<body >
    <!-- Navbar -->
    <nav class="fixed">
        <div class="container mx-auto flex items-center justify-center  py-3 px-4 ">
            <!-- Logo di kiri -->
            <a href="#" class="flex-shrink-0">
                <img src="../assets/img/logo6.png" alt="Logo" class="h-16">
            </a>

            <!-- Button toggle untuk mobile -->
            <button class="block lg:hidden text-gray-700 focus:outline-none" id="menu-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Link navigasi -->
            <ul class="hidden lg:flex flex-1 justify-center space-x-6 text-gray-800 font-medium" id="menu">
                <li><a href="home.php" class="hover:text-blue-500">HOME</a></li>
                <li><a href="villa.php" class="hover:text-blue-500">VILLA</a></li>
                <li><a href="about.php" class="hover:text-blue-500">ABOUT US</a></li>
            </ul>
            <?php

            //
            // }
            ?>
            <!-- <a href="#" class="hidden lg:inline-block bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
        BOOK NOW
      </a> -->
        </div>

        <!-- Mobile Menu -->
        <ul class="lg:hidden bg-blue-100 py-3 px-4 space-y-2 hidden" id="mobile-menu">
            <li><a href="home.php" class="hover:text-blue-500">HOME</a></li>
            <li><a href="villa.php" class="hover:text-blue-500">VILLA</a></li>
            <li><a href="about.php" class="hover:text-blue-500">ABOUT US</a></li>
        </ul>
    </nav>






    <section class="hero" id="home">
        <main class="content">
            <h1>Mari menikmati gurih nya <span>Rizole` Mayoe`</span></h1>
            <a href="https://wa.me/6287820055714/?text=Yokoso`ningen watashi no sakasama sekai" class="cta">Beli sekarang</a>
            <!-- <a href="https://api.whatsapp.com/send?phone=087820055714" class="cta">Beli sekarang</a> -->
        </main>
    </section>
    <!--akhir slider  -->
    <!-- <div>
        <img src="../assets/img/view4.jpg" alt="Header" class="header-img w-full">
    </div> -->

    <div id="menu" class="parallax1 menup">
        <div class="cta1">
            <div class="cta1 title">
                <H1>MENU</H1>
            </div>
        </div>
    </div>



    <script src="../js/main.js"></script>
</body>

</html>