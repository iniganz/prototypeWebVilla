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

// $current_page = basename($_SERVER['PHP_SELF']);
// if ($current_page == "produk_detail.php") {
  //   echo '<a href="home.php" class="hidden lg:inline-block bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
  //   Back
  // </a>';
  // } else {
    //   echo '';
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

<script>
  const menuToggle = document.getElementById('menu-toggle');
const menu = document.getElementById('menu');
const mobileMenu = document.getElementById('mobile-menu');
menuToggle.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});
</script>

